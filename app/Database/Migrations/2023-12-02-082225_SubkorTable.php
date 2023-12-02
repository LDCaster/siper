<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SubkorTable extends Migration
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
        'nama_bidang' => [
            'type' => 'VARCHAR',
            'constraint' => 255,
        ],
        'sasaran' => [
            'type' => 'LONGTEXT',
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
    $this->forge->createTable('subkor');
}

public function down()
{
    $this->forge->dropTable('subkor');
    }
}
