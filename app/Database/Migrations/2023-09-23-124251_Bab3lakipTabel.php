<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Bab3lakipTabel extends Migration
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
            // 'id_penatausahaan' => [
            //     'type' => 'INT',
            //     'constraint' => 5,
            //     'unsigned' => true,
            // ],
            // 'id_pelaporan' => [
            //     'type' => 'INT',
            //     'constraint' => 5,
            //     'unsigned' => true,
            // ],
            'narasi_capaian' => [
                'type' => 'LONGTEXT',
            ],
            'penyebab' => [
                'type' => 'LONGTEXT',
            ],
            'alternatif' => [
                'type' => 'LONGTEXT',
            ],
            'analisis_sumberdaya' => [
                'type' => 'LONGTEXT',
            ],
            'analisis_program_kegiatan' => [
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
        $this->forge->createTable('bab3lakip');
    }

    public function down()
    {
        $this->forge->dropTable('bab3lakip');
    }
}
