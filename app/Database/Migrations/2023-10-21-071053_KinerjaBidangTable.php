<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KinerjaBidangTable extends Migration
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
            'id_pohon' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'indikator' => [
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
        $this->forge->createTable('kinerja_bidang');
    }
    
    public function down()
    {
        $this->forge->dropTable('kinerja_bidang');
    }
}
