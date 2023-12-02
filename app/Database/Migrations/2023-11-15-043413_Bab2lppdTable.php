<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Bab2lakipTabel extends Migration
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
            'analisis_target_kinerja' => [
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
        $this->forge->createTable('bab2lppd');
    }

    public function down()
    {
        $this->forge->dropTable('bab2lppd');
    }
}
