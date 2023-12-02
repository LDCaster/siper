<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PerencanaanRakorTable extends Migration
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
        'id_subkegiatan' => [
            'type' => 'INT',
            'constraint' => 5,
            'unsigned' => true,
        ],
        'id_indikator_kinerja_urusan' => [
            'type' => 'INT',
            'constraint' => 5,
            'unsigned' => true,
        ],
        'pagu_indikatif' => [
            'type' => 'varchar',
            'constraint' => 200,
        ],
        'target' => [
            'type' => 'INT',
            'constraint' => '10', // Menyesuaikan dengan kebutuhan presisi
        ],
        'id_satuan' => [
            'type' => 'INT',
            'constraint' => 5,
            'unsigned' => true,
        ],
        'status_perencanaan' => [
            'type' => 'VARCHAR',
            'constraint' => 20,
        ],
        'status_tujuan' => [
            'type' => 'VARCHAR',
            'constraint' => 20,
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
    $this->forge->createTable('rakor');
}


    public function down()
    {
        $this->forge->dropTable('rakor');
    }
}
