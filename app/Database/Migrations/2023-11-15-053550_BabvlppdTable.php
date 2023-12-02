<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BabvlppdTable extends Migration
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
            'kesimpulan' => [
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
        $this->forge->createTable('babvlppd');
    }

    public function down()
    {
        $this->forge->dropTable('babvlppd');
    }
}
