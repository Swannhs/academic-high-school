<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SettingModel;
use Config\Database;

abstract class AdminBaseController extends BaseController
{
    protected array $adminUser   = [];
    protected array $permissions = [];
    protected array $settings    = [];

    public function initController(
        \CodeIgniter\HTTP\RequestInterface $request,
        \CodeIgniter\HTTP\ResponseInterface $response,
        \Psr\Log\LoggerInterface $logger
    ): void {
        parent::initController($request, $response, $logger);

        $this->adminUser   = session()->get('admin_user') ?? [];
        $this->permissions = session()->get('admin_permissions') ?? [];
        $db = Database::connect();
        $this->settings = $db->tableExists('settings') ? (new SettingModel())->getAll() : [];
    }

    protected function can(string $permission): bool
    {
        return in_array($permission, $this->permissions);
    }

    protected function requirePermission(string $permission): void
    {
        if (! $this->can($permission)) {
            session()->setFlashdata('error', 'You do not have permission to access this section.');
            redirect()->to(base_url('admin'))->send();
            exit;
        }
    }

    protected function uploadFile(string $field, string $folder, ?string $oldFile = null, array $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp', 'pdf', 'ico']): ?string
    {
        $file = $this->request->getFile($field);
        if (! $file || ! $file->isValid() || $file->hasMoved()) {
            return $oldFile;
        }
        if ($file->getSizeByUnit('mb') > 5) {
            return $oldFile;
        }
        if (! in_array(strtolower($file->getClientExtension()), $allowedExtensions, true)) {
            return $oldFile;
        }
        $uploadPath = FCPATH . 'uploads/' . $folder;
        if (! is_dir($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }
        $newName = $file->getRandomName();
        $file->move($uploadPath, $newName);
        if ($oldFile && file_exists(FCPATH . 'uploads/' . $folder . '/' . $oldFile)) {
            @unlink(FCPATH . 'uploads/' . $folder . '/' . $oldFile);
        }
        return $newName;
    }

    protected function deleteFile(string $folder, ?string $filename): void
    {
        if ($filename) {
            $path = FCPATH . 'uploads/' . $folder . '/' . $filename;
            if (file_exists($path)) {
                @unlink($path);
            }
        }
    }

    protected function adminView(string $view, array $data = []): string
    {
        $data['adminUser']   = $this->adminUser;
        $data['permissions'] = $this->permissions;
        $data['settings']    = $this->settings;
        $data['unreadMessages'] = $data['unreadMessages'] ?? 0;
        return view('admin/layouts/main', array_merge($data, ['content_view' => $view]));
    }
}
