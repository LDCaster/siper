<?php

namespace App\Models;

use CodeIgniter\Model;

class PohonKinerjaModel extends Model
{
    protected $table            = 'pohon_kinerja';
    protected $allowedFields    = [
        'nama_bidang',
        'sasaran',

    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
