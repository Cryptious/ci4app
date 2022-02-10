<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Comics extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'comics_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'judul' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => 255,

            ],
            'penulis' => [
                'type' => 'VARCHAR',
                'constraint' => 100,

            ],
            'penerbit' => [
                'type' => 'VARCHAR',
                'constraint' => 100,

            ],
            'sampul' => [
                'type' => 'VARCHAR',
                'constraint' => 100,

            ],

            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ]);
        $this->forge->addKey("comics_id", true);
        $this->forge->createTable('Comics');
    }

    public function down()
    {
        $this->forge->dropTable('Comics');
    }
}
