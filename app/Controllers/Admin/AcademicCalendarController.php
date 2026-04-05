<?php

namespace App\Controllers\Admin;

use App\Models\AcademicCalendarModel;

class AcademicCalendarController extends AdminBaseController
{
    private AcademicCalendarModel $model;

    public function __construct() { $this->model = new AcademicCalendarModel(); }

    public function index()
    {
        $this->requirePermission('manage_calendar');
        $builder = $this->model;
        if ($category = $this->request->getGet('category')) {
            $builder = $builder->where('category', $category);
        }
        if ($date = $this->request->getGet('date')) {
            $builder = $builder->groupStart()->where('start_date >=', $date)->orWhere('end_date >=', $date)->groupEnd();
        }
        $events = $builder->orderBy('start_date', 'ASC')->paginate(20);
        return $this->adminView('admin/academic_calendar/index', [
            'title' => 'Academic Calendar', 'events' => $events, 'pager' => $this->model->pager,
        ]);
    }

    public function create()
    {
        $this->requirePermission('manage_calendar');
        return $this->adminView('admin/academic_calendar/create', ['title' => 'Add Event']);
    }

    public function store()
    {
        $this->requirePermission('manage_calendar');
        $rules = [
            'event_title' => 'required',
            'start_date'  => 'required|valid_date',
            'end_date'    => 'permit_empty|valid_date',
        ];
        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $start = $this->request->getPost('start_date');
        $end   = $this->request->getPost('end_date') ?: $start;
        if ($end < $start) {
            return redirect()->back()->withInput()->with('error', 'End date must be the same as or after start date.');
        }
        $this->model->insert([
            'event_title' => $this->request->getPost('event_title'),
            'category'    => $this->request->getPost('category'),
            'start_date'  => $start,
            'end_date'    => $end,
            'description' => $this->request->getPost('description'),
            'status'      => $this->request->getPost('status') ?: 'active',
            'created_by'  => $this->adminUser['id'] ?? null,
        ]);
        return redirect()->to(base_url('admin/academic-calendar'))->with('success', 'Event added.');
    }

    public function edit(int $id)
    {
        $this->requirePermission('manage_calendar');
        $event = $this->model->find($id);
        if (! $event) return redirect()->to(base_url('admin/academic-calendar'))->with('error', 'Not found.');
        return $this->adminView('admin/academic_calendar/edit', ['title' => 'Edit Event', 'event' => $event]);
    }

    public function update(int $id)
    {
        $this->requirePermission('manage_calendar');
        if (! $this->validate(['event_title' => 'required', 'start_date' => 'required|valid_date', 'end_date' => 'permit_empty|valid_date'])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $start = $this->request->getPost('start_date');
        $end   = $this->request->getPost('end_date') ?: $start;
        if ($end < $start) {
            return redirect()->back()->withInput()->with('error', 'End date must be the same as or after start date.');
        }
        $this->model->update($id, [
            'event_title' => $this->request->getPost('event_title'),
            'category'    => $this->request->getPost('category'),
            'start_date'  => $start,
            'end_date'    => $end,
            'description' => $this->request->getPost('description'),
            'status'      => $this->request->getPost('status'),
            'updated_by'  => $this->adminUser['id'] ?? null,
        ]);
        return redirect()->to(base_url('admin/academic-calendar'))->with('success', 'Event updated.');
    }

    public function delete(int $id)
    {
        $this->requirePermission('manage_calendar');
        $this->model->delete($id);
        return redirect()->to(base_url('admin/academic-calendar'))->with('success', 'Event deleted.');
    }
}
