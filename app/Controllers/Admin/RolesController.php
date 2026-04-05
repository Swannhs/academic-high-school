<?php

namespace App\Controllers\Admin;

use App\Models\RoleModel;
use App\Models\PermissionModel;

class RolesController extends AdminBaseController
{
    private RoleModel $model;
    private PermissionModel $permissionModel;

    public function __construct()
    {
        $this->model = new RoleModel();
        $this->permissionModel = new PermissionModel();
    }

    public function index()
    {
        $this->requirePermission('manage_roles');
        return $this->adminView('admin/roles/index', [
            'title' => 'Roles & Permissions', 'roles' => $this->model->findAll(),
        ]);
    }

    public function create()
    {
        $this->requirePermission('manage_roles');
        return $this->adminView('admin/roles/edit', [
            'title' => 'Create Role',
            'role' => null,
            'allPerms' => $this->permissionModel->orderBy('label', 'ASC')->findAll(),
            'rolePermIds' => [],
        ]);
    }

    public function edit(int $id)
    {
        $this->requirePermission('manage_roles');
        $role = $this->model->find($id);
        if (! $role) return redirect()->to(base_url('admin/roles'))->with('error', 'Not found.');
        $allPerms     = $this->permissionModel->orderBy('label', 'ASC')->findAll();
        $rolePermIds  = array_column($this->model->withPermissions($id), 'id');
        return $this->adminView('admin/roles/edit', [
            'title'       => 'Edit Role: ' . $role['label'],
            'role'        => $role,
            'allPerms'    => $allPerms,
            'rolePermIds' => $rolePermIds,
        ]);
    }

    public function store()
    {
        $this->requirePermission('manage_roles');
        if (! $this->validate(['name' => 'required|alpha_dash|is_unique[roles.name]', 'label' => 'required|max_length[120]'])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $roleId = $this->model->insert([
            'name' => $this->request->getPost('name'),
            'label' => $this->request->getPost('label'),
            'description' => $this->request->getPost('description'),
            'is_protected' => 0,
        ], true);
        $this->model->syncPermissions((int) $roleId, $this->request->getPost('permissions') ?: []);

        return redirect()->to(base_url('admin/roles'))->with('success', 'Role created successfully.');
    }

    public function update(int $id)
    {
        $this->requirePermission('manage_roles');
        $role = $this->model->find($id);
        if (! $role) return redirect()->to(base_url('admin/roles'))->with('error', 'Not found.');
        if (! $this->validate(['label' => 'required|max_length[120]'])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $this->model->update($id, [
            'label' => $this->request->getPost('label'),
            'description' => $this->request->getPost('description'),
        ]);
        $permIds = $this->request->getPost('permissions') ?: [];
        $this->model->syncPermissions($id, $permIds);
        return redirect()->to(base_url('admin/roles'))->with('success', 'Role permissions updated.');
    }

    public function delete(int $id)
    {
        $this->requirePermission('manage_roles');
        $role = $this->model->find($id);
        if (! $role) {
            return redirect()->to(base_url('admin/roles'))->with('error', 'Role not found.');
        }
        if ((int) ($role['is_protected'] ?? 0) === 1) {
            return redirect()->back()->with('error', 'Protected roles cannot be deleted.');
        }
        if ((new \App\Models\UserModel())->where('role_id', $id)->countAllResults() > 0) {
            return redirect()->back()->with('error', 'This role is assigned to users and cannot be deleted.');
        }
        $this->model->syncPermissions($id, []);
        $this->model->delete($id);

        return redirect()->to(base_url('admin/roles'))->with('success', 'Role deleted successfully.');
    }
}
