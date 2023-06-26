<?php

namespace App\Controllers;

class Formulir extends BaseController
{
    public function index()
    {
        return view('/Formulir/Formulir_Sewa');
    }

     public function simpan()
        {
            return view('/Formulir/Sukses');
        }
    }
