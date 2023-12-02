<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class IndikatorSubkegiatanSeeders extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'nama_indikator' => 'Jumlah perpustakaan yang dilakukan pembinaan',
                'id_kegiatan' => '2',
                'id_subkegiatan' => '1',
                'id_program' => '2',
                'id_urusan' => '1',
                'id_indikator_kinerja_urusan' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '2',
                'nama_indikator' => 'Jumlah tenaga perpustakaan dan pustakawan yang ditingkatkan kapasitasnya',
                'id_kegiatan' => '2',
                'id_subkegiatan' => '2',
                'id_program' => '2',
                'id_urusan' => '1',
                'id_indikator_kinerja_urusan' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '3',
                'nama_indikator' => 'Jumlah layanan perpustakaan rujukan yang dikembangkan',
                'id_kegiatan' => '2',
                'id_subkegiatan' => '3',
                'id_program' => '2',
                'id_urusan' => '1',
                'id_indikator_kinerja_urusan' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '4',
                'nama_indikator' => 'Jumlah bahan perpustakaan yang dikelola dan dikembangkan',
                'id_kegiatan' => '2',
                'id_subkegiatan' => '4',
                'id_program' => '2',
                'id_urusan' => '1',
                'id_indikator_kinerja_urusan' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '5',
                'nama_indikator' => 'Jumlah lokus pembudayaan kegemaran membaca dan literasi pada satuan pendidikan',
                'id_kegiatan' => '1',
                'id_subkegiatan' => '5',
                'id_program' => '2',
                'id_urusan' => '1',
                'id_indikator_kinerja_urusan' => '2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '6',
                'nama_indikator' => 'Jumlah orang yang mendapatkan penghargaan gerakan budaya gemar membaca',
                'id_kegiatan' => '1',
                'id_subkegiatan' => '6',
                'id_program' => '2',
                'id_urusan' => '1',
                'id_indikator_kinerja_urusan' => '2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '7',
                'nama_indikator' => 'Jumlah perpustakaan berbasis inklusi sosial',
                'id_kegiatan' => '1',
                'id_subkegiatan' => '7',
                'id_program' => '2',
                'id_urusan' => '1',
                'id_indikator_kinerja_urusan' => '2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '8',
                'nama_indikator' => 'Jumlah laporan hasil pemberdayaan kapasitas unit kearsipan dan lembaga kearsipan daerah kabupaten/kota',
                'id_kegiatan' => '3',
                'id_subkegiatan' => '8',
                'id_program' => '3',
                'id_urusan' => '2',
                'id_indikator_kinerja_urusan' => '3',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '9',
                'nama_indikator' => 'Jumlah laporan hasil pengawasan arsip dinamis kewenangan kabupaten/kota',
                'id_kegiatan' => '4',
                'id_subkegiatan' => '9',
                'id_program' => '4',
                'id_urusan' => '2',
                'id_indikator_kinerja_urusan' => '4',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '10',
                'nama_indikator' => 'Jumlah laporan hasil pengawasan arsip dinamis kewenangan kabupaten/kota',
                'id_kegiatan' => '5',
                'id_subkegiatan' => '10',
                'id_program' => '5',
                'id_urusan' => '2',
                'id_indikator_kinerja_urusan' => '5',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '11',
                'nama_indikator' => 'Jumlah arsip statis yang dilakukan akuisisi, pengolahan, preservasi, dan akses arsip statis',
                'id_kegiatan' => '6',
                'id_subkegiatan' => '11',
                'id_program' => '6',
                'id_urusan' => '2',
                'id_indikator_kinerja_urusan' => '6',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '12',
                'nama_indikator' => 'Jumlah arsip statis yang dilakukan akuisisi, pengolahan, preservasi, dan akses arsip statis',
                'id_kegiatan' => '7',
                'id_subkegiatan' => '12',
                'id_program' => '7',
                'id_urusan' => '2',
                'id_indikator_kinerja_urusan' => '7',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
           
        ];

        // Memasukkan data ke tabel user
        $this->db->table('indikator')->insertBatch($data);
    }
}
