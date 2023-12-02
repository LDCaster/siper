<?php

namespace App\Models;

use CodeIgniter\Model;

class KinerjaBidangModel extends Model
{
    protected $table            = 'kinerja_bidang';
    protected $allowedFields    = [
        'id_pohon',
        'indikator',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // ambil semua data table  dengan join table 
    public function getKinerjaBidang()
    {
        // Query builder untuk mengambil data KinerjaBidang beserta data pohon terkait.
        $query = $this->db->table('kinerja_bidang')
            ->select('kinerja_bidang.id, pohon_kinerja.sasaran, kinerja_bidang.indikator, pohon_kinerja.nama_bidang')
            ->join('pohon_kinerja', 'pohon_kinerja.id = kinerja_bidang.id_pohon')
            ->get();
        
        return $query->getResultArray();
    }
    
}
