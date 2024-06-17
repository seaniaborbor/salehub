<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProductOrderTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'orderId' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'prodId' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'orderQty' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'orderDate' => [
                'type' => 'DATE',
            ],
            'deliveryStatus' => [
                'type' => 'ENUM',
                'constraint' => ['pending', 'shipped', 'delivered'],
                'default' => 'pending',
            ],
        ]);

        $this->forge->addKey('orderId', true);
        $this->forge->addForeignKey('prodId', 'products_table', 'prodId', 'CASCADE', 'CASCADE');

        $this->forge->createTable('product_order_table');
    }

    public function down()
    {
        $this->forge->dropTable('product_order_table');
    }
}
