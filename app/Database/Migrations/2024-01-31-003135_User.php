<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user' => [
                'type' => 'int',
                'constraint' => 11
            ],
            'nama_user' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'username' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'password' => [
                'type' => 'varchar',
                'constraint' => '255'
            ],
            'created_at' =>[
                'type'=>'DATETIME',
                'null' => true
            ],
            'updated_at' =>[
                'type'=>'DATETIME',
                'null' => true
            ],
            'deleted_at' =>[
                'type'=>'DATETIME', //panah => menunjukkan array assosiatif
                'null' => true
            ],
    
]);
$this->forge->addKey('id_user', true);
$this->forge->createTable('tb_user');
}

public function down()
{
$this->forge->dropTable('tb_user');
}

}
