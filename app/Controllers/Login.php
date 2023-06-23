<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function register()
    {
        $session = session();
        if ($session->has('username')) {
        helper('form');
        // Memeriksa apakah melakukan submit data atau tidak.
        if (!$this->request->is('post')) {
            return view('/Akun/Register');
        }
        // Mengambil data yang disubmit dari form
        $post = $this->request->getPost([
            'idCustomer', 'username', 'password', 'nama', 'alamat', 'email', 'no_telp'
        ]);
        // Mengakses Model untuk menyimpan data
        $model = model(ModelRegister::class);
        $model->simpan($post);
        return view('/Akun/Success');
        } else {
            return view('/Akun/Register');
        }
    }

    public function login()
    {
        $user = $this->request->getPost('usr');
        $pass = $this->request->getPost('pwd');

        $post = $this->request->getPost(['usr', 'pwd']);
        $model = model(LoginAsisten::class);
        $user = $model->user(($post['usr']));
        $pwd = $model->user(($post['usr']));
        if ($user  && $pwd) {
            $session = session();
            $session->set('username', $post['usr']);
            $session->set('password', $post['pwd']);
            return view('/asisten/AsistenView');
        } else {
            return view('/asisten/login');
        }

    }
}
