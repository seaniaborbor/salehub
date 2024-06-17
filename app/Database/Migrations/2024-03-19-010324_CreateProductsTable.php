<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProductsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'prodId' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'prodName' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'prodCategory' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'prodPrice' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'prodPic' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'prodAvailabilityStatus' => [
                'type' => 'ENUM',
                'constraint' => ['available', 'out_of_stock'],
                'default' => 'available',
            ],
            'prodQty' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'default' => 0,
            ],
        ]);

        $this->forge->addKey('prodId', true);
        $this->forge->addForeignKey('prodCategory', 'categories', 'categoryId', 'CASCADE', 'CASCADE');

        $this->forge->createTable('products_table');
    }

    public function down()
    {
        $this->forge->dropTable('products_table');
    }
}
