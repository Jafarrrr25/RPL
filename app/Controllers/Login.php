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
        return view('Akun/Login');
    }

    public function register()
    {
        //$session = session();
        // if ($session->has('usr')) {
        helper('form');
        // Memeriksa apakah melakukan submit data atau tidak.
        if (!$this->request->is('post')) {
            return view('/Akun/Register');
        }
        // Mengambil data yang disubmit dari form
        $post = $this->request->getPost([
            'username', 'password', 'nama', 'alamat', 'email', 'no_telp'
        ]);
        // Mengakses Model untuk menyimpan data
        $model = model(ModelRegister::class);
        $model->simpan($post);
        return view('/Akun/Success');
    } //else {
    //     return view('/Akun/Error');
    // }
    // }

    public function check()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('customer');

        $post = $this->request->getPost(['usr', 'pwd']);
        $builder->select('username, password');
        $builder->where('username', $post['usr']);
        $builder->where('password', $post['pwd']);
        $query = $builder->get();
        $result = $query->getRow();

        if ($result && $result->username && $result->password) {
            $session = session();
            $session->set('pengguna', $post['usr']);
            return view('HomeCust');
        } else {
            return view('Akun/Error');
        }
    }

    public function home()
    {
        $session = session();
        if ($session->has('pengguna')) {
            $item = $session->get('pengguna');
            if ($item == 'admin') {
                return view('Formulir_Sewa');
            } else {
                return view('Akun/Login');
            }
        } else {
            return view('Akun/Login');
        }
    }

    // public function login()
    // {
    //     $model = model(UserModel::class);
    //     $post = $this->request->getPost(['usr', 'pwd']);
    //     $user = $model->user(($post['usr']));
    //     $pwd = $model->user(($post['pwd']));
    //     if ($user && $pwd) {
    //         $session = session();
    //         $session->set('username', $post['usr']);
    //         $session->set('password', $post['pwd']);
    //         return view('HomeCust');
    //     } else {
    //         return view('/Akun/login');
    //     }
    // }
    
    public function logout()
    {
        $sesssion = session();
        $sesssion->remove('pengguna');
        return view('Akun/Login');
    }
}
