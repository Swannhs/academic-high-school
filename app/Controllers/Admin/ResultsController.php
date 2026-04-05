<?php

namespace App\Controllers\Admin;

use App\Models\ResultModel;

class ResultsController extends AdminBaseController
{
    private ResultModel $model;

    public function __construct() { $this->model = new ResultModel(); }

    public function index()
    {
        $this->requirePermission('manage_results');
        $builder = $this->model;
        if ($c = $this->request->getGet('class')) $builder = $builder->like('class_name', $c);
        if ($y = $this->request->getGet('year'))  $builder = $builder->like('session_year', $y);
        $results = $builder->orderBy('created_at','DESC')->paginate(15);
        return $this->adminView('admin/results/index', [
            'title' => 'Results', 'results' => $results, 'pager' => $this->model->pager,
        ]);
    }

    public function create()
    {
        $this->requirePermission('manage_results');
        return $this->adminView('admin/results/create', ['title' => 'Add Result']);
    }

    public function store()
    {
        $this->requirePermission('manage_results');
        if (! $this->validate([
            'title' => 'required|max_length[200]',
            'exam_name' => 'required|max_length[150]',
            'file_path' => 'uploaded[file_path]|ext_in[file_path,pdf]|max_size[file_path,5120]',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $file = $this->uploadFile('file_path', 'results', null, ['pdf']);
        $this->model->insert([
            'title'        => $this->request->getPost('title'),
            'exam_name'    => $this->request->getPost('exam_name'),
            'class_name'   => $this->request->getPost('class_name'),
            'session_year' => $this->request->getPost('session_year'),
            'file_path'    => $file,
            'exam_type'    => $this->request->getPost('exam_type') ?: 'board',
            'category'     => $this->request->getPost('category'),
            'stats'        => $this->request->getPost('stats'),
            'download_url' => $file,
            'year'         => $this->request->getPost('session_year'),
            'class_category' => $this->request->getPost('class_name'),
            'publish_date' => $this->request->getPost('publish_date') ?: date('Y-m-d'),
            'description'  => $this->request->getPost('description'),
            'status'       => $this->request->getPost('status') ?: 'active',
            'created_by'   => $this->adminUser['id'] ?? null,
        ]);
        return redirect()->to(base_url('admin/results'))->with('success', 'Result published.');
    }

    public function edit(int $id)
    {
        $this->requirePermission('manage_results');
        $result = $this->model->find($id);
        if (! $result) return redirect()->to(base_url('admin/results'))->with('error', 'Not found.');
        return $this->adminView('admin/results/edit', ['title' => 'Edit Result', 'result' => $result]);
    }

    public function update(int $id)
    {
        $this->requirePermission('manage_results');
        $result = $this->model->find($id);
        if (! $result) return redirect()->to(base_url('admin/results'))->with('error', 'Not found.');
        if (! $this->validate([
            'title' => 'required|max_length[200]',
            'exam_name' => 'required|max_length[150]',
            'file_path' => 'permit_empty|ext_in[file_path,pdf]|max_size[file_path,5120]',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $file = $this->uploadFile('file_path', 'results', $result['file_path'], ['pdf']);
        $this->model->update($id, [
            'title'        => $this->request->getPost('title'),
            'exam_name'    => $this->request->getPost('exam_name'),
            'class_name'   => $this->request->getPost('class_name'),
            'session_year' => $this->request->getPost('session_year'),
            'file_path'    => $file,
            'exam_type'    => $this->request->getPost('exam_type') ?: 'board',
            'category'     => $this->request->getPost('category'),
            'stats'        => $this->request->getPost('stats'),
            'download_url' => $file,
            'year'         => $this->request->getPost('session_year'),
            'class_category' => $this->request->getPost('class_name'),
            'publish_date' => $this->request->getPost('publish_date'),
            'description'  => $this->request->getPost('description'),
            'status'       => $this->request->getPost('status'),
            'updated_by'   => $this->adminUser['id'] ?? null,
        ]);
        return redirect()->to(base_url('admin/results'))->with('success', 'Result updated.');
    }

    public function delete(int $id)
    {
        $this->requirePermission('manage_results');
        $result = $this->model->find($id);
        if ($result) { $this->deleteFile('results', $result['file_path']); $this->model->delete($id); }
        return redirect()->to(base_url('admin/results'))->with('success', 'Result deleted.');
    }
}
