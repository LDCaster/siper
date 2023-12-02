<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeders extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama' => 'Admin',
                'username' => 'admin',
                'password' => password_hash('admin123', PASSWORD_DEFAULT), // Ganti dengan password yang di-hash
                'email' => 'admin@example.com',
                'role_id' => 1, // Sesuaikan dengan role_id yang sesuai
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'sekretaris',
                'username' => 'sekretaris',
                'password' => password_hash('sekretaris123', PASSWORD_DEFAULT), // Ganti dengan password yang di-hash
                'email' => 'sekretaris@gmail.com',
                'role_id' => 2, // Sesuaikan dengan role_id yang sesuai
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'kasubbag',
                'username' => 'kasubbag',
                'password' => password_hash('kasubbag123', PASSWORD_DEFAULT), // Ganti dengan password yang di-hash
                'email' => 'kasubbag@gmail.com',
                'role_id' => 3, // Sesuaikan dengan role_id yang sesuai
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            // staff
            [
                'nama' => 'staff',
                'username' => 'staff',
                'password' => password_hash('staff123', PASSWORD_DEFAULT), // Ganti dengan password yang di-hash
                'email' => 'staff@gmail.com',   
                'role_id' => 4, // Sesuaikan dengan role_id yang sesuai
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'perpustakaan',
                'username' => 'perpustakaan',
                'password' => password_hash('perpustakaan123', PASSWORD_DEFAULT), // Ganti dengan password yang di-hash
                'email' => 'perpustakaan@gmail.com',   
                'role_id' => 5, // Sesuaikan dengan role_id yang sesuai
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'kearsipan',
                'username' => 'kearsipan',
                'password' => password_hash('kearsipan123', PASSWORD_DEFAULT), // Ganti dengan password yang di-hash
                'email' => 'kearsipan@gmail.com',   
                'role_id' => 6, // Sesuaikan dengan role_id yang sesuai
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Memasukkan data ke tabel user
        $this->db->table('user')->insertBatch($data);
    }
}
