<?php

namespace App\Controllers\Admin;

use App\Models\NoticeCategoryModel;

class NoticeCategoriesController extends AdminBaseController
{
    private NoticeCategoryModel $model;

    public function __construct()
    {
        $this->model = new NoticeCategoryModel();
    }

    public function index()
    {
        $this->requirePermission('manage_notices');
        return $this->adminView('admin/notice_categories/index', [
            'title'      => 'Notice Categories',
            'categories' => $this->model->withCount(),
        ]);
    }

    public function create()
    {
        $this->requirePermission('manage_notices');
        return $this->adminView('admin/notice_categories/create', ['title' => 'Add Category']);
    }

    public function store()
    {
        $this->requirePermission('manage_notices');
        $rules = [
            'name'    => 'required|max_length[120]|is_unique[notice_categories.name]',
            'name_bn' => 'permit_empty|max_length[120]'
        ];
        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $name = $this->request->getPost('name');
        $this->model->insert([
            'name'    => $name,
            'name_bn' => $this->request->getPost('name_bn'),
            'slug'    => url_title($name, '-', true),
            'status'  => $this->request->getPost('status') ?: 'active',
        ]);
        return redirect()->to(base_url('admin/notice-categories'))->with('success', 'Category created.');
    }

    public function edit(int $id)
    {
        $this->requirePermission('manage_notices');
        $category = $this->model->find($id);
        if (! $category) return redirect()->to(base_url('admin/notice-categories'))->with('error', 'Not found.');
        return $this->adminView('admin/notice_categories/edit', ['title' => 'Edit Category', 'category' => $category]);
    }

    public function update(int $id)
    {
        $this->requirePermission('manage_notices');
        $rules = [
            'name'    => "required|max_length[120]|is_unique[notice_categories.name,id,{$id}]",
            'name_bn' => 'permit_empty|max_length[120]'
        ];
        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $name = $this->request->getPost('name');
        $this->model->update($id, [
            'name'    => $name,
            'name_bn' => $this->request->getPost('name_bn'),
            'slug'    => url_title($name, '-', true),
            'status'  => $this->request->getPost('status'),
        ]);
        return redirect()->to(base_url('admin/notice-categories'))->with('success', 'Category updated.');
    }

    public function delete(int $id)
    {
        $this->requirePermission('manage_notices');
        if (! $this->model->isSafeToDelete($id)) {
            return redirect()->back()->with('error', 'Cannot delete: category has linked notices.');
        }
        $this->model->delete($id);
        return redirect()->to(base_url('admin/notice-categories'))->with('success', 'Category deleted.');
    }
}
