<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    protected $login;
    public function __construct()
    {
        $this->login = new UserModel();
    }
    public function index()
    {
        return view('welcome_message');
    }

    public function register()
    {
        $session = session();
        if ($session->has('usr')) {
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
        
        $model = model(UserModel::class);
        $post = $this->request->getPost(['usr', 'pwd']);
        $user = $model->user(($post['usr']));
        $pwd = $model->user(($post['pwd']));
        if ($user  && $pwd) {
            $session = session();
            $session->set('username', $post['usr']);
            $session->set('password', $post['pwd']);
            return view('/');
        } else {
            return view('/Akun/login');
        }

    }
}
