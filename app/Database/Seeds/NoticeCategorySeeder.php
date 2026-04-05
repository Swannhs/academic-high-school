<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class NoticeCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'General', 'slug' => 'general', 'status' => 'active'],
            ['name' => 'Academic', 'slug' => 'academic', 'status' => 'active'],
            ['name' => 'Exam', 'slug' => 'exam', 'status' => 'active'],
            ['name' => 'Events', 'slug' => 'events', 'status' => 'active'],
            ['name' => 'Admission', 'slug' => 'admission', 'status' => 'active'],
        ];

        $this->db->table('notice_categories')->truncate();
        $this->db->table('notice_categories')->insertBatch($categories);
    }
}
