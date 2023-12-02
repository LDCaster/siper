<?php

namespace App\Models;

use CodeIgniter\Model;

class BabvlakipModel extends Model
{
    protected $table            = 'babvlakip';
    protected $allowedFields    = [
        'kesimpulan',
        'perbaikan',
        'tahun',
        'status_laporan' 
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
