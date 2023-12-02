<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PenatausahaanKinerjaTable extends Migration
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
            'id_kinerja_bidang' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'target' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'id_satuan' => [
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
        $this->forge->createTable('penatausahaan_kinerja');
    }

    public function down()
    {
        $this->forge->dropTable('penatausahaan_kinerja');
    }
}
