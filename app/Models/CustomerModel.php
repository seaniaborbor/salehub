<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table            = 'customer_table';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'fullName',
        'phoneNo',
        'costLd',
        'costUsd',
        'deliveryRegion',
        'deliveryAddress',
        'totalCost',
        'orderCode',
        'viewStatus'
    ];

    
}
