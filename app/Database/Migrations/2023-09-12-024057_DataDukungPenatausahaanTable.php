<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataDukungPenatausahaanTable extends Migration
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
                'constraint' => 4,
            ],
            'status_tujuan' => [
                'type' => 'varchar',
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
        $this->forge->createTable('dd_penatausahaan');
    }

    public function down()
    {
        $this->forge->dropTable('dd_penatausahaan');
    }
}
