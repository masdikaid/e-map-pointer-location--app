<?php

namespace Tests\Support\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModifyPhoneColumnTest extends Migration
{
    public function up()
    {        
        $fields = [
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => 14
            ]
        ];
        
        if($this->forge->modifyColumn('users', $fields))
        {
            echo "phone in users changed.\n";
        }
    }
            
    public function down()
    {
        
    }
}