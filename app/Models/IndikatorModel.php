<?php

namespace App\Models;

use CodeIgniter\Model;

class IndikatorModel extends Model
{
    protected $table            = 'indikator';
    protected $allowedFields    = [
        'id_urusan',
        'id_indikator_kinerja_urusan',
        'id_program',
        'id_kegiatan',
        'id_subkegiatan',
        'nama_indikator',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // join table program dengan table urusan dan indikator_kinerja_urusan
    public function getKegiatanWithUrusanAndIndikatorKinerjaAndProgramAndKegiatanAndSubkegiatan()
    {
        // Query builder untuk mengambil data program beserta data urusan dan indikator kinerja terkait.
        $query = $this->db->table('indikator')
            ->select('indikator.id, indikator.nama_indikator, urusan.nama_urusan, indikator_kinerja_urusan.nama_indikator_kinerja, program.nama_program, kegiatan.nama_kegiatan, subkegiatan.nama_subkegiatan' )
            ->join('urusan', 'urusan.id = indikator.id_urusan')
            ->join('indikator_kinerja_urusan', 'indikator_kinerja_urusan.id = indikator.id_indikator_kinerja_urusan')
            ->join('program', 'program.id = indikator.id_program')
            ->join('kegiatan', 'kegiatan.id = indikator.id_kegiatan')
            ->join('subkegiatan', 'subkegiatan.id = indikator.id_subkegiatan')
            ->get();
        
        return $query->getResultArray();
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

    // Tambahkan metode berikut untuk mengambil data program
    public function getPrograms()
    {
        return $this->db->table('program')->get()->getResultArray();
    }
    // Tambahkan metode berikut untuk mengambil data kegiatan
    public function getKegiatans()
    {
        return $this->db->table('kegiatan')->get()->getResultArray();
    }
    // Tambahkan metode berikut untuk mengambil data subkegiatan
    public function getSubkegiatans()
    {
        return $this->db->table('subkegiatan')->get()->getResultArray();
    }

    public function getIndikatorKinerjaByUrusan($id_urusan)
    {
        return $this->db->table('indikator_kinerja_urusan')
            ->where('id_urusan', $id_urusan)
            ->get()
            ->getResultArray();
    }

    public function getProgramByIndikator($id_indikator_kinerja_urusan) 
    {
        return $this->db->table('program')
            ->where('id_indikator_kinerja_urusan', $id_indikator_kinerja_urusan)
            ->get()
            ->getResultArray();
    }

    public function getKegiatanByProgram($id_program)
    {
        return $this->db->table('kegiatan')
            ->where('id_program', $id_program)
            ->get()
            ->getResultArray();
    }

    public function getSubkegiatanByKegiatan($id_kegiatan)
    {
        return $this->db->table('subkegiatan')
            ->where('id_kegiatan', $id_kegiatan)
            ->get()
            ->getResultArray();
    }



    
}
