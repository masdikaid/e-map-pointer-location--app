<?php

namespace App\Controllers;

use App\Entities\UserEntity;


class Users extends BaseController
{

    public function index(int $id = null)
    {
        if (!$id)
        {
            $model = model('UserModel');
            $res = $model->findAll();
            $this->view->setData([
                'users' => $res
            ]);
            return $this->view->render('content/users/user_list');
        }
        else 
        {
            $model = model('UserModel');

            if ($res = $model->find($id))
            {
                $this->view->setData([
                    'user' => $res
                    ]);
                return $this->view->render('content/users/single_user');
            }
            else 
            {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        }
    }
    
    public function create()
    {
        $entity = new UserEntity();
        $model = model('UserModel');
        
        if ($this->request->getMethod() === 'get')
        {
            return $this->view->render('content/users/create_user');
        } 
        elseif ($this->request->getMethod() === 'post' && $this->validate('create_users')) 
        {
            $data = $this->request->getPost();

            $entity->name = $data['name'];
            $entity->email = $data['email'];
            $entity->password = $data['password'];
            $entity->phone = $data['phone'];

            $model->save($entity);
            
            return redirect()->to('/users');
        } 
        else 
        {
            return $this->view->render('content/users/create_user');
        }
    }

    public function update()
    {
        
    }

    public function delete(int $id)
    {
        $model = model('UserModel');
        
        if ($res = $model->find($id))
        {
            if($res = $model->delete($id))
            {
                return redirect()->to('/users');
            }
        }
        else 
        {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}