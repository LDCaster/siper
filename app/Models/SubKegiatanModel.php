<?php

namespace App\Models;

use CodeIgniter\Model;

class SubKegiatanModel extends Model
{
    protected $table            = 'subkegiatan';
    protected $allowedFields    = [
        'nama_subkegiatan',
        'urusan',
        'kegiatan',
        'program',
        'indikator_subkegiatan',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // ambil semua data table subkegiatan dengan join table urusan, indikator kinerja urusan, kegiatan, dan program
    public function getSubkegiatan()
    {
        // Query builder untuk mengambil data subkegiatan beserta data urusan, indikator kinerja terkait, kegiatan terkait, dan program terkait.
        $query = $this->db->table('subkegiatan')
            ->select('subkegiatan.id, subkegiatan.nama_subkegiatan, subkegiatan.urusan, subkegiatan.kegiatan, subkegiatan.program, subkegiatan.indikator_subkegiatan')
            ->get();

        return $query->getResultArray();
    }

    // Tambahkan metode berikut untuk mengambil data Indikator Kinerja Urusan berdasarkan Urusan yang dipilih
    // public function getIndikatorKinerjaByUrusan($id_urusan)
    // {
    //     return $this->db->table('indikator_kinerja_urusan')
    //         ->where('id_urusan', $id_urusan)
    //         ->get()
    //         ->getResultArray();
    // }

    // public function getProgramByIndikator($id_indikator_kinerja_urusan) 
    // {
    //     return $this->db->table('program')
    //         ->where('id_indikator_kinerja_urusan', $id_indikator_kinerja_urusan)
    //         ->get()
    //         ->getResultArray();
    // }

    // public function getKegiatanByProgram($id_program)
    // {
    //     return $this->db->table('kegiatan')
    //         ->where('id_program', $id_program)
    //         ->get()
    //         ->getResultArray();
    // }

}
