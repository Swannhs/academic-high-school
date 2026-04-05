<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            ['key' => 'manage_notices', 'label' => 'Manage Notices'],
            ['key' => 'manage_pages', 'label' => 'Manage Pages'],
            ['key' => 'manage_teachers', 'label' => 'Manage Teachers'],
            ['key' => 'manage_staff', 'label' => 'Manage Staff / Committee'],
            ['key' => 'manage_results', 'label' => 'Manage Results'],
            ['key' => 'manage_routines', 'label' => 'Manage Routines'],
            ['key' => 'manage_gallery', 'label' => 'Manage Gallery'],
            ['key' => 'manage_downloads', 'label' => 'Manage Downloads'],
            ['key' => 'manage_messages', 'label' => 'Manage Contact Messages'],
            ['key' => 'manage_feedback', 'label' => 'Manage Feedback / Complaints'],
            ['key' => 'manage_admission', 'label' => 'Manage Admission'],
            ['key' => 'manage_calendar', 'label' => 'Manage Academic Calendar'],
            ['key' => 'manage_users', 'label' => 'Manage Users'],
            ['key' => 'manage_roles', 'label' => 'Manage Roles & Permissions'],
            ['key' => 'manage_settings', 'label' => 'Manage Settings'],
        ];

        $this->db->table('permissions')->truncate();
        $this->db->table('permissions')->insertBatch($permissions);
    }
}
