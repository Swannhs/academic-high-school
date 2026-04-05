<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRolesTable extends Migration
{
    public function up(): void
    {
        $this->forge->addField([
            'id'          => ['type' => 'INTEGER', 'auto_increment' => true],
            'name'        => ['type' => 'VARCHAR', 'constraint' => 80, 'unique' => true],
            'label'       => ['type' => 'VARCHAR', 'constraint' => 120],
            'description' => ['type' => 'TEXT', 'null' => true],
            'is_protected'=> ['type' => 'INTEGER', 'default' => 0],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
            'updated_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('roles');

        // permissions
        $this->forge->addField([
            'id'    => ['type' => 'INTEGER', 'auto_increment' => true],
            'key'   => ['type' => 'VARCHAR', 'constraint' => 100, 'unique' => true],
            'label' => ['type' => 'VARCHAR', 'constraint' => 150],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('permissions');

        // pivot
        $this->forge->addField([
            'id'            => ['type' => 'INTEGER', 'auto_increment' => true],
            'role_id'       => ['type' => 'INTEGER'],
            'permission_id' => ['type' => 'INTEGER'],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('role_permissions');
        $this->db->query('CREATE UNIQUE INDEX role_permission_unique ON role_permissions(role_id, permission_id)');
    }

    public function down(): void
    {
        $this->forge->dropTable('role_permissions');
        $this->forge->dropTable('permissions');
        $this->forge->dropTable('roles');
    }
}
