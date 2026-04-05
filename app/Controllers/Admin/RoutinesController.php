<?php

namespace App\Controllers\Admin;

use App\Models\RoutineModel;

class RoutinesController extends AdminBaseController
{
    private RoutineModel $model;

    public function __construct() { $this->model = new RoutineModel(); }

    public function index()
    {
        $this->requirePermission('manage_routines');
        $builder = $this->model;
        if ($t = $this->request->getGet('type'))  $builder = $builder->where('routine_type', $t);
        if ($c = $this->request->getGet('class')) $builder = $builder->like('class_name', $c);
        $routines = $builder->orderBy('created_at','DESC')->paginate(15);
        return $this->adminView('admin/routines/index', [
            'title' => 'Routines', 'routines' => $routines, 'pager' => $this->model->pager,
        ]);
    }

    public function create()
    {
        $this->requirePermission('manage_routines');
        return $this->adminView('admin/routines/create', ['title' => 'Add Routine']);
    }

    public function store()
    {
        $this->requirePermission('manage_routines');
        if (! $this->validate([
            'title' => 'required|max_length[200]',
            'routine_type' => 'required|max_length[100]',
            'file_path' => 'uploaded[file_path]|ext_in[file_path,pdf]|max_size[file_path,5120]',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $file = $this->uploadFile('file_path', 'routines', null, ['pdf']);
        $this->model->insert([
            'title'        => $this->request->getPost('title'),
            'routine_type' => $this->request->getPost('routine_type'),
            'class_name'   => $this->request->getPost('class_name'),
            'file_path'    => $file,
            'publish_date' => $this->request->getPost('publish_date') ?: date('Y-m-d'),
            'notes'        => $this->request->getPost('notes'),
            'status'       => $this->request->getPost('status') ?: 'active',
            'created_by'   => $this->adminUser['id'] ?? null,
        ]);
        return redirect()->to(base_url('admin/routines'))->with('success', 'Routine added.');
    }

    public function edit(int $id)
    {
        $this->requirePermission('manage_routines');
        $routine = $this->model->find($id);
        if (! $routine) return redirect()->to(base_url('admin/routines'))->with('error', 'Not found.');
        return $this->adminView('admin/routines/edit', ['title' => 'Edit Routine', 'routine' => $routine]);
    }

    public function update(int $id)
    {
        $this->requirePermission('manage_routines');
        $routine = $this->model->find($id);
        if (! $routine) return redirect()->to(base_url('admin/routines'))->with('error', 'Not found.');
        if (! $this->validate([
            'title' => 'required|max_length[200]',
            'routine_type' => 'required|max_length[100]',
            'file_path' => 'permit_empty|ext_in[file_path,pdf]|max_size[file_path,5120]',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $file = $this->uploadFile('file_path', 'routines', $routine['file_path'], ['pdf']);
        $this->model->update($id, [
            'title'        => $this->request->getPost('title'),
            'routine_type' => $this->request->getPost('routine_type'),
            'class_name'   => $this->request->getPost('class_name'),
            'file_path'    => $file,
            'publish_date' => $this->request->getPost('publish_date'),
            'notes'        => $this->request->getPost('notes'),
            'status'       => $this->request->getPost('status'),
            'updated_by'   => $this->adminUser['id'] ?? null,
        ]);
        return redirect()->to(base_url('admin/routines'))->with('success', 'Routine updated.');
    }

    public function delete(int $id)
    {
        $this->requirePermission('manage_routines');
        $routine = $this->model->find($id);
        if ($routine) { $this->deleteFile('routines', $routine['file_path']); $this->model->delete($id); }
        return redirect()->to(base_url('admin/routines'))->with('success', 'Routine deleted.');
    }
}
