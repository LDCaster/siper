<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LampiranTable extends Migration
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
                'constraint' => 100,
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
        $this->forge->createTable('lampiran');
    }

    public function down()
    {
        $this->forge->dropTable('lampiran');
    }
}
