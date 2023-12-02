<?php

namespace App\Models;

use CodeIgniter\Model;

class PenatausahaanKinerjabidangModel extends Model
{
    protected $table            = 'penatausahaan_kinerja';
    protected $allowedFields    = [
        'id_penatausahaan',
        'id_kinerja_bidang',
        'target',
        'id_satuan',
        
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getPenatausahaanKinerja($id_penatausahaan)
    {
        $query = $this->db->table('penatausahaan_kinerja')
            ->select('penatausahaan_kinerja.id, penatausahaan_kinerja.id_kinerja_bidang, penatausahaan_kinerja.id_penatausahaan, penatausahaan_kinerja.id_satuan, penatausahaan_kinerja.target, satuan.nama_satuan, kinerja_bidang.indikator, pohon_kinerja.nama_bidang, pohon_kinerja.sasaran')
            ->join('penatausahaan', 'penatausahaan.id = penatausahaan_kinerja.id_penatausahaan')
            ->join('kinerja_bidang', 'kinerja_bidang.id = penatausahaan_kinerja.id_kinerja_bidang')
            ->join('pohon_kinerja', 'pohon_kinerja.id = kinerja_bidang.id_pohon')
            ->join('satuan', 'satuan.id = penatausahaan_kinerja.id_satuan')
            ->where('penatausahaan_kinerja.id_penatausahaan', $id_penatausahaan)
            ->get(); 

        return $query->getResultArray();
    }

   
}
