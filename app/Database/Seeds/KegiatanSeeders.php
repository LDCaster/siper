<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KegiatanSeeders extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'nama_kegiatan' => 'Pembudayaan Gemar Membaca Tingkat Daerah Kab/Kota',
                'id_program' => '1',
                'id_urusan' => '1',
                'id_indikator_kinerja_urusan' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '2',
                'nama_kegiatan' => 'Pengelolaan Perpustakaan Tingkat Daerah Kabupaten/Kota',
                'id_program' => '2',
                'id_urusan' => '1',
                'id_indikator_kinerja_urusan' => '2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '3',
                'nama_kegiatan' => 'Pengelolaan Simpul Jaringan Informasi Kearsipan Nasional Tingkat Kabupaten/Kota',
                'id_program' => '3',
                'id_urusan' => '2',
                'id_indikator_kinerja_urusan' => '3',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '4',
                'nama_kegiatan' => 'Pengelolaan Arsip Dinamis Daerah Kabupaten/Kota',
                'id_program' => '4',
                'id_urusan' => '2',
                'id_indikator_kinerja_urusan' => '4',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '5',
                'nama_kegiatan' => 'Pengelolaan Arsip Dinamis Daerah Kabupaten/Kota',
                'id_program' => '5',
                'id_urusan' => '2',
                'id_indikator_kinerja_urusan' => '5',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '6',
                'nama_kegiatan' => 'Pengelolaan Arsip Statis Daerah Kewenangan Kabupaten/Kota',
                'id_program' => '6',
                'id_urusan' => '2',
                'id_indikator_kinerja_urusan' => '6',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '7',
                'nama_kegiatan' => 'Pengelolaan Arsip Statis Daerah Kewenangan Kabupaten/Kota',
                'id_program' => '7',
                'id_urusan' => '2',
                'id_indikator_kinerja_urusan' => '7',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Memasukkan data ke tabel user
        $this->db->table('kegiatan')->insertBatch($data);
    }
}
