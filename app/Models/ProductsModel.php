<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductsModel extends Model
{
    protected $table            = 'products_table';
    protected $primaryKey       = 'prodId';
    protected $allowedFields    = [
        'prodName',
        'prodCategory',
        'prodPrice',
        'prodPic',
        'prodAvailabilityStatus',
        'prodCurrency',
        'prodQty',
        'prodSize'
    ];

    protected bool $allowEmptyInserts = false;

}
