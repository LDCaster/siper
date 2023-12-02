<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class IndikatorKinerjaUrusanTable extends Migration
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
            'nama_indikator_kinerja' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'id_subkegiatan' => [ // Tambahkan kolom ID Urusan
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
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
        $this->forge->createTable('indikator_kinerja_urusan');
    }

    public function down()
    {
        $this->forge->dropTable('indikator_kinerja_urusan');
    }
}
