<?php

namespace App\Models;

use CodeIgniter\Model;

class DDPelaporanModel extends Model
{
    protected $table            = 'dd_pelaporan';
    protected $allowedFields    = [
        'nama_file', 'file', 'tahun', 'status_tujuan'
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

    public function getDDlakip()
    {
        // Query builder untuk mengambil data perencanaan beserta data urusan, program, kegiatan, subkegiatan terkait.
        $query = $this->db->table('dd_pelaporan')
            ->select('*')
            ->where('status_tujuan', 'LAKIP')
            ->get();

        return $query->getResultArray();
    }

    public function getDDlppd()
    {
        // Query builder untuk mengambil data perencanaan beserta data urusan, program, kegiatan, subkegiatan terkait.
        $query = $this->db->table('dd_pelaporan')
            ->select('*')
            ->where('status_tujuan', 'LPPD')
            ->get();

        return $query->getResultArray();
    }

  
}
