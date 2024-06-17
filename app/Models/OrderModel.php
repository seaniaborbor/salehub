<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'order'; // Specify the table name
    protected $primaryKey = 'id'; // Specify the primary key column

    protected $allowedFields = [
        'productId',
        'orderCode',
        'productQuantity'
    ];

    protected $useTimestamps = false; // Disable timestamps
}
