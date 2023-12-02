<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SubkegiatanSeeders extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'nama_subkegiatan' => 'Pembinaan perpustakaan pada satuan pendidikan dasar diseluruh wilayah kabupaten/kota sesuai standar nasional perpustakaan',
                'urusan' => 'Urusan Pemerintahan Bidang Perpustakaan',
                'program' => 'Program Pembinaan Perpustakaan',
                'kegiatan' => 'Pengelolaan Perpustakaan Tingkat Daerah Kabupaten/Kota',
                'indikator_subkegiatan' => 'Jumlah perpustakaan yang dilakukan pembinaan',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '2',
                'nama_subkegiatan' => 'Peningkatan kapasitas tenaga perpustakaan dan pustakawan tingkat daerah kabupaten/kota',
                'kegiatan' => 'Pengelolaan Perpustakaan Tingkat Daerah Kabupaten/Kota',
                'program' => 'Program Pembinaan Perpustakaan',
                'urusan' => 'Urusan Pemerintahan Bidang Perpustakaan',
                'indikator_subkegiatan' => 'Jumlah tenaga perpustakaan dan pustakawan yang ditingkatkan kapasitasnya',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '3',
                'nama_subkegiatan' => 'Pengembangan layanan perpustakaan rujukan tingkat kabupaten/kota',
                'kegiatan' => 'Pengelolaan Perpustakaan Tingkat Daerah Kabupaten/Kota',
                'program' => 'Program Pembinaan Perpustakaan',
                'urusan' => 'Urusan Pemerintahan Bidang Perpustakaan',
                'indikator_subkegiatan' => 'Jumlah layanan perpustakaan rujukan yang dikembangkan',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '4',
                'nama_subkegiatan' => 'Pengelolaan dan pengembangan bahan pustaka',
                'kegiatan' => 'Pengelolaan Perpustakaan Tingkat Daerah Kabupaten/Kota',
                'program' => 'Program Pembinaan Perpustakaan',
                'urusan' => 'Urusan Pemerintahan Bidang Perpustakaan',
                'indikator_subkegiatan' => 'Jumlah bahan perpustakaan yang dikelola dan dikembangkan',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '5',
                'nama_subkegiatan' => 'Sosialisasi budaya baca dan literasi pada satuan pendidikan dasar dan pendidikan khusus serta masyarakat',
                'kegiatan' => 'Pembudayaan Gemar Membaca Tingkat Daerah Kab/Kota',
                'program' => 'Program Pembinaan Perpustakaan',
                'urusan' => 'Urusan Pemerintahan Bidang Perpustakaan',
                'indikator_subkegiatan' => 'Jumlah lokus pembudayaan kegemaran membaca dan literasi pada satuan pendidikan',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '6',
                'nama_subkegiatan' => 'Pemberian penghargaan gerakan budaya gemar membaca',
                'kegiatan' => 'Pembudayaan Gemar Membaca Tingkat Daerah Kab/Kota',
                'program' => 'Program Pembinaan Perpustakaan',
                'urusan' => 'Urusan Pemerintahan Bidang Perpustakaan',
                'indikator_subkegiatan' => 'Jumlah orang yang mendapatkan penghargaan gerakan budaya gemar membaca',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '7',
                'nama_subkegiatan' => 'Pengembangan literasi berbasis inklusi sosial',
                'kegiatan' => 'Pembudayaan Gemar Membaca Tingkat Daerah Kab/Kota',
                'program' => 'Program Pembinaan Perpustakaan',
                'urusan' => 'Urusan Pemerintahan Bidang Perpustakaan',
                'indikator_subkegiatan' => 'Jumlah perpustakaan berbasis inklusi sosial',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '8',
                'nama_subkegiatan' => 'Pemberdayaan Kapasitas Unit Kearsipan dan Lembaga Kearsipan Daerah Kabupaten/Kota',
                'kegiatan' => 'Pengelolaan Simpul Jaringan Informasi Kearsipan Nasional Tingkat Kabupaten/Kota',
                'program' => 'Program Pengelolaan Arsip',
                'urusan' => 'Urusan Pemerintahan Bidang Kearsipan',
                'indikator_subkegiatan' => 'Jumlah laporan hasil pemberdayaan kapasitas unit kearsipan dan lembaga kearsipan daerah kabupaten/kota',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '9',
                'nama_subkegiatan' => 'Pengawasan Arsip Dinamis Kewenangan Kabupaten/Kota',
                'kegiatan' => 'Pengelolaan Arsip Dinamis Daerah Kabupaten/Kota',
                'program' => 'Program Pengelolaan Arsip',
                'urusan' => 'Urusan Pemerintahan Bidang Kearsipan',
                'indikator_subkegiatan' => 'Jumlah laporan hasil pengawasan arsip dinamis kewenangan kabupaten/kota',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '10',
                'nama_subkegiatan' => 'Pengawasan Arsip Dinamis Kewenangan Kabupaten/Kota',
                'kegiatan' => 'Pengelolaan Arsip Dinamis Daerah Kabupaten/Kota',
                'program' => 'Program Pengelolaan Arsip',
                'urusan' => 'Urusan Pemerintahan Bidang Kearsipan',
                'indikator_subkegiatan' => 'Jumlah laporan hasil pengawasan arsip dinamis kewenangan kabupaten/kota',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '11',
                'nama_subkegiatan' => 'Akuisisi, pengolahan, preservasi, dan akses arsip statis',
                'kegiatan' => 'Pengelolaan Arsip Statis Daerah Kewenangan Kabupaten/Kota',
                'program' => 'Program Pengelolaan Arsip',
                'urusan' => 'Urusan Pemerintahan Bidang Kearsipan',
                'indikator_subkegiatan' => 'Jumlah arsip statis yang dilakukan akuisisi, pengolahan, preservasi, dan akses arsip statis',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '12',
                'nama_subkegiatan' => 'Akuisisi, pengolahan, preservasi, dan akses arsip statis',
                'kegiatan' => 'Pengelolaan Arsip Statis Daerah Kewenangan Kabupaten/Kota',
                'program' => 'Program Pengelolaan Arsip',
                'urusan' => 'Urusan Pemerintahan Bidang Kearsipan',
                'indikator_subkegiatan' => 'Jumlah arsip statis yang dilakukan akuisisi, pengolahan, preservasi, dan akses arsip statis',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
           
        ];

        // Memasukkan data ke tabel user
        $this->db->table('subkegiatan')->insertBatch($data);
    }
}
