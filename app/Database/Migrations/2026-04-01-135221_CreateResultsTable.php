<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateResultsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'exam_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'category' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'year' => [
                'type'       => 'INT',
                'constraint' => 4,
            ],
            'stats' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'download_url' => [
                'type'       => 'VARCHAR',
                'constraint' => '500',
            ],
            'exam_type' => [
                'type'       => 'ENUM',
                'constraint' => ['board', 'internal'],
                'default'    => 'board',
            ],
            'class_category' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('results');
    }

    public function down()
    {
        $this->forge->dropTable('results');
    }
}
