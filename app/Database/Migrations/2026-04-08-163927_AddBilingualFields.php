<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddBilingualFields extends Migration
{
    public function up()
    {
        // notices
        $this->forge->addColumn('notices', [
            'title_bn'             => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true, 'after' => 'title'],
            'short_description_bn' => ['type' => 'TEXT', 'null' => true, 'after' => 'short_description'],
            'content_bn'           => ['type' => 'TEXT', 'null' => true, 'after' => 'content'],
        ]);

        // results
        $this->forge->addColumn('results', [
            'title_bn'        => ['type' => 'VARCHAR', 'constraint' => 200, 'null' => true, 'after' => 'title'],
            'exam_name_bn'    => ['type' => 'VARCHAR', 'constraint' => 150, 'null' => true, 'after' => 'exam_name'],
            'description_bn'  => ['type' => 'TEXT', 'null' => true, 'after' => 'description'],
        ]);

        // routines
        $this->forge->addColumn('routines', [
            'title_bn' => ['type' => 'VARCHAR', 'constraint' => 200, 'null' => true, 'after' => 'title'],
            'notes_bn' => ['type' => 'TEXT', 'null' => true, 'after' => 'notes'],
        ]);

        // academic_calendar
        $this->forge->addColumn('academic_calendar', [
            'title_bn'       => ['type' => 'VARCHAR', 'constraint' => 200, 'null' => true, 'after' => 'title'],
            'description_bn' => ['type' => 'TEXT', 'null' => true, 'after' => 'description'],
        ]);

        // downloads
        $this->forge->addColumn('downloads', [
            'title_bn'       => ['type' => 'VARCHAR', 'constraint' => 200, 'null' => true, 'after' => 'title'],
            'description_bn' => ['type' => 'TEXT', 'null' => true, 'after' => 'description'],
        ]);

        // pages
        $this->forge->addColumn('pages', [
            'title_bn'            => ['type' => 'VARCHAR', 'constraint' => 200, 'null' => true, 'after' => 'title'],
            'banner_title_bn'     => ['type' => 'VARCHAR', 'constraint' => 200, 'null' => true, 'after' => 'banner_title'],
            'content_bn'          => ['type' => 'TEXT', 'null' => true, 'after' => 'content'],
            'meta_title_bn'       => ['type' => 'VARCHAR', 'constraint' => 200, 'null' => true, 'after' => 'meta_title'],
            'meta_description_bn' => ['type' => 'TEXT', 'null' => true, 'after' => 'meta_description'],
        ]);

        // staff
        $this->forge->addColumn('staff', [
            'name_bn'       => ['type' => 'VARCHAR', 'constraint' => 150, 'null' => true, 'after' => 'name'],
            'role_bn'       => ['type' => 'VARCHAR', 'constraint' => 150, 'null' => true, 'after' => 'role'],
            'department_bn' => ['type' => 'VARCHAR', 'constraint' => 150, 'null' => true, 'after' => 'department'],
        ]);

        // gallery_albums
        $this->forge->addColumn('gallery_albums', [
            'title_bn'       => ['type' => 'VARCHAR', 'constraint' => 200, 'null' => true, 'after' => 'title'],
            'description_bn' => ['type' => 'TEXT', 'null' => true, 'after' => 'description'],
        ]);

        // admission_info
        $this->forge->addColumn('admission_info', [
            'title_bn'           => ['type' => 'VARCHAR', 'constraint' => 200, 'null' => true, 'after' => 'title'],
            'overview_bn'        => ['type' => 'TEXT', 'null' => true, 'after' => 'overview'],
            'eligibility_bn'     => ['type' => 'TEXT', 'null' => true, 'after' => 'eligibility'],
            'requirements_bn'    => ['type' => 'TEXT', 'null' => true, 'after' => 'requirements'],
            'important_dates_bn' => ['type' => 'TEXT', 'null' => true, 'after' => 'important_dates'],
            'instructions_bn'    => ['type' => 'TEXT', 'null' => true, 'after' => 'instructions'],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('notices', ['title_bn', 'short_description_bn', 'content_bn']);
        $this->forge->dropColumn('results', ['title_bn', 'exam_name_bn', 'description_bn']);
        $this->forge->dropColumn('routines', ['title_bn', 'notes_bn']);
        $this->forge->dropColumn('academic_calendar', ['title_bn', 'description_bn']);
        $this->forge->dropColumn('downloads', ['title_bn', 'description_bn']);
        $this->forge->dropColumn('pages', ['title_bn', 'banner_title_bn', 'content_bn', 'meta_title_bn', 'meta_description_bn']);
        $this->forge->dropColumn('staff', ['name_bn', 'role_bn', 'department_bn']);
        $this->forge->dropColumn('gallery_albums', ['title_bn', 'description_bn']);
        $this->forge->dropColumn('admission_info', ['title_bn', 'overview_bn', 'eligibility_bn', 'requirements_bn', 'important_dates_bn', 'instructions_bn']);
    }
}
