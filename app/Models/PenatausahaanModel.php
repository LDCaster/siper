<?php

namespace App\Models;

use CodeIgniter\Model;

class PenatausahaanModel extends Model
{
    protected $table            = 'penatausahaan';
    protected $allowedFields    = [
        'status',
        'tanggal',
        'karyawan_1',
        'karyawan_2',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getPenatausahaan()
    {
    return $this->select('penatausahaan.id, penatausahaan.status, penatausahaan.tanggal, karyawan_1.nama AS nama_karyawan_1, karyawan_2.nama AS nama_karyawan_2 ')
                ->join('karyawan AS karyawan_1', 'karyawan_1.id = penatausahaan.karyawan_1')
                ->join('karyawan AS karyawan_2', 'karyawan_2.id = penatausahaan.karyawan_2')
                ->findAll();
    }

    public function getPenatausahaan2()
    {
    return $this->select('penatausahaan.id, penatausahaan.status, penatausahaan.tanggal, karyawan_1.nama AS nama_karyawan_1, karyawan_2.nama AS nama_karyawan_2')
                ->join('karyawan AS karyawan_1', 'karyawan_1.id = penatausahaan.karyawan_1')
                ->join('karyawan AS karyawan_2', 'karyawan_2.id = penatausahaan.karyawan_2')
                ->findAll();
    }

    // public function getPenatausahaanDetail($id)
    // {
    // return $this->select('penatausahaan.id, penatausahaan.status, penatausahaan.tanggal, penatausahaan.kinerja_utama, penatausahaan.indikator_kinerja, karyawan_1.nama AS nama_karyawan_1, karyawan_2.nama AS nama_karyawan_2, anggaran.urusan, anggaran.program, anggaran.kegiatan, anggaran.sub_kegiatan ')
    //             ->join('anggaran', 'anggaran.id = penatausahaan.id_anggaran')
    //             ->join('karyawan AS karyawan_1', 'karyawan_1.id = penatausahaan.karyawan_1')
    //             ->join('karyawan AS karyawan_2', 'karyawan_2.id = penatausahaan.karyawan_2')
    //             ->where('penatausahaan.id', $id)
    //             ->get();
    // }
    public function getPenatausahaanDetail($id)
    {
        $query = $this->db->table('penatausahaan')
            ->select('penatausahaan.id, penatausahaan.status, penatausahaan.tanggal,  karyawan_1.nama AS nama_karyawan_1, karyawan_2.nama AS nama_karyawan_2, karyawan_1.jabatan AS jabatan_1, karyawan_2.jabatan AS jabatan_2, karyawan_1.nip AS nip_1, karyawan_2.nip AS nip_2')
            ->join('karyawan AS karyawan_1', 'karyawan_1.id = penatausahaan.karyawan_1')
            ->join('karyawan AS karyawan_2', 'karyawan_2.id = penatausahaan.karyawan_2')
            ->where('penatausahaan.id', $id)
            ->get();

        return $query->getResultArray();
    }

    public function getPenatausahaanDetail2($id)
    {
        $query = $this->db->table('penatausahaan')
            ->select('penatausahaan.id, penatausahaan.status, penatausahaan.tanggal, karyawan_1.nama AS nama_karyawan_1, karyawan_2.nama AS nama_karyawan_2, karyawan_1.nip AS nip_1, karyawan_2.nip AS nip_2,')
            ->join('karyawan AS karyawan_1', 'karyawan_1.id = penatausahaan.karyawan_1')
            ->join('karyawan AS karyawan_2', 'karyawan_2.id = penatausahaan.karyawan_2')
            ->where('penatausahaan.id', $id)
            ->get();

        return $query->getResultArray();
    }

    

    // public function getAnggaranWithDetail($id)
    // {
    //     $query = $this->db->table('anggaran')
    //         ->select('anggaran.*, detail_anggaran.indikator, detail_anggaran.tolok_ukur_kinerja, detail_anggaran.target_kinerja, perencanaan.id_satuan, satuan.nama_satuan')
    //         ->join('detail_anggaran', 'detail_anggaran.id_anggaran = anggaran.id')
    //         ->join('perencanaan', 'perencanaan.id = anggaran.id_perencanaan')
    //         ->join('satuan', 'satuan.id = perencanaan.id_satuan')
    //         ->where('anggaran.id', $id)
    //         ->get();

    //     return $query->getResultArray();
    // }

}
