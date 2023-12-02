<?php

namespace App\Models;

use CodeIgniter\Model;

class Bab3lakipModel extends Model
{
    protected $table            = 'bab3lakip';
    protected $allowedFields    = [
        // 'id_penatausahaan',
        // 'id_pelaporan',
        'narasi_capaian',
        'penyebab',
        'alternatif',
        'analisis_sumberdaya',
        'analisis_program_kegiatan',
        'tahun',
        'status_laporan' 
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
