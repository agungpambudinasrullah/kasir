<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class pelanggan extends Migration
{
    public function up()
    {
        $this->forge->addField ([
        'id_pelanggan'=>[
            'type'=>'INT',
            'constraint'=>'11',
            'auto_increment'=> true,
        ],
        'nama_pelanggan'=>[
            'type'=>'varchar',
            'constraint'=>'255',
        ],
        'alamat'=>[
            'type'=>'varchar',
            'constraint'=>'255',
        ],
        'nomor_telepon'=>[
            'type'=>'INT',
            'constraint'=>'11',
        ],
        'created_at' => [
            'type' => 'VARCHAR',
            'constraint' => true, // You should set an appropriate length for the varchar field
        ],
        'updated_at' => [
            'type' => 'DATETIME',
            'null' => true,
        ],
        'deleted_at' => [
            'type' => 'DATETIME',
            'null' => true,
        ],

        ]);
        $this->forge->addkey('id_pelanggan', true);
        $this->forge->createTable('tb_pelanggan');
        }
    
    public function down()
    {
        $this->forge->dropTable('tb_pelanggan');
    }
}
