<?php

namespace App\Controllers;

use Config\View;

class Home extends BaseController
{
    public function index()
    {
        return view('/HomeCust');
    }

    public function about()
    {
        return view('About');
    }
    public function admin()
    {
        return view('/HomeAdmin');
    }

    public function help()
    {
        return view('Help');
    }
    public function login()
    {
        return view('/Login');
    }
    public function register()
    {
        return view('/Register');
    }
    public function mobil()
    {
        return view('/dataMobil');
    }
    public function supir()
    {
        return view('Supir/dataSupir');
    }
    public function sewa()
    {
        return view('/Formulir_Sewa');
    }
}
