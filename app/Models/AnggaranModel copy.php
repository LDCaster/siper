<?php

namespace App\Models;

use CodeIgniter\Model;

class AnggaranModel extends Model
{
    protected $table            = 'anggaran';
    protected $allowedFields    = [
        'sumber_pendanaan',
        'lokasi',
        'waktu_pelaksanaan',
        'kelompok_sasaran',
        'jumlah',
        'target',
        'id_perencanaan',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // ambil semua data table anggaran dengan join table urusan, indikator kinerja urusan, kegiatan, program, subkegiatan, dan indikator
    public function getAnggaran()
    {
        // Query builder untuk mengambil data anggaran beserta data urusan, indikator kinerja terkait, kegiatan terkait, program terkait, subkegiatan terkait, dan indikator terkait.
        $query = $this->db->table('anggaran')
            ->select('anggaran.id, anggaran.sumber_pendanaan, anggaran.lokasi, anggaran.waktu_pelaksanaan, anggaran.kelompok_sasaran, anggaran.jumlah, anggaran.target, perencanaan.status_tujuan')
            ->join('perencanaan', 'perencanaan.id = anggaran.id_perencanaan')
            ->get();

        return $query->getResultArray();
    }
    public function getAnggaranPerpustakaan()
    {
        // Query builder untuk mengambil data anggaran beserta data urusan, indikator kinerja terkait, kegiatan terkait, program terkait, subkegiatan terkait, dan indikator terkait.
        $query = $this->db->table('anggaran')
            ->select('anggaran.id, anggaran.sumber_pendanaan, anggaran.lokasi, anggaran.waktu_pelaksanaan, anggaran.kelompok_sasaran, anggaran.jumlah, anggaran.target, perencanaan.status_tujuan, perencanaan.id_subkegiatan, perencanaan.pagu_indikatif, perencanaan.target, satuan.nama_satuan, subkegiatan.nama_subkegiatan, subkegiatan.indikator_subkegiatan')
            ->join('perencanaan', 'perencanaan.id = anggaran.id_perencanaan')
            ->join('subkegiatan', 'subkegiatan.id = perencanaan.id_subkegiatan')
            ->join('satuan', 'satuan.id = perencanaan.id_satuan')
            ->where('status_tujuan', 'PERPUSTAKAAN')
            ->get();

        return $query->getResultArray();
    }
    public function getAnggaranKearsipan()
    {
        // Query builder untuk mengambil data anggaran beserta data urusan, indikator kinerja terkait, kegiatan terkait, program terkait, subkegiatan terkait, dan indikator terkait.
        $query = $this->db->table('anggaran')
        ->select('anggaran.id, anggaran.sumber_pendanaan, anggaran.lokasi, anggaran.waktu_pelaksanaan, anggaran.kelompok_sasaran, anggaran.jumlah, anggaran.target, perencanaan.status_tujuan, perencanaan.id_subkegiatan, perencanaan.pagu_indikatif, perencanaan.target, satuan.nama_satuan, subkegiatan.nama_subkegiatan, subkegiatan.indikator_subkegiatan')
        ->join('perencanaan', 'perencanaan.id = anggaran.id_perencanaan')
        ->join('subkegiatan', 'subkegiatan.id = perencanaan.id_subkegiatan')
        ->join('satuan', 'satuan.id = perencanaan.id_satuan')
            ->where('status_tujuan', 'KEARSIPAN')
            ->get();

        return $query->getResultArray();
    }

    public function getAnggaranSekretariat()
    {
        // Query builder untuk mengambil data anggaran beserta data urusan, indikator kinerja terkait, kegiatan terkait, program terkait, subkegiatan terkait, dan indikator terkait.
        $query = $this->db->table('anggaran')
        ->select('anggaran.id, anggaran.sumber_pendanaan, anggaran.lokasi, anggaran.waktu_pelaksanaan, anggaran.kelompok_sasaran, anggaran.jumlah, anggaran.target, perencanaan.status_tujuan, perencanaan.id_subkegiatan, perencanaan.pagu_indikatif, perencanaan.target, satuan.nama_satuan, subkegiatan.nama_subkegiatan, subkegiatan.indikator_subkegiatan')
        ->join('perencanaan', 'perencanaan.id = anggaran.id_perencanaan')
        ->join('subkegiatan', 'subkegiatan.id = perencanaan.id_subkegiatan')
        ->join('satuan', 'satuan.id = perencanaan.id_satuan')
            ->where('status_tujuan', 'SEKRETARIAT')
            ->get();

        return $query->getResultArray();
    }

    // public function getAnggaranSekretariat()
    // {
    //     // Query builder untuk mengambil data anggaran beserta data urusan, indikator kinerja terkait, kegiatan terkait, program terkait, subkegiatan terkait, dan indikator terkait.
    //     $query = $this->db->table('anggaran')
    //     ->select('anggaran.id, anggaran.sumber_pendanaan, anggaran.lokasi, anggaran.waktu_pelaksanaan, anggaran.kelompok_sasaran, anggaran.jumlah, anggaran.target, anggaran.status, anggaran.satuan, anggaran.sub_kegiatan, subkegiatan.nama_subkegiatan')
    //     // ->join('perencanaan', 'perencanaan.id = anggaran.id_perencanaan')
    //     ->join('subkegiatan', 'subkegiatan.id = anggaran.sub_kegiatan')
    //     // ->join('satuan', 'satuan.id = perencanaan.id_satuan')
    //         ->where('status', 'SEKRETARIAT')
    //         ->get();

    //     return $query->getResultArray();
    // }

    

    // ambil semua data table perencanaan dengan join table urusan, program, kegiatan, subkegiatan dan hanya status_tujuan = perpus
    public function getPerencanaanPerpustakaan()
    {
        // Query builder untuk mengambil data perencanaan beserta data urusan, program, kegiatan, subkegiatan terkait.
        $query = $this->db->table('perencanaan')
            ->select('perencanaan.id, perencanaan.pagu_indikatif, perencanaan.target, satuan.nama_satuan, subkegiatan.nama_subkegiatan, perencanaan.status_tujuan')
            ->join('satuan', 'satuan.id = perencanaan.id_satuan')
            ->join('subkegiatan', 'subkegiatan.id = perencanaan.id_subkegiatan')
            ->where('status_tujuan', 'PERPUSTAKAAN')
            ->get();

        return $query->getResultArray();
    }
    public function getPerencanaanKearsipan()
    {
        // Query builder untuk mengambil data perencanaan beserta data urusan, program, kegiatan, subkegiatan terkait.
        $query = $this->db->table('perencanaan')
            ->select('perencanaan.id, perencanaan.pagu_indikatif, perencanaan.target, satuan.nama_satuan, subkegiatan.nama_subkegiatan, perencanaan.status_tujuan')
            ->join('satuan', 'satuan.id = perencanaan.id_satuan')
            ->join('subkegiatan', 'subkegiatan.id = perencanaan.id_subkegiatan')
            ->where('status_tujuan', 'KEARSIPAN')
            ->get();

        return $query->getResultArray();
    }
    public function getPerencanaanSekretariat()
    {
        // Query builder untuk mengambil data perencanaan beserta data urusan, program, kegiatan, subkegiatan terkait.
        $query = $this->db->table('perencanaan')
            ->select('perencanaan.id, perencanaan.pagu_indikatif, perencanaan.target, satuan.nama_satuan, subkegiatan.nama_subkegiatan, perencanaan.status_tujuan')
            ->join('satuan', 'satuan.id = perencanaan.id_satuan')
            ->join('subkegiatan', 'subkegiatan.id = perencanaan.id_subkegiatan')
            ->where('status_tujuan', 'SEKRETARIAT')
            ->get();

        return $query->getResultArray();
    }

    // ambil semua data table anggaran by id dengan join table detail anggaran
    public function getAnggaranWithDetail($id)
    {
        $query = $this->db->table('anggaran')
            ->select('anggaran.*, detail_anggaran.indikator, detail_anggaran.tolok_ukur_kinerja, detail_anggaran.target_kinerja, perencanaan.id_satuan, satuan.nama_satuan')
            ->join('detail_anggaran', 'detail_anggaran.id_anggaran = anggaran.id')
            ->join('perencanaan', 'perencanaan.id = anggaran.id_perencanaan')
            ->join('satuan', 'satuan.id = perencanaan.id_satuan')
            ->where('anggaran.id', $id)
            ->get();

        return $query->getResultArray();
    }

    // Tambahkan metode berikut untuk mengambil data Indikator Kinerja Urusan
    public function getSatuan()
    {
        return $this->db->table('satuan')->get()->getResultArray();
    }

    // Tambahkan metode berikut untuk mengambil data Urusan
    public function getSubkegiatans()
    {
        return $this->db->table('subkegiatan')->get()->getResultArray();
    }


    public function getSatuanbySubkegiatanForDropdown($subkegiatanID)
    {
        return $this->db->table('satuan')
            ->where('id_subkegiatan', $subkegiatanID)
            ->get()
            ->getResultArray();
    }
    
   
}
