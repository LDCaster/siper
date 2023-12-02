<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UrusanSeeders extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'nama_urusan' => 'Urusan Pemerintahan Bidang Perpustakaan',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '2',
                'nama_urusan' => 'Urusan Pemerintahan Bidang Kearsipan',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Memasukkan data ke tabel user
        $this->db->table('urusan')->insertBatch($data);
    }
}
