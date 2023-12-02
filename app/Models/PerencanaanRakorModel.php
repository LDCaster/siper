<?php

namespace App\Models;

use CodeIgniter\Model;

class PerencanaanRakorModel extends Model
{
    protected $table            = 'rakor';
    protected $allowedFields    = [
        'id_subkegiatan',
        'id_indikator_kinerja_urusan',
        'id_satuan',
        'pagu_indikatif',
        'target',
        'status_perencanaan',
        'status_tujuan',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // ambil semua data table perencanaan dengan join table urusan, indikator_kinerja_urusan program, kegiatan, subkegiatan, indikator, dan satuan

    public function getRakor()
    {
        // Query builder untuk mengambil data perencanaan beserta data urusan, indikator_kinerja_urusan program, kegiatan, subkegiatan, indikator, dan satuan terkait.
        $query = $this->db->table('rakor')
            ->select('rakor.id, indikator_kinerja_urusan.nama_indikator_kinerja, subkegiatan.nama_subkegiatan, satuan.nama_satuan, rakor.pagu_indikatif, rakor.target, rakor.status_perencanaan, rakor.status_tujuan, subkegiatan.urusan, subkegiatan.program, subkegiatan.kegiatan, subkegiatan.indikator_subkegiatan')
            ->join('indikator_kinerja_urusan', 'indikator_kinerja_urusan.id = rakor.id_indikator_kinerja_urusan')
            ->join('subkegiatan', 'subkegiatan.id = rakor.id_subkegiatan')
            ->join('satuan', 'satuan.id = rakor.id_satuan')
            ->where('status_tujuan', 'PERPUSTAKAAN')

            ->get();

        return $query->getResultArray();
    }
    public function getRakorarsip()
    {
        // Query builder untuk mengambil data perencanaan beserta data urusan, indikator_kinerja_urusan program, kegiatan, subkegiatan, indikator, dan satuan terkait.
        $query = $this->db->table('rakor')
            ->select('rakor.id, indikator_kinerja_urusan.nama_indikator_kinerja, subkegiatan.nama_subkegiatan, satuan.nama_satuan, rakor.pagu_indikatif, rakor.target, rakor.status_perencanaan, rakor.status_tujuan, subkegiatan.urusan, subkegiatan.program, subkegiatan.kegiatan, subkegiatan.indikator_subkegiatan')
            ->join('indikator_kinerja_urusan', 'indikator_kinerja_urusan.id = rakor.id_indikator_kinerja_urusan')
            ->join('subkegiatan', 'subkegiatan.id = rakor.id_subkegiatan')
            ->join('satuan', 'satuan.id = rakor.id_satuan')
            ->where('status_tujuan', 'KEARSIPAN')
            ->get();

        return $query->getResultArray();
    }
    public function getPerencanaanRakor()
    {
        // Query builder untuk mengambil data perencanaan beserta data urusan, indikator_kinerja_urusan program, kegiatan, subkegiatan, indikator, dan satuan terkait.
        $query = $this->db->table('rakor')
            ->select('rakor.id, indikator_kinerja_urusan.nama_indikator_kinerja, subkegiatan.nama_subkegiatan, satuan.nama_satuan, rakor.pagu_indikatif, rakor.target, rakor.status_perencanaan, rakor.status_tujuan, subkegiatan.urusan, subkegiatan.program, subkegiatan.kegiatan, subkegiatan.indikator_subkegiatan')
            ->join('indikator_kinerja_urusan', 'indikator_kinerja_urusan.id = rakor.id_indikator_kinerja_urusan')
            ->join('subkegiatan', 'subkegiatan.id = rakor.id_subkegiatan')
            ->join('satuan', 'satuan.id = rakor.id_satuan')
            ->where('status_tujuan', 'PERPUSTAKAAN')
            ->get();

        return $query->getResultArray();
    }
    
    
    public function getSubkegiatan()
    {
        return $this->findAll(); // Sesuaikan dengan metode pengambilan data di tabel subkegiatan
    }

    public function getIndikatorBySubkegiatanrakor($id_subkegiatan)
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
