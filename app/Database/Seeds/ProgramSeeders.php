<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProgramSeeders extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'nama_program' => 'Program Pembinaan Perpustakaan',
                'id_urusan' => '1',
                'id_indikator_kinerja_urusan' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '2',
                'nama_program' => 'Program Pembinaan Perpustakaan',
                'id_urusan' => '1',
                'id_indikator_kinerja_urusan' => '2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '3',
                'nama_program' => 'Program Pengelolaan Arsip',
                'id_urusan' => '2',
                'id_indikator_kinerja_urusan' => '3',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '4',
                'nama_program' => 'Program Pengelolaan Arsip',
                'id_urusan' => '2',
                'id_indikator_kinerja_urusan' => '4',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '5',
                'nama_program' => 'Program Pengelolaan Arsip',
                'id_urusan' => '2',
                'id_indikator_kinerja_urusan' => '5',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '6',
                'nama_program' => 'Program Pengelolaan Arsip',
                'id_urusan' => '2',
                'id_indikator_kinerja_urusan' => '6',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '7',
                'nama_program' => 'Program Pengelolaan Arsip',
                'id_urusan' => '2',
                'id_indikator_kinerja_urusan' => '7',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Memasukkan data ke tabel user
        $this->db->table('program')->insertBatch($data);
    }
}
