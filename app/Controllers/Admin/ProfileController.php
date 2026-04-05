<?php

namespace App\Controllers\Admin;

use App\Models\UserModel;

class ProfileController extends AdminBaseController
{
    public function index()
    {
        return $this->adminView('admin/profile/index', [
            'title' => 'My Profile',
            'user'  => (new UserModel())->find($this->adminUser['id']),
        ]);
    }

    public function update()
    {
        $id = $this->adminUser['id'];
        $user = (new UserModel())->find($id);
        $rules = [
            'name'  => 'required',
            'email' => "required|valid_email|is_unique[users.email,id,{$id}]",
        ];
        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $model = new UserModel();
        $avatar = $this->uploadFile('avatar', 'profiles', $user['avatar'] ?? null, ['jpg', 'jpeg', 'png', 'webp']);
        $data = ['name' => $this->request->getPost('name'), 'email' => $this->request->getPost('email')];
        if ($avatar) $data['avatar'] = $avatar;
        $model->update($id, $data);

        // Update session
        $updated = session()->get('admin_user');
        $updated['name']  = $data['name'];
        $updated['email'] = $data['email'];
        if ($avatar) $updated['avatar'] = $avatar;
        session()->set('admin_user', $updated);

        return redirect()->to(base_url('admin/profile'))->with('success', 'Profile updated.');
    }

    public function changePassword()
    {
        $id       = $this->adminUser['id'];
        $model    = new UserModel();
        $user     = $model->find($id);
        $oldPwd   = $this->request->getPost('old_password');
        $newPwd   = $this->request->getPost('new_password');
        $confirm  = $this->request->getPost('confirm_password');

        if (! password_verify($oldPwd, $user['password_hash'])) {
            return redirect()->back()->with('error', 'Current password is incorrect.');
        }
        if (strlen($newPwd) < 8) {
            return redirect()->back()->with('error', 'New password must be at least 8 characters.');
        }
        if ($newPwd !== $confirm) {
            return redirect()->back()->with('error', 'Passwords do not match.');
        }
        $model->update($id, ['password_hash' => password_hash($newPwd, PASSWORD_BCRYPT)]);
        return redirect()->to(base_url('admin/profile'))->with('success', 'Password changed successfully.');
    }
}
