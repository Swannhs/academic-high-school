<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAdminSupportTables extends Migration
{
    public function up(): void
    {
        // roles
        $this->forge->addField([
            'id'          => ['type' => 'INTEGER', 'auto_increment' => true],
            'name'        => ['type' => 'VARCHAR', 'constraint' => 50],
            'description' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
            'updated_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('roles', true);

        // users
        $this->forge->addField([
            'id'            => ['type' => 'INTEGER', 'auto_increment' => true],
            'role_id'       => ['type' => 'INTEGER'],
            'name'          => ['type' => 'VARCHAR', 'constraint' => 120],
            'username'      => ['type' => 'VARCHAR', 'constraint' => 60, 'unique' => true],
            'email'         => ['type' => 'VARCHAR', 'constraint' => 120, 'unique' => true],
            'password_hash' => ['type' => 'VARCHAR', 'constraint' => 255],
            'avatar'        => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'status'        => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => 'active'],
            'last_login'    => ['type' => 'DATETIME', 'null' => true],
            'created_at'    => ['type' => 'DATETIME', 'null' => true],
            'updated_at'    => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('users', true);

        // permissions
        $this->forge->addField([
            'id'    => ['type' => 'INTEGER', 'auto_increment' => true],
            'key'   => ['type' => 'VARCHAR', 'constraint' => 100, 'unique' => true],
            'label' => ['type' => 'VARCHAR', 'constraint' => 120],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('permissions', true);

        // role_permissions (pivot)
        $this->forge->addField([
            'role_id'       => ['type' => 'INTEGER'],
            'permission_id' => ['type' => 'INTEGER'],
        ]);
        $this->forge->addKey(['role_id', 'permission_id'], true);
        $this->forge->createTable('role_permissions', true);

        // notice_categories
        $this->forge->addField([
            'id'         => ['type' => 'INTEGER', 'auto_increment' => true],
            'name'       => ['type' => 'VARCHAR', 'constraint' => 120],
            'slug'       => ['type' => 'VARCHAR', 'constraint' => 150, 'unique' => true],
            'status'     => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => 'active'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('notice_categories', true);

        // notices
        $this->forge->addField([
            'id'                => ['type' => 'INTEGER', 'auto_increment' => true],
            'category_id'       => ['type' => 'INTEGER', 'null' => true],
            'title'             => ['type' => 'VARCHAR', 'constraint' => 255],
            'slug'              => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'short_description' => ['type' => 'TEXT', 'null' => true],
            'content'           => ['type' => 'TEXT', 'null' => true],
            'attachment'        => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'publish_date'      => ['type' => 'DATE', 'null' => true],
            'is_featured'       => ['type' => 'INTEGER', 'default' => 0],
            'status'            => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => 'active'],
            'created_by'        => ['type' => 'INTEGER', 'null' => true],
            'updated_by'        => ['type' => 'INTEGER', 'null' => true],
            'created_at'        => ['type' => 'DATETIME', 'null' => true],
            'updated_at'        => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('notices', true);

        // teachers
        $this->forge->addField([
            'id'            => ['type' => 'INTEGER', 'auto_increment' => true],
            'name'          => ['type' => 'VARCHAR', 'constraint' => 150],
            'name_bn'       => ['type' => 'VARCHAR', 'constraint' => 150, 'null' => true],
            'photo'         => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'designation'   => ['type' => 'VARCHAR', 'constraint' => 100],
            'department'    => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'subject'       => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'qualification' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'phone'         => ['type' => 'VARCHAR', 'constraint' => 30, 'null' => true],
            'email'         => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'photo_url'     => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'joining_date'  => ['type' => 'DATE', 'null' => true],
            'display_order' => ['type' => 'INTEGER', 'default' => 0],
            'status'        => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => 'active'],
            'created_by'    => ['type' => 'INTEGER', 'null' => true],
            'updated_by'    => ['type' => 'INTEGER', 'null' => true],
            'created_at'    => ['type' => 'DATETIME', 'null' => true],
            'updated_at'    => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('teachers', true);

        // results
        $this->forge->addField([
            'id'           => ['type' => 'INTEGER', 'auto_increment' => true],
            'title'        => ['type' => 'VARCHAR', 'constraint' => 200],
            'exam_name'    => ['type' => 'VARCHAR', 'constraint' => 150],
            'class_name'   => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'session_year' => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],
            'file_path'    => ['type' => 'VARCHAR', 'constraint' => 255],
            'publish_date' => ['type' => 'DATE', 'null' => true],
            'description'  => ['type' => 'TEXT', 'null' => true],
            'status'       => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => 'active'],
            'category'     => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'year'         => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],
            'stats'        => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'download_url' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'exam_type'    => ['type' => 'VARCHAR', 'constraint' => 30, 'null' => true],
            'class_category' => ['type' => 'VARCHAR', 'constraint' => 80, 'null' => true],
            'created_by'   => ['type' => 'INTEGER', 'null' => true],
            'updated_by'   => ['type' => 'INTEGER', 'null' => true],
            'created_at'   => ['type' => 'DATETIME', 'null' => true],
            'updated_at'   => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('results', true);

        // routines
        $this->forge->addField([
            'id'           => ['type' => 'INTEGER', 'auto_increment' => true],
            'title'        => ['type' => 'VARCHAR', 'constraint' => 200],
            'routine_type' => ['type' => 'VARCHAR', 'constraint' => 100],
            'class_name'   => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'file_path'    => ['type' => 'VARCHAR', 'constraint' => 255],
            'publish_date' => ['type' => 'DATE', 'null' => true],
            'notes'        => ['type' => 'TEXT', 'null' => true],
            'status'       => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => 'active'],
            'created_by'   => ['type' => 'INTEGER', 'null' => true],
            'updated_by'   => ['type' => 'INTEGER', 'null' => true],
            'created_at'   => ['type' => 'DATETIME', 'null' => true],
            'updated_at'   => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('routines', true);

        // academic_calendar (events)
        $this->forge->addField([
            'id'          => ['type' => 'INTEGER', 'auto_increment' => true],
            'title'       => ['type' => 'VARCHAR', 'constraint' => 200],
            'category'    => ['type' => 'VARCHAR', 'constraint' => 100, 'default' => 'Holiday'],
            'event_date'  => ['type' => 'DATE'],
            'end_date'    => ['type' => 'DATE', 'null' => true],
            'description' => ['type' => 'TEXT', 'null' => true],
            'status'      => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => 'active'],
            'created_by'  => ['type' => 'INTEGER', 'null' => true],
            'updated_by'  => ['type' => 'INTEGER', 'null' => true],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
            'updated_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('academic_calendar', true);

        // downloads
        $this->forge->addField([
            'id'           => ['type' => 'INTEGER', 'auto_increment' => true],
            'title'        => ['type' => 'VARCHAR', 'constraint' => 200],
            'category'     => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'file_path'    => ['type' => 'VARCHAR', 'constraint' => 255],
            'description'  => ['type' => 'TEXT', 'null' => true],
            'status'       => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => 'active'],
            'publish_date' => ['type' => 'DATE', 'null' => true],
            'created_by'   => ['type' => 'INTEGER', 'null' => true],
            'updated_by'   => ['type' => 'INTEGER', 'null' => true],
            'created_at'   => ['type' => 'DATETIME', 'null' => true],
            'updated_at'   => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('downloads', true);

        // pages
        $this->forge->addField([
            'id'               => ['type' => 'INTEGER', 'auto_increment' => true],
            'title'            => ['type' => 'VARCHAR', 'constraint' => 200],
            'slug'             => ['type' => 'VARCHAR', 'constraint' => 220, 'unique' => true],
            'banner_title'     => ['type' => 'VARCHAR', 'constraint' => 200, 'null' => true],
            'content'          => ['type' => 'TEXT', 'null' => true],
            'featured_image'   => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'status'           => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => 'draft'],
            'meta_title'       => ['type' => 'VARCHAR', 'constraint' => 200, 'null' => true],
            'meta_description' => ['type' => 'TEXT', 'null' => true],
            'created_by'       => ['type' => 'INTEGER', 'null' => true],
            'updated_by'       => ['type' => 'INTEGER', 'null' => true],
            'created_at'       => ['type' => 'DATETIME', 'null' => true],
            'updated_at'       => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('pages', true);

        // staff
        $this->forge->addField([
            'id'            => ['type' => 'INTEGER', 'auto_increment' => true],
            'name'          => ['type' => 'VARCHAR', 'constraint' => 150],
            'photo'         => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'role'          => ['type' => 'VARCHAR', 'constraint' => 150, 'null' => true],
            'department'    => ['type' => 'VARCHAR', 'constraint' => 150, 'null' => true],
            'contact'       => ['type' => 'VARCHAR', 'constraint' => 80, 'null' => true],
            'display_order' => ['type' => 'INTEGER', 'default' => 0],
            'status'        => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => 'active'],
            'created_by'    => ['type' => 'INTEGER', 'null' => true],
            'updated_by'    => ['type' => 'INTEGER', 'null' => true],
            'created_at'    => ['type' => 'DATETIME', 'null' => true],
            'updated_at'    => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('staff', true);

        // gallery_albums
        $this->forge->addField([
            'id'          => ['type' => 'INTEGER', 'auto_increment' => true],
            'title'       => ['type' => 'VARCHAR', 'constraint' => 200],
            'category'    => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'cover_image' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'event_date'  => ['type' => 'DATE', 'null' => true],
            'description' => ['type' => 'TEXT', 'null' => true],
            'status'      => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => 'active'],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
            'updated_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('gallery_albums', true);

        // gallery_images
        $this->forge->addField([
            'id'            => ['type' => 'INTEGER', 'auto_increment' => true],
            'album_id'      => ['type' => 'INTEGER'],
            'image_path'    => ['type' => 'VARCHAR', 'constraint' => 255],
            'caption'       => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'display_order' => ['type' => 'INTEGER', 'default' => 0],
            'created_at'    => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('gallery_images', true);

        // contact_messages
        $this->forge->addField([
            'id'         => ['type' => 'INTEGER', 'auto_increment' => true],
            'name'       => ['type' => 'VARCHAR', 'constraint' => 150],
            'phone'      => ['type' => 'VARCHAR', 'constraint' => 30, 'null' => true],
            'email'      => ['type' => 'VARCHAR', 'constraint' => 150, 'null' => true],
            'subject'    => ['type' => 'VARCHAR', 'constraint' => 255],
            'message'    => ['type' => 'TEXT'],
            'is_read'    => ['type' => 'INTEGER', 'default' => 0],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('contact_messages', true);

        // feedback
        $this->forge->addField([
            'id'         => ['type' => 'INTEGER', 'auto_increment' => true],
            'name'       => ['type' => 'VARCHAR', 'constraint' => 150],
            'phone'      => ['type' => 'VARCHAR', 'constraint' => 30, 'null' => true],
            'email'      => ['type' => 'VARCHAR', 'constraint' => 150, 'null' => true],
            'type'       => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'subject'    => ['type' => 'VARCHAR', 'constraint' => 255],
            'message'    => ['type' => 'TEXT'],
            'status'     => ['type' => 'VARCHAR', 'constraint' => 30, 'default' => 'new'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('feedback', true);

        // settings
        $this->forge->addField([
            'id'         => ['type' => 'INTEGER', 'auto_increment' => true],
            'key'        => ['type' => 'VARCHAR', 'constraint' => 100, 'unique' => true],
            'value'      => ['type' => 'TEXT', 'null' => true],
            'group'      => ['type' => 'VARCHAR', 'constraint' => 60, 'default' => 'general'],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('settings', true);

        // admission_info
        $this->forge->addField([
            'id'                   => ['type' => 'INTEGER', 'auto_increment' => true],
            'title'                => ['type' => 'VARCHAR', 'constraint' => 200],
            'session_year'         => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],
            'overview'             => ['type' => 'TEXT', 'null' => true],
            'eligibility'          => ['type' => 'TEXT', 'null' => true],
            'requirements'         => ['type' => 'TEXT', 'null' => true],
            'important_dates'      => ['type' => 'TEXT', 'null' => true],
            'instructions'         => ['type' => 'TEXT', 'null' => true],
            'application_form_file'=> ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'circular_file'        => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'status'               => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => 'active'],
            'created_at'           => ['type' => 'DATETIME', 'null' => true],
            'updated_at'           => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('admission_info', true);
    }

    public function down(): void
    {
        foreach (['roles', 'users', 'permissions', 'role_permissions', 'notice_categories', 'notices', 'teachers', 'results', 'routines', 'academic_calendar', 'downloads',
                  'pages', 'staff', 'gallery_images', 'gallery_albums',
                  'contact_messages', 'feedback', 'settings', 'admission_info'] as $table) {
            $this->forge->dropTable($table, true);
        }
    }
}
