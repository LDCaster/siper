<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProgramTable extends Migration
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
            'nama_program' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'id_urusan' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'id_indikator_kinerja_urusan' => [
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
        $this->forge->createTable('program');
    }
    public function down()
    {
        $this->forge->dropTable('program');
    }

}
