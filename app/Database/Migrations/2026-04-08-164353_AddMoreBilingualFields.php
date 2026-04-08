<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddMoreBilingualFields extends Migration
{
    public function up()
    {
        // teachers
        $this->forge->addColumn('teachers', [
            'designation_bn'   => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true, 'after' => 'designation'],
            'department_bn'    => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true, 'after' => 'department'],
            'subject_bn'       => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true, 'after' => 'subject'],
            'qualification_bn' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true, 'after' => 'qualification'],
        ]);
        
        // notice_categories
        $this->forge->addColumn('notice_categories', [
            'name_bn' => ['type' => 'VARCHAR', 'constraint' => 120, 'null' => true, 'after' => 'name'],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('teachers', ['designation_bn', 'department_bn', 'subject_bn', 'qualification_bn']);
        $this->forge->dropColumn('notice_categories', ['name_bn']);
    }
}
