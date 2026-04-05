<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            ['name' => 'super_admin', 'label' => 'Super Admin', 'description' => 'Full system access.', 'is_protected' => 1],
            ['name' => 'admin', 'label' => 'Admin', 'description' => 'General admin access.', 'is_protected' => 1],
            ['name' => 'content_manager', 'label' => 'Content Manager', 'description' => 'Pages and notices.', 'is_protected' => 0],
            ['name' => 'academic_manager', 'label' => 'Academic Manager', 'description' => 'Academic records and calendar.', 'is_protected' => 0],
            ['name' => 'media_manager', 'label' => 'Media Manager', 'description' => 'Gallery and downloads.', 'is_protected' => 0],
        ];

        $this->db->table('roles')->truncate();
        $this->db->table('roles')->insertBatch($roles);

        $permissions = $this->db->table('permissions')->get()->getResultArray();
        $permissionMap = [];
        foreach ($permissions as $permission) {
            $permissionMap[$permission['key']] = $permission['id'];
        }

        $assignments = [
            1 => array_keys($permissionMap),
            2 => array_diff(array_keys($permissionMap), ['manage_roles']),
            3 => ['manage_notices', 'manage_pages'],
            4 => ['manage_results', 'manage_routines', 'manage_calendar', 'manage_admission'],
            5 => ['manage_gallery', 'manage_downloads'],
        ];

        $this->db->table('role_permissions')->truncate();
        $rows = [];
        foreach ($assignments as $roleId => $keys) {
            foreach ($keys as $key) {
                $rows[] = ['role_id' => $roleId, 'permission_id' => $permissionMap[$key]];
            }
        }
        $this->db->table('role_permissions')->insertBatch($rows);
    }
}
