<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TestTeacherSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'name'             => 'Test Teacher CLI',
            'name_bn'          => 'টেস্ট টিচার',
            'designation'      => 'Lecturer',
            'designation_bn'   => 'প্রভাষক',
            'department'       => 'Science',
            'department_bn'    => 'বিজ্ঞান',
            'subject'          => 'Physics',
            'subject_bn'       => 'পদার্থবিজ্ঞান',
            'qualification'    => 'MSc',
            'qualification_bn' => 'এমএসসি',
            'phone'            => '01711000000',
            'email'            => 'test@example.com',
            'joining_date'     => '2023-01-01',
            'display_order'    => 1,
            'status'           => 'active',
            'created_by'       => 1,
        ];

        $this->db->table('teachers')->insert($data);
    }
}
