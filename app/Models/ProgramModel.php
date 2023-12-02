<?php

namespace App\Models;

use CodeIgniter\Model;

class ProgramModel extends Model
{
    protected $table = 'program';
    protected $allowedFields = [
        'id_urusan',
        'id_indikator_kinerja_urusan',
        'nama_program',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // join table program dengan table urusan dan indikator_kinerja_urusan
    public function getProgramWithUrusanAndIndikatorKinerja()
    {
        // Query builder untuk mengambil data program beserta data urusan dan indikator kinerja terkait.
        $query = $this->db->table('program')
            ->select('program.id, program.nama_program, urusan.nama_urusan, indikator_kinerja_urusan.nama_indikator_kinerja')
            ->join('urusan', 'urusan.id = program.id_urusan')
            ->join('indikator_kinerja_urusan', 'indikator_kinerja_urusan.id = program.id_indikator_kinerja_urusan')
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

    // Tambahkan metode berikut untuk mengambil data Indikator Kinerja Urusan berdasarkan Urusan
    public function getIndikatorKinerjaByUrusanForDropdown($urusanID)
    {
        return $this->db->table('indikator_kinerja_urusan')
            ->where('id_urusan', $urusanID)
            ->get()
            ->getResultArray();
    }
}
