<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAcademicEventsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type'=>'INT','constraint'=>11,'unsigned'=>true,'auto_increment'=>true],
            'title' => ['type'=>'VARCHAR','constraint'=>'255'],
            'description' => ['type'=>'TEXT','null'=>true],
            'event_date' => ['type'=>'DATE'],
            'category' => ['type'=>'VARCHAR','constraint'=>'50','default'=>'general'],
            'created_at' => ['type'=>'DATETIME','null'=>true],
            'updated_at' => ['type'=>'DATETIME','null'=>true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('academic_events');
    }

    public function down()
    {
        $this->forge->dropTable('academic_events');
    }
}
