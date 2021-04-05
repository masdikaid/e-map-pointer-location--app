<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModifyPhoneColumn extends Migration
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