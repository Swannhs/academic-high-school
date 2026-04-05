<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DefaultAdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $this->db->table('users')->where('email', 'admin@prottasha.edu.bd')->delete();
        $this->db->table('users')->insert([
            'name' => 'Super Admin',
            'username' => 'admin',
            'email' => 'admin@prottasha.edu.bd',
            'password_hash' => password_hash('Admin@1234', PASSWORD_BCRYPT),
            'role_id' => 1,
            'status' => 'active',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
