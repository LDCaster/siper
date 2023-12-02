<?php

namespace App\Models;

use CodeIgniter\Model;

class IndikatorKinerjaUrusanModel extends Model
{
    protected $table            = 'indikator_kinerja_urusan';
    protected $allowedFields    = [
        'id_subkegiatan',
        'nama_indikator_kinerja',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // ambil semua data table indikator_kinerja_urusan dengan join table urusan
    public function getIndikatorKinerjaUrusan()
    {
        // Query builder untuk mengambil data indikator_kinerja_urusan beserta data urusan terkait.
        $query = $this->db->table('indikator_kinerja_urusan')
            ->select('indikator_kinerja_urusan.id, indikator_kinerja_urusan.nama_indikator_kinerja, subkegiatan.nama_subkegiatan, subkegiatan.urusan, subkegiatan.program, subkegiatan.kegiatan, subkegiatan.indikator_subkegiatan')
            ->join('subkegiatan', 'subkegiatan.id = indikator_kinerja_urusan.id_subkegiatan')
            ->get();
        
        return $query->getResultArray();
    }
    


}
