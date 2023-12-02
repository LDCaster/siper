<?php

namespace App\Models;

use CodeIgniter\Model;

class KegiatanModel extends Model
{
    protected $table            = 'kegiatan';
    protected $allowedFields    = [
        'id_urusan',
        'id_indikator_kinerja_urusan',
        'id_program',
        'nama_kegiatan',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // join table kegiatan dengan table urusan,indikator_kinerja_urusan dan program
    public function getKegiatanWithUrusanAndIndikatorKinerja() 
    {
        // Query builder untuk mengambil data kegiatan beserta data urusan, indikator kinerja terkait dan program terkait.
        $query = $this->db->table('kegiatan')
            ->select('kegiatan.id, kegiatan.nama_kegiatan, urusan.nama_urusan, indikator_kinerja_urusan.nama_indikator_kinerja, program.nama_program')
            ->join('urusan', 'urusan.id = kegiatan.id_urusan')
            ->join('indikator_kinerja_urusan', 'indikator_kinerja_urusan.id = kegiatan.id_indikator_kinerja_urusan')
            ->join('program', 'program.id = kegiatan.id_program')
            ->get();
        
        return $query->getResultArray();
    }

    public function getIndikatorKinerjaByUrusan($urusanID)
    {
        return $this->db->table('indikator_kinerja_urusan')
            ->where('id_urusan', $urusanID)
            ->get()
            ->getResultArray();
    }

    public function getProgramByIndikatorKinerja($indikatorKinerjaID)
    {
        return $this->db->table('program')
            ->where('id_indikator_kinerja_urusan', $indikatorKinerjaID)
            ->get()
            ->getResultArray();
    }


    // Tambahkan metode berikut untuk mengambil data Indikator Kinerja Urusan
    public function getIndikatorKinerjaUrusan()
    {
        return $this->db->table('indikator_kinerja_urusan')->get()->getResultArray();
    }

    // Tambahkan metode berikut untuk mengambil data Urusan
    public function getUrusans()
    {
        return $this->db->table('urusan')->get()->getResultArray();
    }

    // Tambahkan metode berikut untuk mengambil data Program
    public function getPrograms()
    {
        return $this->db->table('program')->get()->getResultArray();
    }
}
