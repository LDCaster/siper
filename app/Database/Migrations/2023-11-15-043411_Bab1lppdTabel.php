<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Bab1lppdTabel extends Migration
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
            // 'id_karyawan' => [
            //     'type' => 'INT',
            //     'constraint' => 5,
            //     'unsigned' => true,
            // ],
            'dasar_hukum' => [
                'type' => 'LONGTEXT',
            ],
            'visi_misi' => [
                'type' => 'LONGTEXT',
            ],
            'data_umum_skpd' => [
                'type' => 'LONGTEXT',
            ],
            'foto_struktur' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'tugas_fungsi' => [
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
        $this->forge->createTable('bab1lppd');
    }

    public function down()
    {
        $this->forge->dropTable('bab1lppd');
    }
}
