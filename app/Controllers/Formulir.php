<?php

namespace App\Controllers;

use App\Models\FormulirModel;

class Formulir extends BaseController
{
    public function index()
    {
        return view('/Formulir/Formulir_Sewa');
    }

     public function simpan()
        {
            helper('form');
            // Memeriksa apakah melakukan submit data atau tidak.
            if (!$this->request->is('post')) {
                return view('/formulir/Formulir_Sewa');
            }
            // Mengambil data yang disubmit dari form
            $post = $this->request->getPost([
                'nama', 'mobil', 'sopir', 'pinjam',
                'kembali'
            ]);
            // Mengakses Model untuk menyimpan data
            $model = model(FormulirModel::class);
            $data = [
                'nama'=> $this->request->getPost('nama'),
                'mobil'=> $this->request->getPost('mobil'),
                'sopir'=> $this->request->getPost('sopir'),
                'tgl_pinjam'=> $this->request->getPost('pinjam'),
                'tgl_kembali'=> $this->request->getPost('kembali'),
            ];
            $model->insert($data);
            return view('/Formulir/Sukses');
        }
    }
