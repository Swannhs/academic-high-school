<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\RoleModel;
use App\Models\UserModel;

class AuthController extends BaseController
{
    public function login()
    {
        if (session()->get('admin_logged_in')) {
            return redirect()->to(base_url('admin'));
        }
        return view('admin/auth/login', ['title' => 'Admin Login']);
    }

    public function doLogin()
    {
        $rules = [
            'login'    => 'required',
            'password' => 'required',
        ];
        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $login    = $this->request->getPost('login');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->findByEmail($login) ?? $userModel->findByUsername($login);

        if (! $user || ! password_verify($password, $user['password_hash'])) {
            return redirect()->back()->withInput()->with('error', 'Invalid credentials. Please try again.');
        }

        if ($user['status'] !== 'active') {
            return redirect()->back()->with('error', 'Your account is inactive. Contact administrator.');
        }

        $permissions = $userModel->getPermissions((int) $user['role_id']);
        $role = (new RoleModel())->find((int) $user['role_id']);

        session()->set([
            'admin_logged_in'  => true,
            'admin_user'       => [
                'id'         => $user['id'],
                'name'       => $user['name'],
                'email'      => $user['email'],
                'username'   => $user['username'],
                'avatar'     => $user['avatar'] ?? null,
                'role_id'    => $user['role_id'],
                'role_name'  => $role['name'] ?? '',
                'role_label' => $role['label'] ?? '',
            ],
            'admin_permissions' => $permissions,
        ]);

        $userModel->update($user['id'], ['last_login' => date('Y-m-d H:i:s')]);

        return redirect()->to(base_url('admin'))->with('success', 'Welcome back, ' . $user['name'] . '!');
    }

    public function logout()
    {
        session()->remove(['admin_logged_in', 'admin_user', 'admin_permissions']);
        session()->destroy();
        return redirect()->to(base_url('admin/login'))->with('success', 'You have been logged out.');
    }

    public function forgotPassword()
    {
        if (session()->get('admin_logged_in')) {
            return redirect()->to(base_url('admin'));
        }

        return view('admin/auth/forgot_password', ['title' => 'Forgot Password']);
    }
}
