<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailAnggaranModel extends Model
{
    protected $table            = 'detail_anggaran';
    protected $allowedFields    = [
        'indikator',
        'tolok_ukur_kinerja',
        'target_kinerja',
        'id_anggaran',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

   
}
