<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SubkegiatanTable extends Migration
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
            'nama_subkegiatan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'urusan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'program' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'kegiatan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'indikator_subkegiatan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
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
        $this->forge->createTable('subkegiatan');
    }

    public function down()
    {
        $this->forge->dropTable('subkegiatan');
    }
}
