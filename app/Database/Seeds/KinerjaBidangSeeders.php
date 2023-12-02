<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KinerjaBidangSeeders extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'id_pohon' => '1',
                'sasaran' => 'Meningkatnya kualitas pelayanan perpustakaan dan kearsipan',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '2',
                'id_pohon' => '2',
                'sasaran' => 'Meningkatnya kelancaran administrasi perkantoran',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '3',
                'id_pohon' => '2',
                'sasaran' => 'Meningkatnya kelancaran administrasi perkantoran',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '4',
                'id_pohon' => '2',
                'sasaran' => 'Meningkatnya implementasi tata kelola pemerintah skpd',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '5',
                'id_pohon' => '2',
                'sasaran' => 'Meningkatnya implementasi tata kelola pemerintah skpd',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Memasukkan data ke tabel user
        $this->db->table('kinerja_bidang')->insertBatch($data);
    }
}
