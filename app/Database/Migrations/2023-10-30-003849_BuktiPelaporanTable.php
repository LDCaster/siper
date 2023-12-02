<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BuktiPelaporanTable extends Migration
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
            ],
            'id_penatausahaan' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'nama_file' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'file' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'tahun' => [
                'type' => 'varchar',
                'constraint' => 100,
            ],
            'status_laporan' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ], 
            'status_tujuan' => [
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
        $this->forge->createTable('bukti_pelaporan');
    }

    public function down()
    {
        $this->forge->dropTable('bukti_pelaporan');
    }
}
