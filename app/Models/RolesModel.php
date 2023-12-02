<?php

namespace App\Models;

use CodeIgniter\Model;

class RolesModel extends Model
{
    
    protected $table = 'roles';
    protected $allowedFields = [
        'nama', 'created_at', 'updated_at'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

  
}
