<?php

namespace App\Controllers\Admin;

use App\Models\ContactMessageModel;

class MessagesController extends AdminBaseController
{
    private ContactMessageModel $model;

    public function __construct() { $this->model = new ContactMessageModel(); }

    public function index()
    {
        $this->requirePermission('manage_messages');
        $filter  = $this->request->getGet('filter'); // 'unread'
        $builder = $this->model;
        if ($filter === 'unread') $builder = $builder->where('is_read', 0);
        $messages = $builder->orderBy('created_at','DESC')->paginate(20);
        return $this->adminView('admin/messages/index', [
            'title'    => 'Contact Messages',
            'messages' => $messages,
            'pager'    => $this->model->pager,
            'unread'   => $this->model->unreadCount(),
        ]);
    }

    public function show(int $id)
    {
        $this->requirePermission('manage_messages');
        $message = $this->model->find($id);
        if (! $message) return redirect()->to(base_url('admin/messages'))->with('error', 'Not found.');
        if (! $message['is_read']) { $this->model->update($id, ['is_read' => 1]); }
        return $this->adminView('admin/messages/show', ['title' => 'View Message', 'message' => $message]);
    }

    public function toggleRead(int $id)
    {
        $this->requirePermission('manage_messages');
        $m = $this->model->find($id);
        if ($m) $this->model->update($id, ['is_read' => $m['is_read'] ? 0 : 1]);
        return redirect()->back()->with('success', 'Status updated.');
    }

    public function delete(int $id)
    {
        $this->requirePermission('manage_messages');
        $this->model->delete($id);
        return redirect()->to(base_url('admin/messages'))->with('success', 'Message deleted.');
    }
}
