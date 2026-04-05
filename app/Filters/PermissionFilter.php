<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class PermissionFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (! session()->get('admin_logged_in')) {
            return redirect()->to(base_url('admin/login'))->with('error', 'Please login to continue.');
        }

        if (empty($arguments)) {
            return null;
        }

        $permissions = session()->get('admin_permissions') ?? [];

        foreach ($arguments as $permission) {
            if (in_array($permission, $permissions, true)) {
                return null;
            }
        }

        return redirect()->to(base_url('admin'))->with('error', 'You do not have permission to access this section.');
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
