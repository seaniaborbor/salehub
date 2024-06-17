<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'admin_login_table';
    protected $primaryKey       = 'adminId ';
    protected $allowedFields    = [
        'userName',
        'userEmail',
        'password',
        'userRole'
    ];

    
}
