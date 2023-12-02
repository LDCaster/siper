<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PohonSeeders extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'nama_bidang' => 'DINAS PERPUSTAKAAN DAN KEARSIPAN',
                'sasaran' => 'sasaran DINAS PERPUSTAKAAN DAN KEARSIPAN ',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '2',
                'nama_bidang' => 'SEKRETARIS',
                'sasaran' => 'sasaran SEKRETARIS ',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '3',
                'nama_bidang' => 'BIDANG PERPUSTAKAAN',
                'sasaran' => 'sasaran PERPUSTAKAAN ',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '4',
                'nama_bidang' => 'BIDANG PENYELENGGARAAN ARSIP',
                'sasaran' => 'sasaran PENYELENGGARAAN ARSIP',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '5',
                'nama_bidang' => 'SUB BAGIAN UMUM DAN KEPEGAWAIAN',
                'sasaran' => 'sasaran BAGIAN UMUM DAN KEPEGAWAIAN ',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '6',
                'nama_bidang' => 'SUB BAGIAN PERENCANAAN DAN KEUANGAN',
                'sasaran' => 'sasaran SUB BAGIAN PERENCANAAN DAN KEUANGAN ',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '7',
                'nama_bidang' => 'SUB KOORDINASI LAYANAN, ALIH MEDIA, DAN OTOMASI PERPUSTAKAAN',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '8',
                'nama_bidang' => 'SUB KOORDINASI PENGEMBANGAN KOLEKSI,PENGOLAHAN, DAN KONSERVASI BAHAN PERPUSTAKAAN',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '9',
                'nama_bidang' => 'SUB KOORDINASI PEMBINAAN PERPUSTAKAAN DAN PEMBUDAYAAN KEGEMARAN MEMBACA',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '10',
                'nama_bidang' => 'SUB KOORDINASI PEMBINAAN KEARSIPAN',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '11',
                'nama_bidang' => 'SUB KOORDINASI PENGELOLAAN ARSIP',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '12',
                'nama_bidang' => 'SUB KOORDINASI PENGAWASAN KEARSIPAN',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
           
        ];

        // Memasukkan data ke tabel user
        $this->db->table('pohon_kinerja')->insertBatch($data);
    }
}
