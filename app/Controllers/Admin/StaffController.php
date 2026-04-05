<?php

namespace App\Controllers\Admin;

use App\Models\StaffModel;

class StaffController extends AdminBaseController
{
    private StaffModel $model;

    public function __construct() { $this->model = new StaffModel(); }

    public function index()
    {
        $this->requirePermission('manage_staff');
        return $this->adminView('admin/staff/index', [
            'title' => 'Staff / Committee', 'staff' => $this->model->orderBy('display_order','ASC')->findAll(),
        ]);
    }

    public function create()
    {
        $this->requirePermission('manage_staff');
        return $this->adminView('admin/staff/create', ['title' => 'Add Staff Member']);
    }

    public function store()
    {
        $this->requirePermission('manage_staff');
        if (! $this->validate(['name' => 'required'])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $photo = $this->uploadFile('photo', 'staff');
        $this->model->insert([
            'name'          => $this->request->getPost('name'),
            'photo'         => $photo,
            'role'          => $this->request->getPost('role'),
            'department'    => $this->request->getPost('department'),
            'contact'       => $this->request->getPost('contact'),
            'display_order' => $this->request->getPost('display_order') ?: 0,
            'status'        => $this->request->getPost('status') ?: 'active',
            'created_by'    => $this->adminUser['id'] ?? null,
        ]);
        return redirect()->to(base_url('admin/staff'))->with('success', 'Staff member added.');
    }

    public function edit(int $id)
    {
        $this->requirePermission('manage_staff');
        $member = $this->model->find($id);
        if (! $member) return redirect()->to(base_url('admin/staff'))->with('error', 'Not found.');
        return $this->adminView('admin/staff/edit', ['title' => 'Edit Staff Member', 'member' => $member]);
    }

    public function update(int $id)
    {
        $this->requirePermission('manage_staff');
        $member = $this->model->find($id);
        if (! $member) return redirect()->to(base_url('admin/staff'))->with('error', 'Not found.');
        if (! $this->validate(['name' => 'required'])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $photo = $this->uploadFile('photo', 'staff', $member['photo']);
        $this->model->update($id, [
            'name'          => $this->request->getPost('name'),
            'photo'         => $photo,
            'role'          => $this->request->getPost('role'),
            'department'    => $this->request->getPost('department'),
            'contact'       => $this->request->getPost('contact'),
            'display_order' => $this->request->getPost('display_order') ?: 0,
            'status'        => $this->request->getPost('status'),
            'updated_by'    => $this->adminUser['id'] ?? null,
        ]);
        return redirect()->to(base_url('admin/staff'))->with('success', 'Staff member updated.');
    }

    public function delete(int $id)
    {
        $this->requirePermission('manage_staff');
        $member = $this->model->find($id);
        if ($member) { $this->deleteFile('staff', $member['photo']); $this->model->delete($id); }
        return redirect()->to(base_url('admin/staff'))->with('success', 'Member deleted.');
    }
}
