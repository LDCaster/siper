<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailTugasPenatausahaanModel extends Model
{
    protected $table            = 'tugasanggota';
    protected $allowedFields    = [
        'id_penatausahaan',
        'id_anggota',
        'id_pohon',
        'id_kinerja_bidang',
        'id_satuan',
        'target'

    ];

    public function getPenatausahaanWithDetailTugas($id)
    {
        $query = $this->db->table('anggota')
            ->select('anggota.*, pohon_kinerja.nama_bidang, pohon_kinerja.sasaran, kinerja_bidang.indikator, satuan.nama_satuan, tugasanggota.target')
            ->join('tugasanggota', 'tugasanggota.id_anggota = anggota.id')
            ->join('pohon_kinerja', 'pohon_kinerja.id = tugasanggota.id_pohon')
            ->join('kinerja_bidang', 'kinerja_bidang.id = tugasanggota.id_kinerja_bidang')
            ->join('satuan', 'satuan.id = tugasanggota.id_satuan')
            ->where('anggota.id', $id)
            ->get();

        return $query->getResultArray();
    }

   
    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

   
}
