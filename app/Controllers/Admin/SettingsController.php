<?php

namespace App\Controllers\Admin;

use App\Models\SettingModel;

class SettingsController extends AdminBaseController
{
    private SettingModel $model;

    public function __construct() { $this->model = new SettingModel(); }

    public function index()
    {
        $this->requirePermission('manage_settings');
        return $this->adminView('admin/settings/index', [
            'title'    => 'Website Settings',
            'settings' => $this->model->getAll(),
        ]);
    }

    public function update()
    {
        $this->requirePermission('manage_settings');
        if (! $this->validate([
            'email'        => 'permit_empty|valid_email',
            'facebook_url' => 'permit_empty',
            'youtube_url'  => 'permit_empty',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $textFields = [
            'school_name', 'school_name_bn',
            'eiin', 'tagline',
            'email', 'phone', 'address', 'office_hours',
            'facebook_url', 'twitter_url', 'youtube_url',
            // Principal
            'principal_name', 'principal_name_bn',
            'principal_title', 'principal_title_bn',
            'principal_message_snippet', 'principal_message_snippet_bn',
            // Homepage
            'homepage_hero', 'homepage_hero_bn',
            // Stats
            'stat_1_value', 'stat_1_label', 'stat_1_label_bn',
            'stat_2_value', 'stat_2_label', 'stat_2_label_bn',
            'stat_3_value', 'stat_3_label', 'stat_3_label_bn',
            // Legacy
            'map_embed',
        ];
        foreach ($textFields as $field) {
            if (($val = $this->request->getPost($field)) !== null) {
                $this->model->updateSetting($field, $val);
            }
        }
        // Logo upload
        if ($logo = $this->uploadFile('logo', 'settings', $this->settings['logo'] ?? null, ['jpg', 'jpeg', 'png', 'webp'])) {
            $this->model->updateSetting('logo', $logo);
        }
        if ($fav = $this->uploadFile('favicon', 'settings', $this->settings['favicon'] ?? null, ['png', 'ico'])) {
            $this->model->updateSetting('favicon', $fav);
        }
        return redirect()->to(base_url('admin/settings'))->with('success', 'Settings saved successfully.');
    }
}
