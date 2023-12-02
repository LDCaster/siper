<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailAnggaranTable extends Migration
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
            'indikator' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'tolok_ukur_kinerja' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'target_kinerja' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'id_anggaran' => [
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
        $this->forge->createTable('detail_anggaran');
    }

    public function down()
    {
        $this->forge->dropTable('detail_anggaran');
    }
}
