<?php

namespace App\Models;

use CodeIgniter\Model;

class UrusanModel extends Model
{
    protected $table            = 'urusan';
    protected $allowedFields    = [
        'nama_urusan',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
