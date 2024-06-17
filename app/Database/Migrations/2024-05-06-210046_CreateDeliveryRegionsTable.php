<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDeliveryRegionsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'regionName' => [
                'type'       => 'TEXT',
            ],
            'regionDeliveryCost' => [
                'type'       => 'DECIMAL',
                'constraint' => '8,2', // Adjust precision and scale as needed
            ],
            'regionLatitude' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'regionLongitude' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'created_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
            'updated_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('delivery_regions');
    }

    public function down()
    {
        $this->forge->dropTable('delivery_regions');
    }
}
