<?php

namespace App\Controllers\Admin;

use App\Models\UserModel;
use App\Models\RoleModel;
use Config\Database;

class UsersController extends AdminBaseController
{
    private UserModel $model;

    public function __construct() { $this->model = new UserModel(); }

    public function index()
    {
        $this->requirePermission('manage_users');
        $search = $this->request->getGet('search');
        $status = $this->request->getGet('status');

        $query = Database::connect()->table('users u')
            ->select('u.*, r.name as role_name, r.label as role_label')
            ->join('roles r', 'r.id = u.role_id', 'left');

        if ($search) {
            $query->groupStart()
                ->like('u.name', $search)
                ->orLike('u.username', $search)
                ->orLike('u.email', $search)
                ->groupEnd();
        }
        if ($status) {
            $query->where('u.status', $status);
        }

        return $this->adminView('admin/users/index', [
            'title' => 'Users',
            'users' => $query->orderBy('u.created_at', 'DESC')->get()->getResultArray(),
            'roles' => (new RoleModel())->findAll(),
        ]);
    }

    public function create()
    {
        $this->requirePermission('manage_users');
        return $this->adminView('admin/users/create', [
            'title' => 'Add User', 'roles' => (new RoleModel())->findAll(),
        ]);
    }

    public function store()
    {
        $this->requirePermission('manage_users');
        $rules = [
            'name'     => 'required',
            'username' => 'required|is_unique[users.username]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[8]',
            'role_id'  => 'required|integer',
        ];
        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $this->model->insert([
            'name'          => $this->request->getPost('name'),
            'username'      => $this->request->getPost('username'),
            'email'         => $this->request->getPost('email'),
            'password_hash' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'role_id'       => $this->request->getPost('role_id'),
            'status'        => $this->request->getPost('status') ?: 'active',
        ]);
        return redirect()->to(base_url('admin/users'))->with('success', 'User created successfully.');
    }

    public function edit(int $id)
    {
        $this->requirePermission('manage_users');
        $user = $this->model->find($id);
        if (! $user) return redirect()->to(base_url('admin/users'))->with('error', 'Not found.');
        return $this->adminView('admin/users/edit', [
            'title' => 'Edit User', 'user' => $user, 'roles' => (new RoleModel())->findAll(),
        ]);
    }

    public function update(int $id)
    {
        $this->requirePermission('manage_users');
        $user = $this->model->find($id);
        if (! $user) return redirect()->to(base_url('admin/users'))->with('error', 'Not found.');

        $rules = [
            'name'     => 'required',
            'username' => "required|is_unique[users.username,id,{$id}]",
            'email'    => "required|valid_email|is_unique[users.email,id,{$id}]",
            'role_id'  => 'required|integer',
        ];
        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $data = [
            'name'     => $this->request->getPost('name'),
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'role_id'  => $this->request->getPost('role_id'),
            'status'   => $this->request->getPost('status'),
        ];
        if ($pwd = $this->request->getPost('password')) {
            if (strlen($pwd) >= 8) $data['password_hash'] = password_hash($pwd, PASSWORD_BCRYPT);
        }
        $this->model->update($id, $data);
        return redirect()->to(base_url('admin/users'))->with('success', 'User updated.');
    }

    public function delete(int $id)
    {
        $this->requirePermission('manage_users');
        if ($id === (int)$this->adminUser['id']) {
            return redirect()->back()->with('error', 'You cannot delete your own account.');
        }
        $this->model->delete($id);
        return redirect()->to(base_url('admin/users'))->with('success', 'User deleted.');
    }

    public function toggleStatus(int $id)
    {
        $this->requirePermission('manage_users');
        $u = $this->model->find($id);
        if ($u) $this->model->update($id, ['status' => $u['status'] === 'active' ? 'inactive' : 'active']);
        return redirect()->back()->with('success', 'Status updated.');
    }
}
