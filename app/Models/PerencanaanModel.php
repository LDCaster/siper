<?php

namespace App\Models;

use CodeIgniter\Model;

class PerencanaanModel extends Model
{
    protected $table            = 'perencanaan';
    protected $allowedFields    = [
        'id_subkegiatan',
        'id_satuan',
        'pagu_indikatif',
        'target',
        'status_perencanaan',
        'status_tujuan',
    ];

    // Dates
    protected $subKegiatanModel;

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // ambil semua data table perencanaan dengan join table urusan, indikator_kinerja_urusan program, kegiatan, subkegiatan, indikator, dan satuan

    public function getPerencanaan()
    {
        // Query builder untuk mengambil data perencanaan beserta data urusan, indikator_kinerja_urusan program, kegiatan, subkegiatan, indikator, dan satuan terkait.
        $query = $this->db->table('perencanaan')
            ->select('perencanaan.id, subkegiatan.nama_subkegiatan, satuan.nama_satuan, perencanaan.pagu_indikatif, perencanaan.target, perencanaan.status_perencanaan, perencanaan.status_tujuan, subkegiatan.urusan, subkegiatan.program, subkegiatan.kegiatan, subkegiatan.indikator_subkegiatan')
            ->join('subkegiatan', 'subkegiatan.id = perencanaan.id_subkegiatan')
            ->join('satuan', 'satuan.id = perencanaan.id_satuan')
            ->where('status_tujuan', 'PERPUSTAKAAN')
            ->get();

        return $query->getResultArray();
    }
    public function getPerencanaanArsip()
    {
        // Query builder untuk mengambil data perencanaan beserta data urusan, indikator_kinerja_urusan program, kegiatan, subkegiatan, indikator, dan satuan terkait.
        $query = $this->db->table('perencanaan')
            ->select('perencanaan.id, subkegiatan.nama_subkegiatan, satuan.nama_satuan, perencanaan.pagu_indikatif, perencanaan.target, perencanaan.status_perencanaan, perencanaan.status_tujuan, subkegiatan.urusan, subkegiatan.program, subkegiatan.kegiatan, subkegiatan.indikator_subkegiatan')
            ->join('subkegiatan', 'subkegiatan.id = perencanaan.id_subkegiatan')
            ->join('satuan', 'satuan.id = perencanaan.id_satuan')
            ->where('status_tujuan', 'KEARSIPAN')
            ->get();

        return $query->getResultArray();
    }
    // public function getPerencanaanRakor()
    // {
    //     // Query builder untuk mengambil data perencanaan beserta data urusan, indikator_kinerja_urusan program, kegiatan, subkegiatan, indikator, dan satuan terkait.
    //     $query = $this->db->table('perencanaan')
    //         ->select('perencanaan.id, subkegiatan.nama_subkegiatan, satuan.nama_satuan, perencanaan.pagu_indikatif, perencanaan.target, perencanaan.status_perencanaan, perencanaan.status_tujuan')
    //         ->join('urusan', 'urusan.id = perencanaan.id_urusan')
    //         ->join('indikator_kinerja_urusan', 'indikator_kinerja_urusan.id = perencanaan.id_indikator_kinerja_urusan')
    //         ->join('program', 'program.id = perencanaan.id_program')
    //         ->join('kegiatan', 'kegiatan.id = perencanaan.id_kegiatan')
    //         ->join('subkegiatan', 'subkegiatan.id = perencanaan.id_subkegiatan')
    //         ->join('indikator', 'indikator.id = perencanaan.id_indikator')
    //         ->join('satuan', 'satuan.id = perencanaan.id_satuan')
    //         ->where('status_perencanaan', 'rakortekbang')
    //         ->get();

    //     return $query->getResultArray();
    // }
    public function getPerencanaanRenja()
    {
        // Query builder untuk mengambil data perencanaan beserta data urusan, indikator_kinerja_urusan program, kegiatan, subkegiatan, indikator, dan satuan terkait.
        $query = $this->db->table('perencanaan')

            ->select('perencanaan.id, subkegiatan.nama_subkegiatan, satuan.nama_satuan, perencanaan.pagu_indikatif, perencanaan.target, perencanaan.status_perencanaan, perencanaan.status_tujuan, subkegiatan.urusan, subkegiatan.program, subkegiatan.kegiatan, subkegiatan.indikator_subkegiatan')
            ->join('subkegiatan', 'subkegiatan.id = perencanaan.id_subkegiatan')
            ->join('satuan', 'satuan.id = perencanaan.id_satuan')
            ->get();
            

        return $query->getResultArray();
    }
    
      

        public function getSubkegiatan()
    {
        return $this->findAll(); // Sesuaikan dengan metode pengambilan data di tabel subkegiatan
    }

    public function getIndikatorBySubkegiatan($id_subkegiatan)
{
    try {
        $result = $this->db->table('indikator_kinerja_urusan')
            ->where('id_subkegiatan', $id_subkegiatan)
            ->get()
            ->getResultArray();

        if ($result === false) {
            throw new \Exception('Error executing query.');
        }

        return $result;
    } catch (\Exception $e) {
        return false;
    }
}

    
}
