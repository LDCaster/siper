<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PenatausahaanTable extends Migration
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
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'tanggal' => [
                'type' => 'date',
            ],
            'karyawan_1' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'karyawan_2' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'id_pohon' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
            ],
            'target' => [
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
        $this->forge->createTable('penatausahaan');
    }

    public function down()
    {
        $this->forge->dropTable('penatausahaan');
    }
}
