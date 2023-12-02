<?php

namespace App\Models;

use CodeIgniter\Model;

class Bab2lakipModel extends Model
{
    protected $table            = 'bab2lakip';
    protected $allowedFields    = [
        // 'id_penatausahaan',
        'visi',
        'misi',
        'tujuan_sasaran',
        'indikator_kinerja_utama',
        'perjanjian_kinerja',
        'program_kegiatan',
        'tahun',
        'status_laporan' 
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

//     public function getBab2lakip()
// {
//     return $this->select('bab2lakip.id, bab2lakip.visi, bab2lakip.misi, bab2lakip.tujuan_sasaran, bab2lakip.indikator_kinerja_utama, bab2lakip.perjanjian_kinerja, bab2lakip.program_kegiatan, bab2lakip.tahun, bab2lakip.status_laporan')
//                 ->join('karyawan', 'karyawan.id = bab2lakip.id_karyawan')
//                 ->findAll();
// }


}
