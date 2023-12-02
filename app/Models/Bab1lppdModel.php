<?php

namespace App\Models;

use CodeIgniter\Model;

class Bab1lakipModel extends Model
{
    protected $table            = 'bab1lakip';
    protected $allowedFields    = [
        // 'id_karyawan',
        'latar_belakang',
        'narasi_struktur',
        'foto_struktur',
        'narasi_foto',
        'permasalahan_utama',
        'produk_layanan',
        'sistematika',
        'tahun',
        'status_laporan' 
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getBab1lakip()
{
    return $this->select('bab1lakip.id, bab1lakip.latar_belakang, bab1lakip.narasi_struktur, bab1lakip.foto_struktur, bab1lakip.narasi_foto, bab1lakip.permasalahan_utama, bab1lakip.produk_layanan, bab1lakip.sistematika, bab1lakip.tahun, bab1lakip.status_laporan, karyawan.nama')
                ->join('karyawan', 'karyawan.id = bab1lakip.id_karyawan')
                ->findAll();
}


}
