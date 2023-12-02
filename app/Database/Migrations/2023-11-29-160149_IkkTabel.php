<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class IkkTabel extends Migration
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
        'urusan_pemerintahan' => [
            'type' => 'VARCHAR',
            'constraint' => 100,
        ],
        'ikk_keluaran' => [
            'type' => 'LONGTEXT',
        ],
        'ikk_outcome' => [
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
    $this->forge->createTable('ikk');
}

public function down()
{
    $this->forge->dropTable('ikk');
    }
}
