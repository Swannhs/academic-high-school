<?php

namespace App\Controllers\Admin;

use App\Models\PageModel;

class PagesController extends AdminBaseController
{
    private PageModel $model;

    public function __construct() { $this->model = new PageModel(); }

    public function index()
    {
        $this->requirePermission('manage_pages');
        return $this->adminView('admin/pages/index', [
            'title' => 'Pages', 'pages' => $this->model->orderBy('updated_at','DESC')->findAll(),
        ]);
    }

    public function create()
    {
        $this->requirePermission('manage_pages');
        return $this->adminView('admin/pages/create', ['title' => 'Add Page']);
    }

    public function store()
    {
        $this->requirePermission('manage_pages');
        if (! $this->validate(['title' => 'required', 'slug' => 'required|is_unique[pages.slug]'])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $image = $this->uploadFile('featured_image', 'pages');
        $this->model->insert([
            'title'               => $this->request->getPost('title'),
            'title_bn'            => $this->request->getPost('title_bn'),
            'slug'                => $this->request->getPost('slug'),
            'banner_title'        => $this->request->getPost('banner_title'),
            'banner_title_bn'     => $this->request->getPost('banner_title_bn'),
            'content'             => $this->request->getPost('content'),
            'content_bn'          => $this->request->getPost('content_bn'),
            'featured_image'      => $image,
            'status'              => $this->request->getPost('status') ?: 'draft',
            'meta_title'          => $this->request->getPost('meta_title'),
            'meta_title_bn'       => $this->request->getPost('meta_title_bn'),
            'meta_description'    => $this->request->getPost('meta_description'),
            'meta_description_bn' => $this->request->getPost('meta_description_bn'),
            'created_by'          => $this->adminUser['id'] ?? null,
            'updated_by'          => $this->adminUser['id'] ?? null,
        ]);
        return redirect()->to(base_url('admin/pages'))->with('success', 'Page created.');
    }

    public function edit(int $id)
    {
        $this->requirePermission('manage_pages');
        $page = $this->model->find($id);
        if (! $page) return redirect()->to(base_url('admin/pages'))->with('error', 'Not found.');
        return $this->adminView('admin/pages/edit', ['title' => 'Edit Page', 'page' => $page]);
    }

    public function update(int $id)
    {
        $this->requirePermission('manage_pages');
        $page = $this->model->find($id);
        if (! $page) return redirect()->to(base_url('admin/pages'))->with('error', 'Not found.');
        if (! $this->validate(['title' => 'required', "slug" => "required|is_unique[pages.slug,id,{$id}]"])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $image = $this->uploadFile('featured_image', 'pages', $page['featured_image']);
        $this->model->update($id, [
            'title'               => $this->request->getPost('title'),
            'title_bn'            => $this->request->getPost('title_bn'),
            'slug'                => $this->request->getPost('slug'),
            'banner_title'        => $this->request->getPost('banner_title'),
            'banner_title_bn'     => $this->request->getPost('banner_title_bn'),
            'content'             => $this->request->getPost('content'),
            'content_bn'          => $this->request->getPost('content_bn'),
            'featured_image'      => $image,
            'status'              => $this->request->getPost('status'),
            'meta_title'          => $this->request->getPost('meta_title'),
            'meta_title_bn'       => $this->request->getPost('meta_title_bn'),
            'meta_description'    => $this->request->getPost('meta_description'),
            'meta_description_bn' => $this->request->getPost('meta_description_bn'),
            'updated_by'          => $this->adminUser['id'] ?? null,
        ]);
        return redirect()->to(base_url('admin/pages'))->with('success', 'Page updated.');
    }

    public function delete(int $id)
    {
        $this->requirePermission('manage_pages');
        $page = $this->model->find($id);
        if ($page) { $this->deleteFile('pages', $page['featured_image']); $this->model->delete($id); }
        return redirect()->to(base_url('admin/pages'))->with('success', 'Page deleted.');
    }
}
