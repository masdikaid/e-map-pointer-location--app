<?php

namespace Tests\Support\Models;
use App\Models\UserModel;


class UserFabricator extends UserModel
{
    public function fake(&$faker)
    {
        return [
            'name' => $faker->name(),
            'email' => $faker->email(),
            'password' => $faker->password(8, 12),
            'phone' => str_replace(['(', ')', '-', ' ', '+', 'x', '.'],'',$faker->phoneNumber())
        ];
  
    }
}