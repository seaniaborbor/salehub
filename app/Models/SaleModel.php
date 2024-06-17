<?php

namespace App\Models;

use CodeIgniter\Model;

class SaleModel extends Model
{
    protected $table = 'sale_table'; // Specify the table name
    protected $primaryKey = 'sale_id'; // Specify the primary key column

    protected $allowedFields = [
        '_product',
        '_quantity',
        '_amount',
        '_currency',
    ];

    protected $useTimestamps = false; // Disable timestamps
}
