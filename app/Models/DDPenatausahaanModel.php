<?php

namespace App\Models;

use CodeIgniter\Model;

class DDPenatausahaanModel extends Model
{
    protected $table            = 'dd_penatausahaan';
    protected $allowedFields    = [
        'nama_file', 'file', 'tahun','status_tujuan'
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
    public function getDDperpus()
    {
        // Query builder untuk mengambil data perencanaan beserta data urusan, program, kegiatan, subkegiatan terkait.
        $query = $this->db->table('dd_penatausahaan')
            ->select('*')
            ->where('status_tujuan', 'PERPUSTAKAAN')
            ->get();

        return $query->getResultArray();
    }

    public function getDDarsip()
    {
        // Query builder untuk mengambil data perencanaan beserta data urusan, program, kegiatan, subkegiatan terkait.
        $query = $this->db->table('dd_penatausahaan')
            ->select('*')
            ->where('status_tujuan', 'KEARSIPAN')
            ->get();

        return $query->getResultArray();
    }

    public function getDDsekre()
    {
        // Query builder untuk mengambil data perencanaan beserta data urusan, program, kegiatan, subkegiatan terkait.
        $query = $this->db->table('dd_penatausahaan')
            ->select('*')
            ->where('status_tujuan', 'SEKRETARIAT')
            ->get();

        return $query->getResultArray();
    }
}
