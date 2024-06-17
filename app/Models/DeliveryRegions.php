<?php

namespace App\Models;

use CodeIgniter\Model;

class DeliveryRegions extends Model
{
    protected $table            = 'delivery_regions';
    protected $primaryKey       = 'regionId';

    protected $allowedFields    = ['regionName', 'regionDeliveryCost'];

}
