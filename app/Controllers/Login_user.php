<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Login_user extends BaseController
{
    public function login_user()
    {
        return view('main/login_user');
    }

    public function process()
{
    $users = new UsersModel();
    $username = $this->request->getVar('username');
    $password = $this->request->getVar('password');
    $dataUser = $users->where(['username' => $username])->first();

    if ($dataUser) {
        if (password_verify($password, $dataUser->password)) {
            session()->set([
                'id' => $dataUser->id, // Update to use 'id' instead of 'username'
                'username' => $dataUser->username,
                'name' => $dataUser->name,
                'logged_in' => true,
            ]);
            return redirect()->to(base_url('home'));
        } else {
            session()->setFlashdata('error', 'Username & Password Salah');
            return redirect()->back();
        }
    } else {
        session()->setFlashdata('error', 'Username & Password Salah');
        return redirect()->back();
    }
}

    function logout_user()
    {
        session()->destroy();
        return redirect()->to('login_user');
    }
}