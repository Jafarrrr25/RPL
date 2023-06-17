<?php

namespace App\Controllers;

use Config\View;

class Home extends BaseController
{
    public function index()
    {
        return view('Home');
    }

    public function about()
    {
        return view('About');
    }

    public function help()
    {
        return view('Help');
    }
}
