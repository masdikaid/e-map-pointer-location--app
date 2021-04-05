<?php

namespace Tests\Support\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Entities\UserEntity;

class UserSeederTest extends Seeder
{
	public function run()
	{
		for ($i=0; $i < 30 ; $i++) { 
			
			$model = model('UserModel');
			$users = new UserEntity();
			
			$users->name = static::faker()->name();
			$users->email = static::faker()->email();
			$users->password = static::faker()->password(8, 12);
			$users->phone = str_replace(['(', ')', '-', ' ', '+', 'x', '.'],'',static::faker()->phoneNumber());
			
			$model->insert($users);
		}
		
	}
}
