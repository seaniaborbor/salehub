<?php

namespace App\Models;

use CodeIgniter\Model;

class DeliveryModel extends Model
{
    protected $table            = 'agent_assignments';
    protected $primaryKey       = 'assignment_id';
    protected $allowedFields    = ['categoryName', 'agent_id', 'order_code', 'assignedDate', 'deliveryDate', 'isDeliver'];

}
