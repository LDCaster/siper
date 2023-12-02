<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PelaporanTable extends Migration
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
            'id_anggaran' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'id_bukti' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'realisasi_nominal' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'realisasi_indikator_subkegiatan' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'realisasi_kinerja_urusan' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'tahun' => [
                'type' => 'YEAR',
                'constraint' => 4,
            ],
            'tw' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'status_backup' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
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
        $this->forge->createTable('pelaporan');
    }

    public function down()
    {
        $this->forge->dropTable('pelaporan');
    }
}
