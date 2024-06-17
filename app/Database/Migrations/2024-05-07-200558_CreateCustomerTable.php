<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCustomerTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'fullName' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'phoneNo' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'deliveryRegion' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'deliveryAddress' => [
                'type' => 'TEXT',
            ],
            'costLd' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'costUsd' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'orderCode' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'orderDate' => [
                'type' => 'TIMESTAMP',
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('customer_table');
    }

    public function down()
    {
        $this->forge->dropTable('customer_table');
    }
}
