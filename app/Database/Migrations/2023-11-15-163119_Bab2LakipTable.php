<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Bab2LakipTable extends Migration
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
            'visi' => [
                'type' => 'LONGTEXT',
            ],
            'misi' => [
                'type' => 'LONGTEXT',
            ],
            'tujuan_sasaran' => [
                'type' => 'LONGTEXT',
            ],
            'indikator_kinerja_utama' => [
                'type' => 'LONGTEXT',
            ],
            'perjanjian_kinerja' => [
                'type' => 'LONGTEXT',
            ],
            'program_kegiatan' => [
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
        $this->forge->createTable('bab2lakip');
    }

    public function down()
    {
        $this->forge->dropTable('bab2lakip');
    }
}
