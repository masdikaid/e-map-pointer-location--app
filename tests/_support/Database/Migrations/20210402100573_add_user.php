<?php

namespace Tests\Support\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUserTest extends Migration
{
    public function up()
    {
        
        $this->forge->addField('id');
        
        $this->forge->addField([
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'password' => [
                'type' => 'TEXT'
            ],
            'phone' => [
                'type' => 'INT',
                'constraint' => '14'
            ],
            'created_by' => [
                'type' => 'INT',
                'constraint' => '9',
                'null' => true
            ]
        ]);
                
        $this->forge->addKey('id');
        
        $this->forge->addUniqueKey('email');
        
        $this->forge->addUniqueKey('phone');
        
        $this->forge->addForeignKey('created_by', 'users', 'id', 'CASCADE', 'CASCADE');
        
        if($this->forge->createTable('users', true))
        {
            echo "table users created\n";
        }
    }
            
    public function down()
    {
        if($this->forge->dropTable('users', true))
        {
            echo "table users deleted\n";
        }
    }
}