<?php

namespace App\Controllers\Admin;

use App\Models\FeedbackModel;

class FeedbackController extends AdminBaseController
{
    private FeedbackModel $model;

    public function __construct() { $this->model = new FeedbackModel(); }

    public function index()
    {
        $this->requirePermission('manage_feedback');
        $builder = $this->model;
        if ($s = $this->request->getGet('status')) $builder = $builder->where('status', $s);
        $items = $builder->orderBy('created_at','DESC')->paginate(20);
        return $this->adminView('admin/feedback/index', [
            'title' => 'Feedback & Complaints', 'items' => $items, 'pager' => $this->model->pager,
        ]);
    }

    public function show(int $id)
    {
        $this->requirePermission('manage_feedback');
        $item = $this->model->find($id);
        if (! $item) return redirect()->to(base_url('admin/feedback'))->with('error', 'Not found.');
        return $this->adminView('admin/feedback/show', ['title' => 'View Feedback', 'item' => $item]);
    }

    public function updateStatus(int $id)
    {
        $this->requirePermission('manage_feedback');
        $status = $this->request->getPost('status');
        $allowed = ['new','in_review','resolved','closed'];
        if (in_array($status, $allowed)) {
            $this->model->update($id, ['status' => $status]);
        }
        return redirect()->back()->with('success', 'Status updated.');
    }

    public function delete(int $id)
    {
        $this->requirePermission('manage_feedback');
        $this->model->delete($id);
        return redirect()->to(base_url('admin/feedback'))->with('success', 'Feedback deleted.');
    }
}
