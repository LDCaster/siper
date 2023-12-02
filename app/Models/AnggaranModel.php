<?php

namespace App\Models;

use CodeIgniter\Model;

class AnggaranModel extends Model
{
    protected $table            = 'anggaran';
    protected $allowedFields    = [
        'id_perencanaan',
        'id_subkegiatan',
        'id_satuan',
        'pagu_indikatif',
        'target',
        'status_perencanaan',
        'status_tujuan',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getAnggaran()
{
    // Query builder untuk mengambil data anggaran beserta data urusan, indikator kinerja terkait, kegiatan terkait, program terkait, subkegiatan terkait, dan indikator terkait.
    $query = $this->db->table('anggaran')
        ->select('anggaran.id, subkegiatan.nama_subkegiatan, satuan.nama_satuan, anggaran.pagu_indikatif, anggaran.target, anggaran.status_perencanaan, anggaran.status_tujuan, subkegiatan.program, subkegiatan.kegiatan, subkegiatan.indikator_subkegiatan, perencanaan.pagu_indikatif AS perencanaan_pagu, perencanaan.target AS perencanaan_target')
        ->join('perencanaan', 'perencanaan.id = anggaran.id_perencanaan')
        ->join('subkegiatan', 'subkegiatan.id = perencanaan.id_subkegiatan')
        ->join('satuan', 'satuan.id = perencanaan.id_satuan')
        ->get();

    return $query->getResultArray();
}
    public function getAnggaranPerpustakaan()
{
    // Query builder untuk mengambil data anggaran beserta data urusan, indikator kinerja terkait, kegiatan terkait, program terkait, subkegiatan terkait, dan indikator terkait.
    $query = $this->db->table('anggaran')
        ->select('anggaran.id, subkegiatan.nama_subkegiatan, satuan.nama_satuan, anggaran.pagu_indikatif, anggaran.target, anggaran.status_perencanaan, anggaran.status_tujuan, subkegiatan.program, subkegiatan.kegiatan, subkegiatan.indikator_subkegiatan, perencanaan.pagu_indikatif AS perencanaan_pagu, perencanaan.target AS perencanaan_target')
        ->join('perencanaan', 'perencanaan.id = anggaran.id_perencanaan')
        ->join('subkegiatan', 'subkegiatan.id = perencanaan.id_subkegiatan')
        ->join('satuan', 'satuan.id = perencanaan.id_satuan')
        ->where('anggaran.status_tujuan', 'PERPUSTAKAAN') // Tentukan tabel secara eksplisit
        ->get();

    return $query->getResultArray();
}

    public function getAnggaranKearsipan()
    {
        // Query builder untuk mengambil data anggaran beserta data urusan, indikator kinerja terkait, kegiatan terkait, program terkait, subkegiatan terkait, dan indikator terkait.
        $query = $this->db->table('anggaran')
        ->select('anggaran.id, subkegiatan.nama_subkegiatan, satuan.nama_satuan, anggaran.pagu_indikatif, anggaran.target, anggaran.status_perencanaan, anggaran.status_tujuan, subkegiatan.program, subkegiatan.kegiatan, subkegiatan.indikator_subkegiatan, perencanaan.pagu_indikatif AS perencanaan_pagu, perencanaan.target AS perencanaan_target')
            ->join('perencanaan', 'perencanaan.id = anggaran.id_perencanaan')
            ->join('subkegiatan', 'subkegiatan.id = perencanaan.id_subkegiatan')
            ->join('satuan', 'satuan.id = perencanaan.id_satuan')
            ->where('anggaran.status_tujuan', 'KEARSIPAN')
            ->get();

        return $query->getResultArray();
    }

    public function getAnggaranSekretariat()
    {
        // Query builder untuk mengambil data anggaran beserta data urusan, indikator kinerja terkait, kegiatan terkait, program terkait, subkegiatan terkait, dan indikator terkait.
        $query = $this->db->table('anggaran')
        ->select('anggaran.id, subkegiatan.nama_subkegiatan, satuan.nama_satuan, anggaran.pagu_indikatif, anggaran.target, anggaran.status_perencanaan, anggaran.status_tujuan, subkegiatan.program, subkegiatan.kegiatan, subkegiatan.indikator_subkegiatan, perencanaan.pagu_indikatif AS perencanaan_pagu, perencanaan.target AS perencanaan_target')
            ->join('perencanaan', 'perencanaan.id = anggaran.id_perencanaan')
            ->join('subkegiatan', 'subkegiatan.id = perencanaan.id_subkegiatan')
            ->join('satuan', 'satuan.id = perencanaan.id_satuan')
            ->where('anggaran.status_tujuan', 'SEKRETARIAT')
            ->get();

        return $query->getResultArray();
    }

    

   
}
