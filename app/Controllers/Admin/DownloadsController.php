<?php

namespace App\Controllers\Admin;

use App\Models\DownloadModel;

class DownloadsController extends AdminBaseController
{
    private DownloadModel $model;

    public function __construct() { $this->model = new DownloadModel(); }

    public function index()
    {
        $this->requirePermission('manage_downloads');
        $builder = $this->model;
        if ($search = $this->request->getGet('search')) $builder = $builder->like('title', $search);
        if ($status = $this->request->getGet('status')) $builder = $builder->where('status', $status);
        if ($category = $this->request->getGet('category')) $builder = $builder->where('category', $category);
        $downloads = $builder->orderBy('publish_date', 'DESC')->paginate(15);
        return $this->adminView('admin/downloads/index', [
            'title' => 'Downloads',
            'downloads' => $downloads,
            'pager' => $this->model->pager,
        ]);
    }

    public function create()
    {
        $this->requirePermission('manage_downloads');
        return $this->adminView('admin/downloads/create', ['title' => 'Add Download']);
    }

    public function store()
    {
        $this->requirePermission('manage_downloads');
        if (! $this->validate([
            'title' => 'required|max_length[200]',
            'file_path' => 'uploaded[file_path]|ext_in[file_path,pdf]|max_size[file_path,5120]',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $file = $this->uploadFile('file_path', 'downloads', null, ['pdf']);
        $this->model->insert([
            'title'        => $this->request->getPost('title'),
            'category'     => $this->request->getPost('category'),
            'file_path'    => $file,
            'description'  => $this->request->getPost('description'),
            'status'       => $this->request->getPost('status') ?: 'active',
            'publish_date' => $this->request->getPost('publish_date') ?: date('Y-m-d'),
            'created_by'   => $this->adminUser['id'] ?? null,
        ]);
        return redirect()->to(base_url('admin/downloads'))->with('success', 'Download added.');
    }

    public function edit(int $id)
    {
        $this->requirePermission('manage_downloads');
        $item = $this->model->find($id);
        if (! $item) return redirect()->to(base_url('admin/downloads'))->with('error', 'Not found.');
        return $this->adminView('admin/downloads/edit', ['title' => 'Edit Download', 'item' => $item]);
    }

    public function update(int $id)
    {
        $this->requirePermission('manage_downloads');
        $item = $this->model->find($id);
        if (! $item) return redirect()->to(base_url('admin/downloads'))->with('error', 'Not found.');
        if (! $this->validate(['title' => 'required|max_length[200]', 'file_path' => 'permit_empty|ext_in[file_path,pdf]|max_size[file_path,5120]'])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $file = $this->uploadFile('file_path', 'downloads', $item['file_path'], ['pdf']);
        $this->model->update($id, [
            'title'        => $this->request->getPost('title'),
            'category'     => $this->request->getPost('category'),
            'file_path'    => $file,
            'description'  => $this->request->getPost('description'),
            'status'       => $this->request->getPost('status'),
            'publish_date' => $this->request->getPost('publish_date'),
            'updated_by'   => $this->adminUser['id'] ?? null,
        ]);
        return redirect()->to(base_url('admin/downloads'))->with('success', 'Download updated.');
    }

    public function delete(int $id)
    {
        $this->requirePermission('manage_downloads');
        $item = $this->model->find($id);
        if ($item) {
            $this->deleteFile('downloads', $item['file_path']);
            $this->model->delete($id);
        }
        return redirect()->to(base_url('admin/downloads'))->with('success', 'Download deleted.');
    }
}
