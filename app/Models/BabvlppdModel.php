<?php

namespace App\Models;

use CodeIgniter\Model;

class BabvlppdModel extends Model
{
    protected $table            = 'babvlppd';
    protected $allowedFields    = [
        'kesimpulan',
        'tahun',
        'status_laporan' 
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
