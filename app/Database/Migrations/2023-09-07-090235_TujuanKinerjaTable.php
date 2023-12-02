<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TujuanKinerjaTable extends Migration
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
            'nama_tujuan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'indikator_kinerja' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'id_kinerja' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'target' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
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
        $this->forge->createTable('tujuan_kinerja');
    }

    public function down()
    {
        $this->forge->dropTable('tujuan_kinerja');
    }
}
