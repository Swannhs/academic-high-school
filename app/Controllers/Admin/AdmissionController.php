<?php

namespace App\Controllers\Admin;

use App\Models\AdmissionInfoModel;

class AdmissionController extends AdminBaseController
{
    private AdmissionInfoModel $model;

    public function __construct() { $this->model = new AdmissionInfoModel(); }

    public function index()
    {
        $this->requirePermission('manage_admission');
        $info = $this->model->orderBy('id','DESC')->first();
        return $this->adminView('admin/admission/edit', [
            'title' => 'Admission Management', 'info' => $info,
        ]);
    }

    public function save()
    {
        $this->requirePermission('manage_admission');
        if (! $this->validate(['title' => 'required'])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $id = $this->request->getPost('id');
        $appForm  = $this->uploadFile('application_form_file', 'downloads');
        $circular = $this->uploadFile('circular_file', 'downloads');
        $data = [
            'title'                 => $this->request->getPost('title'),
            'session_year'          => $this->request->getPost('session_year'),
            'overview'              => $this->request->getPost('overview'),
            'eligibility'           => $this->request->getPost('eligibility'),
            'requirements'          => $this->request->getPost('requirements'),
            'important_dates'       => $this->request->getPost('important_dates'),
            'instructions'          => $this->request->getPost('instructions'),
            'status'                => $this->request->getPost('status') ?: 'active',
        ];
        if ($appForm)  $data['application_form_file'] = $appForm;
        if ($circular) $data['circular_file']         = $circular;

        if ($id) {
            $this->model->update($id, $data);
        } else {
            $this->model->insert($data);
        }
        return redirect()->to(base_url('admin/admission'))->with('success', 'Admission info saved.');
    }
}
