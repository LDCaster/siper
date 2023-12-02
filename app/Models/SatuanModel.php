<?php

namespace App\Models;

use CodeIgniter\Model;

class SatuanModel extends Model
{
    protected $table            = 'satuan';
    protected $allowedFields    = [
        'nama_satuan',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // ambil semua data table satuan dengan join table urusan, indikator kinerja urusan, kegiatan, program, subkegiatan, dan indikator
    public function getSatuan()
    {
        // Query builder untuk mengambil data satuan beserta data urusan, indikator kinerja terkait, kegiatan terkait, program terkait, subkegiatan terkait, dan indikator terkait.
        $query = $this->db->table('satuan')
            ->select('satuan.id, satuan.nama_satuan')
            ->get();

        return $query->getResultArray();
    }

}
