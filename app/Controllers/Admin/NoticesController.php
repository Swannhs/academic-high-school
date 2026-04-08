<?php

namespace App\Controllers\Admin;

use App\Models\NoticeModel;
use App\Models\NoticeCategoryModel;

class NoticesController extends AdminBaseController
{
    private NoticeModel $model;

    public function __construct()
    {
        $this->model = new NoticeModel();
    }

    public function index()
    {
        $this->requirePermission('manage_notices');
        $search   = $this->request->getGet('search');
        $category = $this->request->getGet('category');
        $status   = $this->request->getGet('status');

        $builder = $this->model->select('notices.*, notice_categories.name as category_name')
            ->join('notice_categories', 'notice_categories.id = notices.category_id', 'left');

        if ($search)   $builder->like('notices.title', $search);
        if ($category) $builder->where('notices.category_id', $category);
        if ($status)   $builder->where('notices.status', $status);

        $notices = $builder->orderBy('notices.created_at', 'DESC')->paginate(15);

        return $this->adminView('admin/notices/index', [
            'title'      => 'Notices',
            'notices'    => $notices,
            'pager'      => $this->model->pager,
            'categories' => (new NoticeCategoryModel())->where('status','active')->findAll(),
        ]);
    }

    public function create()
    {
        $this->requirePermission('manage_notices');
        return $this->adminView('admin/notices/create', [
            'title'      => 'Add Notice',
            'categories' => (new NoticeCategoryModel())->where('status','active')->findAll(),
        ]);
    }

    public function store()
    {
        $this->requirePermission('manage_notices');
        $rules = [
            'title'       => 'required|max_length[200]',
            'title_bn'    => 'permit_empty|max_length[255]',
            'category_id' => 'required|integer',
            'status'      => 'required|in_list[active,inactive]',
        ];
        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $attachment = $this->uploadFile('attachment', 'notices');
        $this->model->insert([
            'title'                => $this->request->getPost('title'),
            'title_bn'             => $this->request->getPost('title_bn'),
            'slug'                 => url_title($this->request->getPost('title'), '-', true),
            'category_id'          => $this->request->getPost('category_id'),
            'short_description'    => $this->request->getPost('short_description'),
            'short_description_bn' => $this->request->getPost('short_description_bn'),
            'content'              => $this->request->getPost('content'),
            'content_bn'           => $this->request->getPost('content_bn'),
            'attachment'           => $attachment,
            'publish_date'         => $this->request->getPost('publish_date') ?: date('Y-m-d'),
            'is_featured'          => $this->request->getPost('is_featured') ? 1 : 0,
            'status'               => $this->request->getPost('status'),
            'created_by'           => $this->adminUser['id'],
            'created_at'           => date('Y-m-d H:i:s'),
        ]);
        return redirect()->to(base_url('admin/notices'))->with('success', 'Notice created successfully.');
    }

    public function edit(int $id)
    {
        $this->requirePermission('manage_notices');
        $notice = $this->model->find($id);
        if (! $notice) return redirect()->to(base_url('admin/notices'))->with('error', 'Notice not found.');
        return $this->adminView('admin/notices/edit', [
            'title'      => 'Edit Notice',
            'notice'     => $notice,
            'categories' => (new NoticeCategoryModel())->where('status','active')->findAll(),
        ]);
    }

    public function update(int $id)
    {
        $this->requirePermission('manage_notices');
        $notice = $this->model->find($id);
        if (! $notice) return redirect()->to(base_url('admin/notices'))->with('error', 'Notice not found.');

        $rules = [
            'title'       => 'required|max_length[200]',
            'category_id' => 'required|integer',
            'status'      => 'required|in_list[active,inactive]',
        ];
        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $attachment = $this->uploadFile('attachment', 'notices', $notice['attachment']);
        $this->model->update($id, [
            'title'                => $this->request->getPost('title'),
            'title_bn'             => $this->request->getPost('title_bn'),
            'category_id'          => $this->request->getPost('category_id'),
            'short_description'    => $this->request->getPost('short_description'),
            'short_description_bn' => $this->request->getPost('short_description_bn'),
            'content'              => $this->request->getPost('content'),
            'content_bn'           => $this->request->getPost('content_bn'),
            'attachment'           => $attachment,
            'publish_date'         => $this->request->getPost('publish_date'),
            'is_featured'          => $this->request->getPost('is_featured') ? 1 : 0,
            'status'               => $this->request->getPost('status'),
            'updated_at'           => date('Y-m-d H:i:s'),
        ]);
        return redirect()->to(base_url('admin/notices'))->with('success', 'Notice updated successfully.');
    }

    public function delete(int $id)
    {
        $this->requirePermission('manage_notices');
        $notice = $this->model->find($id);
        if ($notice) {
            $this->deleteFile('notices', $notice['attachment']);
            $this->model->delete($id);
        }
        return redirect()->to(base_url('admin/notices'))->with('success', 'Notice deleted.');
    }

    public function toggleStatus(int $id)
    {
        $this->requirePermission('manage_notices');
        $notice = $this->model->find($id);
        if ($notice) {
            $this->model->update($id, ['status' => $notice['status'] === 'active' ? 'inactive' : 'active']);
        }
        return redirect()->back()->with('success', 'Status updated.');
    }
}
