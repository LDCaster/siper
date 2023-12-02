<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TugasAnggota2Table extends Migration
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
            'id_penatausahaan' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'id_anggota' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'id_satuan' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'kinerja_utama' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'indikator' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'target' => [
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
        $this->forge->createTable('tugasanggota2');
    }

    public function down()
    {
        $this->forge->dropTable('tugasanggota2');
    }
}
