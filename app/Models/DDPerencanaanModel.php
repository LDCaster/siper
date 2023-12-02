<?php

namespace App\Models;

use CodeIgniter\Model;

class DDPerencanaanModel extends Model
{
    protected $table            = 'dd_perencanaan';
    protected $allowedFields    = [
        'nama_file', 'file', 'tahun', 'status_file', 'status_tujuan'
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

    
    public function getDDRakor()
    {
        // Query builder untuk mengambil data perencanaan beserta data urusan, program, kegiatan, subkegiatan terkait.
        $query = $this->db->table('dd_perencanaan')
            ->select('*')
            ->where('status_file', 'RAKORTEKBANG')
            ->where('status_tujuan', 'PERPUSTAKAAN')
            ->get();

        return $query->getResultArray();
    }
    public function getDDRakorarsip()
    {
        // Query builder untuk mengambil data perencanaan beserta data urusan, program, kegiatan, subkegiatan terkait.
        $query = $this->db->table('dd_perencanaan')
            ->select('*')
            ->where('status_file', 'RAKORTEKBANG')
            ->where('status_tujuan', 'KEARSIPAN')
            ->get();

        return $query->getResultArray();
    }
    public function getDDUmum()
    {
        // Query builder untuk mengambil data perencanaan beserta data urusan, program, kegiatan, subkegiatan terkait.
        $query = $this->db->table('dd_perencanaan')
            ->select('*')
            ->where('status_file', 'LAINNYA')
            ->get();

        return $query->getResultArray();
    }
    
    public function getDDRenja()
    {
        // Query builder untuk mengambil data perencanaan beserta data urusan, program, kegiatan, subkegiatan terkait.
        $query = $this->db->table('dd_perencanaan')
            ->select('*')
            ->where('status_file', 'RENJA')
            ->get();

        return $query->getResultArray();
    }

}
