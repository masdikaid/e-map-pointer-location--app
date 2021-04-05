<?php

namespace Tests\Support\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTimeStampTest extends Migration
{
    public function up()
    {        
        $fields = [
            'created_at' => [
                'type' => 'TIMESTAMP'
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP'
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true
            ]
        ];
        
        if($this->forge->addColumn('users', $fields))
        {
            echo "created_at, updated_at, deleted_at in users created.\n";
        }
    }
            
    public function down()
    {
        if($this->forge->dropColumn('users', ['created_at', 'deleted_at', 'updated_at']))
        {
            echo "column created_at, updated_at, deleted_at in users deleted.\n";
        }
    }
}