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
        $info = $this->model->first() ?: [];
        return $this->adminView('admin/admission/edit', [
            'title' => 'Admission Management',
            'info' => $info,
        ]);
    }

    public function save()
    {
        $this->requirePermission('manage_admission');
        $rules = [
            'title'    => 'required|max_length[200]',
            'title_bn' => 'permit_empty|max_length[200]',
            'session_year' => 'permit_empty|max_length[20]',
        ];
        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $id = $this->request->getPost('id');
        $info = $id ? $this->model->find($id) : null;

        $appForm  = $this->uploadFile('application_form_file', 'admission', $info['application_form_file'] ?? null);
        $circular = $this->uploadFile('circular_file', 'admission', $info['circular_file'] ?? null);

        $data = [
            'title'              => $this->request->getPost('title'),
            'title_bn'           => $this->request->getPost('title_bn'),
            'session_year'       => $this->request->getPost('session_year'),
            'overview'           => $this->request->getPost('overview'),
            'overview_bn'        => $this->request->getPost('overview_bn'),
            'eligibility'        => $this->request->getPost('eligibility'),
            'eligibility_bn'     => $this->request->getPost('eligibility_bn'),
            'requirements'       => $this->request->getPost('requirements'),
            'requirements_bn'    => $this->request->getPost('requirements_bn'),
            'important_dates'    => $this->request->getPost('important_dates'),
            'important_dates_bn' => $this->request->getPost('important_dates_bn'),
            'instructions'       => $this->request->getPost('instructions'),
            'instructions_bn'    => $this->request->getPost('instructions_bn'),
            'status'             => $this->request->getPost('status') ?: 'active',
            'updated_at'         => date('Y-m-d H:i:s'),
        ];

        if ($appForm)  $data['application_form_file'] = $appForm;
        if ($circular) $data['circular_file']         = $circular;

        if ($id) {
            $this->model->update($id, $data);
        } else {
            $data['created_at'] = date('Y-m-d H:i:s');
            $this->model->insert($data);
        }

        return redirect()->to(base_url('admin/admission'))->with('success', 'Admission information updated successfully.');
    }
}
