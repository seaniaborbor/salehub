<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAdminLoginTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'adminId' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
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

        $this->forge->addKey('adminId', true);
        $this->forge->createTable('admin_login_table');
    }

    public function down()
    {
        $this->forge->dropTable('admin_login_table');
    }
}
