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

    public function help()
    {
        return view('Help');
    }

    public function admin()
    {
        return view('HomeAdmin');
    }
}
