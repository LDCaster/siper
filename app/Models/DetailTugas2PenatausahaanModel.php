<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailTugas2PenatausahaanModel extends Model
{
    protected $table            = 'tugasanggota2';
    protected $allowedFields    = [
        'id_penatausahaan',
        'id_anggota',
        'id_satuan',
        'kinerja_utama',
        'indikator',
        'target'

    ];
    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getDetailTugas2($id_p)
    {
        $query = $this->db->table('tugasanggota2')
            ->select('tugasanggota2.id, tugasanggota2.id_anggota, tugasanggota2.kinerja_utama, tugasanggota2.indikator,  tugasanggota2.target, karyawan.nama, satuan.nama_satuan')
            ->join('karyawan', 'karyawan.id = tugasanggota2.id_anggota')
            ->join('satuan', 'satuan.id = tugasanggota2.id_satuan')
            ->join('penatausahaan', 'penatausahaan.id = tugasanggota2.id_penatausahaan')
            ->where('tugasanggota2.id_anggota', $id_p)
            ->get(); 

        return $query->getResultArray();
    }
   
}
