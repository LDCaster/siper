<?php

namespace App\Models;

use CodeIgniter\Model;

class PenatausahaanAnggaranModel extends Model
{
    protected $table            = 'penatausahaan_anggaran';
    protected $allowedFields    = [
        'id_penatausahaan',
        'id_anggaran',
        
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getPenatausahaanAnggaran($id_penatausahaan)
    {
        $query = $this->db->table('penatausahaan_anggaran')
            ->select('penatausahaan_anggaran.id, penatausahaan_anggaran.id_anggaran, penatausahaan_anggaran.id_penatausahaan, anggaran.target, anggaran.pagu_indikatif, anggaran.target, anggaran.id_satuan, anggaran.id_subkegiatan, subkegiatan.nama_subkegiatan, satuan.nama_satuan')
            ->join('penatausahaan', 'penatausahaan.id = penatausahaan_anggaran.id_penatausahaan')
            ->join('anggaran', 'anggaran.id = penatausahaan_anggaran.id_anggaran')
            ->join('subkegiatan', 'subkegiatan.id = anggaran.id_subkegiatan')
            ->join('satuan', 'satuan.id = anggaran.id_satuan')
            ->where('penatausahaan_anggaran.id_penatausahaan', $id_penatausahaan)
            ->get(); 

        return $query->getResultArray();
    }

   
}
