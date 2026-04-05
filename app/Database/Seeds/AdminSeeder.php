<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $this->call('PermissionSeeder');
        $this->call('RoleSeeder');
        $this->call('DefaultAdminUserSeeder');
        $this->call('NoticeCategorySeeder');
        $this->call('SettingSeeder');

        echo "AdminSeeder: Done. Login: admin@prottasha.edu.bd / Admin@1234\n";
    }
}
