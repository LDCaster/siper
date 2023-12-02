<?php

namespace App\Models;

use CodeIgniter\Model;

class IKKModel extends Model
{
    protected $table            = 'ikk';
    protected $allowedFields    = [
        'urusan_pemerintahan',
        'ikk_keluaran',
        'ikk_outcome',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
