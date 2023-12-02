<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailPenatausahaanModel extends Model
{
    protected $table            = 'anggota';
    protected $allowedFields    = [
        'karyawan',
        'id_penatausahaan',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

   
}
