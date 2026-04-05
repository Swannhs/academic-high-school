<?php

namespace App\Controllers\Admin;

use App\Models\TeacherModel;

class TeachersController extends AdminBaseController
{
    private TeacherModel $model;

    public function __construct() { $this->model = new TeacherModel(); }

    public function index()
    {
        $this->requirePermission('manage_teachers');
        $search = $this->request->getGet('search');
        $status = $this->request->getGet('status');
        $builder = $this->model;
        if ($search) $builder = $builder->like('name', $search);
        if ($status) $builder = $builder->where('status', $status);
        $teachers = $builder->orderBy('display_order','ASC')->paginate(20);
        return $this->adminView('admin/teachers/index', [
            'title' => 'Teachers', 'teachers' => $teachers, 'pager' => $this->model->pager,
        ]);
    }

    public function create()
    {
        $this->requirePermission('manage_teachers');
        return $this->adminView('admin/teachers/create', ['title' => 'Add Teacher']);
    }

    public function store()
    {
        $this->requirePermission('manage_teachers');
        $rules = [
            'name' => 'required|max_length[150]',
            'designation' => 'required|max_length[100]',
            'email' => 'permit_empty|valid_email',
            'photo' => 'permit_empty|ext_in[photo,jpg,jpeg,png,webp]|max_size[photo,5120]',
        ];
        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $photo = $this->uploadFile('photo', 'teachers', null, ['jpg', 'jpeg', 'png', 'webp']);
        $this->model->insert([
            'name'          => $this->request->getPost('name'),
            'name_bn'       => $this->request->getPost('name_bn'),
            'designation'   => $this->request->getPost('designation'),
            'department'    => $this->request->getPost('department'),
            'subject'       => $this->request->getPost('subject'),
            'qualification' => $this->request->getPost('qualification'),
            'phone'         => $this->request->getPost('phone'),
            'email'         => $this->request->getPost('email'),
            'joining_date'  => $this->request->getPost('joining_date'),
            'display_order' => $this->request->getPost('display_order') ?: 0,
            'photo'         => $photo,
            'photo_url'     => $photo,
            'status'        => $this->request->getPost('status') ?: 'active',
            'created_by'    => $this->adminUser['id'] ?? null,
        ]);
        return redirect()->to(base_url('admin/teachers'))->with('success', 'Teacher added successfully.');
    }

    public function edit(int $id)
    {
        $this->requirePermission('manage_teachers');
        $teacher = $this->model->find($id);
        if (! $teacher) return redirect()->to(base_url('admin/teachers'))->with('error', 'Not found.');
        return $this->adminView('admin/teachers/edit', ['title' => 'Edit Teacher', 'teacher' => $teacher]);
    }

    public function update(int $id)
    {
        $this->requirePermission('manage_teachers');
        $teacher = $this->model->find($id);
        if (! $teacher) return redirect()->to(base_url('admin/teachers'))->with('error', 'Not found.');
        $rules = [
            'name' => 'required|max_length[150]',
            'designation' => 'required|max_length[100]',
            'email' => 'permit_empty|valid_email',
            'photo' => 'permit_empty|ext_in[photo,jpg,jpeg,png,webp]|max_size[photo,5120]',
        ];
        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $oldPhotoFile = $teacher['photo'] ?? basename((string) parse_url($teacher['photo_url'] ?? '', PHP_URL_PATH));
        $photo = $this->uploadFile('photo', 'teachers', $oldPhotoFile, ['jpg', 'jpeg', 'png', 'webp']);
        $this->model->update($id, [
            'name'          => $this->request->getPost('name'),
            'name_bn'       => $this->request->getPost('name_bn'),
            'designation'   => $this->request->getPost('designation'),
            'department'    => $this->request->getPost('department'),
            'subject'       => $this->request->getPost('subject'),
            'qualification' => $this->request->getPost('qualification'),
            'phone'         => $this->request->getPost('phone'),
            'email'         => $this->request->getPost('email'),
            'joining_date'  => $this->request->getPost('joining_date'),
            'display_order' => $this->request->getPost('display_order') ?: 0,
            'photo'         => $photo,
            'photo_url'     => $photo ?: $teacher['photo_url'],
            'status'        => $this->request->getPost('status'),
            'updated_by'    => $this->adminUser['id'] ?? null,
        ]);
        return redirect()->to(base_url('admin/teachers'))->with('success', 'Teacher updated.');
    }

    public function delete(int $id)
    {
        $this->requirePermission('manage_teachers');
        $teacher = $this->model->find($id);
        if ($teacher) {
            $file = $teacher['photo'] ?? basename((string) parse_url($teacher['photo_url'] ?? '', PHP_URL_PATH));
            $this->deleteFile('teachers', $file);
            $this->model->delete($id);
        }
        return redirect()->to(base_url('admin/teachers'))->with('success', 'Teacher deleted.');
    }

    public function toggleStatus(int $id)
    {
        $this->requirePermission('manage_teachers');
        $t = $this->model->find($id);
        if ($t) $this->model->update($id, ['status' => $t['status'] === 'active' ? 'inactive' : 'active']);
        return redirect()->back()->with('success', 'Status updated.');
    }
}
