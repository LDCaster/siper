<?php

namespace App\Models;

use CodeIgniter\Model;

class BuktiPelaporanModel extends Model
{
    protected $table            = 'bukti';
    protected $allowedFields    = [
        'id_anggaran', 'nama_file', 'file', 'tahun','status_data','status_verifikasi', 'status_persetujuan'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';


    public function getAllData()
    {
        return $this->findAll();
    }

    public function getBukti()
    {
        // Query builder untuk mengambil data indikator_kinerja_urusan beserta data urusan terkait.
        $query = $this->db->table('bukti')
            ->select('bukti.id, bukti.id_anggaran, bukti.nama_file, bukti.file, bukti.tahun, bukti.status_data, bukti.status_verifikasi, bukti.status_persetujuan, anggaran.sub_kegiatan, anggaran.target, anggaran.jumlah, perencanaan.id_satuan, satuan.nama_satuan, anggaran.id_perencanaan')
            ->join('anggaran', 'anggaran.id = bukti.id_anggaran')
            ->join('perencanaan', 'perencanaan.id = anggaran.id_perencanaan')
            ->join('satuan', 'satuan.id = perencanaan.id_satuan')
            // ->join('subkegiatan', 'subkegiatan.id = perencanaan.id_subkegiatan')
            ->get();
        
        return $query->getResultArray();
    }

    public function getBuktiPerpus()
    {
        // Query builder untuk mengambil data indikator_kinerja_urusan beserta data urusan terkait.
        $query = $this->db->table('bukti')
            ->select('bukti.id, bukti.id_anggaran, bukti.nama_file, bukti.file, bukti.tahun, bukti.status_data, bukti.status_verifikasi, bukti.status_persetujuan, anggaran.sub_kegiatan, anggaran.target, anggaran.jumlah, perencanaan.id_satuan, satuan.nama_satuan, anggaran.id_perencanaan')
            ->join('anggaran', 'anggaran.id = bukti.id_anggaran')
            ->join('perencanaan', 'perencanaan.id = anggaran.id_perencanaan')
            ->join('satuan', 'satuan.id = perencanaan.id_satuan')
            ->where('status_data','PERPUSTAKAAN')
            ->get();
        
        return $query->getResultArray();
    }

    public function getBuktiArsip()
    {
        // Query builder untuk mengambil data indikator_kinerja_urusan beserta data urusan terkait.
        $query = $this->db->table('bukti')
            ->select('bukti.id, bukti.id_anggaran, bukti.nama_file, bukti.file, bukti.tahun, bukti.status_data, bukti.status_verifikasi, bukti.status_persetujuan, anggaran.sub_kegiatan, anggaran.target, anggaran.jumlah, perencanaan.id_satuan, satuan.nama_satuan, anggaran.id_perencanaan')
            ->join('anggaran', 'anggaran.id = bukti.id_anggaran')
            ->join('perencanaan', 'perencanaan.id = anggaran.id_perencanaan')
            ->join('satuan', 'satuan.id = perencanaan.id_satuan')
            ->where('status_data','KEARSIPAN')
            ->get();
        
        return $query->getResultArray();
    }
    public function getBuktiPersetujuan()
    {
        // Query builder untuk mengambil data indikator_kinerja_urusan beserta data urusan terkait.
        $query = $this->db->table('bukti')
            ->select('bukti.id, bukti.id_anggaran, bukti.nama_file, bukti.file, bukti.tahun, bukti.status_data, bukti.status_verifikasi, bukti.status_persetujuan, anggaran.sub_kegiatan, anggaran.target, anggaran.jumlah, perencanaan.id_satuan, satuan.nama_satuan, anggaran.id_perencanaan')
            ->join('anggaran', 'anggaran.id = bukti.id_anggaran')
            ->join('perencanaan', 'perencanaan.id = anggaran.id_perencanaan')
            ->join('satuan', 'satuan.id = perencanaan.id_satuan')
            ->where('status_verifikasi','DITERIMA')
            ->get();
        
        return $query->getResultArray();
    }

    public function updateStatusVerifikasi($id, $status)
    {
        return $this->set(['status_verifikasi' => $status])->where('id', $id)->update();
    }
    
    public function updateStatusPersetujuan($id, $status)
    {
        return $this->set(['status_persetujuan' => $status])->where('id', $id)->update();
    }
    

}
