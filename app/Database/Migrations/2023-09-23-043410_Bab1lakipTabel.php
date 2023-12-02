<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Bab1lakipTabel extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            // 'id_karyawan' => [
            //     'type' => 'INT',
            //     'constraint' => 5,
            //     'unsigned' => true,
            // ],
            'latar_belakang' => [
                'type' => 'LONGTEXT',
            ],
            'narasi_struktur' => [
                'type' => 'LONGTEXT',
            ],
            'foto_struktur' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'narasi_foto' => [
                'type' => 'LONGTEXT',
            ],
            'permasalahan_utama' => [
                'type' => 'LONGTEXT',
            ],
            'produk_layanan' => [
                'type' => 'LONGTEXT',
            ],
            'sistematika' => [
                'type' => 'LONGTEXT',
            ],
            'tahun' => [
                'type' => 'YEAR',
                'constraint' => 4,
            ],
            'status_laporan' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],            
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('bab1lakip');
    }

    public function down()
    {
        $this->forge->dropTable('bab1lakip');
    }
}
