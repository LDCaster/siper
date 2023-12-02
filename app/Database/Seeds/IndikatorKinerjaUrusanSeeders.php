<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class IndikatorKinerjaUrusanSeeders extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'nama_indikator_kinerja' => 'Indeks Pembangunan Literasi Masyarakat',
                'id_subkegiatan' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '2',
                'nama_indikator_kinerja' => 'Nilai Tingkat Kegemaran Membaca Masyarakat',
                'id_subkegiatan' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '3',
                'nama_indikator_kinerja' => 'Jumlah Pemerintah Daerah Kabupaten/Kota yang menerapkan e-Arsip terintegrasi',
                'id_subkegiatan' => '2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '4',
                'nama_indikator_kinerja' => 'Jumlah Rekomendasi hasil pengawasan kearsipan yang ditindaklanjuti',
                'id_subkegiatan' => '2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '5',
                'nama_indikator_kinerja' => 'Jumlah Pemerintah Daerah Kabupaten/Kota yang Memperoleh Nilai Pengawasan Kearsipan Kategori B Ke Atas',
                'id_subkegiatan' => '2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '6',
                'nama_indikator_kinerja' => 'Jumlah Arsip Terjaga dan Arsip Statis sebagai Warisan Budaya yang di Preservasi',
                'id_subkegiatan' => '2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '7',
                'nama_indikator_kinerja' => 'Jumlah Pengguna Pelayanan Arsip sebagai Memori Kolektif dan Jati Diri Bangsa',
                'id_subkegiatan' => '2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            
        ];

        // Memasukkan data ke tabel user
        $this->db->table('indikator_kinerja_urusan')->insertBatch($data);
    }
}
