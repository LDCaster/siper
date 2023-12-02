<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BuktiTable extends Migration
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
                'constraint' => 4,
            ],
            'status_data' => [
                'type' => 'varchar',
                'constraint' => 50,
            ],
            'status_verifikasi' => [
                'type' => 'varchar',
                'constraint' => 50,
            ],
            'status_persetujuan' => [
                'type' => 'varchar',
                'constraint' => 50,
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
        $this->forge->createTable('bukti');
    }

    public function down()
    {
        $this->forge->dropTable('bukti');
    }
}
