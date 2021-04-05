<?php

namespace App\Controllers;

use App\Entities\UserEntity;


class Users extends BaseController
{
    public function create()
    {
        $user = new UserEntity();
        $model = model('UserModel');

        if ($this->request->getMethod() === 'get')
        {
            return $this->view->render('content/users/create_user');
        } 
        elseif ($this->request->getMethod() === 'post' && $this->validate('users')) 
        {
            $data = $this->request->getPost();

            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = $data['password'];
            $user->phone = $data['phone'];

            $model->save($user);
            
            return $this->view->render('content/users');
        } 
        else 
        {
            return $this->view->render('content/users/create_user');
        }
    }
}