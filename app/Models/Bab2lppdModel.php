<?php

namespace App\Models;

use CodeIgniter\Model;

class Bab2lppdModel extends Model
{
    protected $table            = 'bab2lppd';
    protected $allowedFields    = [
        // 'id_anggaran',
        // 'id_pelaporan',
        'analisis_target_kinerja' ,
        'tahun', 
        'status_laporan'  
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

//     public function getBab2lppd()
// {
//     return $this->select('bab2lppd.id, bab2lppd.visi, bab2lppd.misi, bab2lppd.tujuan_sasaran, bab2lppd.indikator_kinerja_utama, bab2lppd.perjanjian_kinerja, bab2lppd.program_kegiatan, bab2lppd.tahun, bab2lppd.status_laporan')
//                 ->join('karyawan', 'karyawan.id = bab2lppd.id_karyawan')
//                 ->findAll();
// }


}
