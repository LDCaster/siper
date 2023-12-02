<?php

namespace App\Models;

use CodeIgniter\Model;

class PelaporanModel extends Model
{
    protected $table            = 'pelaporan';
    protected $allowedFields    = [
        'id_anggaran',
        'id_bukti',
        'status',
        'realisasi_nominal',
        'tahun',
        'tw',
        'status_backup'
        // 'status_persetujuan',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    //fungsi untuk dipanggil semua di pelaporan lakip
    public function getPelaporan()
    {
        return $this->select('pelaporan.id, pelaporan.status, pelaporan.realisasi_nominal, pelaporan.tahun, pelaporan.tw, pelaporan.status_backup, pelaporan.id_bukti, anggaran.pagu_indikatif, anggaran.target, bukti.status_persetujuan, satuan.nama_satuan')
                    ->join('anggaran', 'anggaran.id = pelaporan.id_anggaran')
                    ->join('perencanaan', 'perencanaan.id = anggaran.id_perencanaan')
                    ->join('satuan', 'satuan.id = perencanaan.id_satuan')
                    ->join('bukti', 'bukti.id = pelaporan.id_bukti')
                    ->where('status_backup', 'aktif')
                    ->where('status_persetujuan', 'DISETUJUI')
                    ->findAll();
    }
    // public function getPelaporan()
    // {
    //     return $this->select('pelaporan.id, pelaporan.status, pelaporan.realisasi_nominal, pelaporan.tahun, pelaporan.tw, pelaporan.status_backup, pelaporan.id_bukti, anggaran.id_perencanaan, perencanaan.id_satuan, anggaran.target, satuan.id, satuan.nama_satuan, anggaran.pagu_indikatif, bukti.status_verifikasi, bukti.status_persetujuan')
    //                 ->join('anggaran', 'anggaran.id = pelaporan.id_anggaran')
    //                 ->join('perencanaan', 'perencanaan.id = anggaran.id_perencanaan')
    //                 ->join('satuan', 'satuan.id = perencanaan.id_satuan')
    //                 ->join('bukti', 'bukti.id = pelaporan.id_bukti')
    //                 ->where('status_backup', 'aktif')
    //                 ->where('status_verifikasi', 'DITERIMA')
    //                 ->where('status_persetujuan', 'DISETUJUI')
    //                 ->findAll();
    // }

    //untuk di halaman TW-1 
    public function getTW1()
    {
        $query = $this->db->table('pelaporan')
                    ->select('pelaporan.id, pelaporan.status, pelaporan.realisasi_nominal, pelaporan.tahun, pelaporan.tw, pelaporan.status_backup, pelaporan.id_bukti, anggaran.pagu_indikatif, anggaran.target, bukti.status_persetujuan, satuan.nama_satuan')
                    ->join('anggaran', 'anggaran.id = pelaporan.id_anggaran')
                    ->join('perencanaan', 'perencanaan.id = anggaran.id_perencanaan')
                    ->join('satuan', 'satuan.id = perencanaan.id_satuan')
                    ->join('bukti', 'bukti.id = pelaporan.id_bukti')
                    ->where('tw', 'TW-1')
                    ->get();
        return $query->getResultArray();

    }

    //Untuk di halaman TW-2 
    public function getTW2()
    {
        return $this->select('pelaporan.id, pelaporan.status, pelaporan.realisasi_nominal, pelaporan.tahun, pelaporan.tw, pelaporan.status_backup, pelaporan.id_bukti, anggaran.pagu_indikatif, anggaran.target, bukti.status_persetujuan, satuan.nama_satuan')
        ->join('anggaran', 'anggaran.id = pelaporan.id_anggaran')
        ->join('perencanaan', 'perencanaan.id = anggaran.id_perencanaan')
        ->join('satuan', 'satuan.id = perencanaan.id_satuan')
        ->join('bukti', 'bukti.id = pelaporan.id_bukti')
                    ->where('tw', 'TW-2')
                    ->findAll();
    }

    //Untuk di halaman TW-3 
    public function getTW3()
    {
        return $this->select('pelaporan.id, pelaporan.status, pelaporan.realisasi_nominal, pelaporan.tahun, pelaporan.tw, pelaporan.status_backup, pelaporan.id_bukti, anggaran.pagu_indikatif, anggaran.target, bukti.status_persetujuan, satuan.nama_satuan')
        ->join('anggaran', 'anggaran.id = pelaporan.id_anggaran')
        ->join('perencanaan', 'perencanaan.id = anggaran.id_perencanaan')
        ->join('satuan', 'satuan.id = perencanaan.id_satuan')
        ->join('bukti', 'bukti.id = pelaporan.id_bukti')
                    ->where('tw', 'TW-3')
                    ->findAll();
    }

    //Untuk di halaman TW-4 
    public function getTW4()
    {
        return $this->select('pelaporan.id, pelaporan.status, pelaporan.realisasi_nominal, pelaporan.tahun, pelaporan.tw, pelaporan.status_backup, pelaporan.id_bukti, anggaran.pagu_indikatif, anggaran.target, bukti.status_persetujuan, satuan.nama_satuan')
        ->join('anggaran', 'anggaran.id = pelaporan.id_anggaran')
        ->join('perencanaan', 'perencanaan.id = anggaran.id_perencanaan')
        ->join('satuan', 'satuan.id = perencanaan.id_satuan')
        ->join('bukti', 'bukti.id = pelaporan.id_bukti')
                    ->where('tw', 'TW-4')
                    ->findAll();
    }

    // fungsi untuk halaman backup
    public function getBackupPelaporan()
    {
        return $this->select('pelaporan.id, pelaporan.status, pelaporan.realisasi_nominal, pelaporan.tahun, pelaporan.tw, pelaporan.status_backup, pelaporan.id_bukti, anggaran.pagu_indikatif, anggaran.target, bukti.status_persetujuan, satuan.nama_satuan')
        ->join('anggaran', 'anggaran.id = pelaporan.id_anggaran')
        ->join('perencanaan', 'perencanaan.id = anggaran.id_perencanaan')
        ->join('satuan', 'satuan.id = perencanaan.id_satuan')
        ->join('bukti', 'bukti.id = pelaporan.id_bukti')
                    ->where('status_backup', 'BACKUP')
                    ->findAll();
    }
}
