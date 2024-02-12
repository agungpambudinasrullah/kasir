<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Produk extends Migration
{
    public function up()
    {
        $this->forge->addField ([
            'id_produk'=>[
            'type'=>'INT',
            'constraint'=>'11',
            'auto_increment'=> true,
        ],
        'nama_produk'=>[
            'type'=>'varchar',
            'constraint'=>'255',
        ],
        'harga'=>[
            'type'=>'decimal',
            'constraint'=>'10,2',
        ],
        'stok'=>[
            'type'=>'INT',
            'constraint'=>'11',
        ],
        'created_at' => [
            'type' => 'VARCHAR',
            'constraint' => 255, // You should set an appropriate length for the varchar field
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
        $this->forge->addkey('id_produk', true);
        $this->forge->createTable('tb_produk');
        }

    public function down()
    {
        $this->forge->dropTable('tb_produk');
    }
}
