<?php

namespace App\Controllers;

use CodeIgniter\Files\File;
use App\Models\ModelMobil;

class Mobil extends BaseController
{
    public function showData()
    {
        return view('Mobil/dataMobil');
    }

    public function simpan()
    {
        $session = session();
        // if ($session->has('username')) {
        helper('form');
        // Memeriksa apakah melakukan submit data atau tidak.
        if (!$this->request->is('post')) {
            return view('/Mobil/addMobil');
        }

        $validationRule = [
            'userfile' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[userfile]',
                    'is_image[userfile]',
                    'mime_in[userfile,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    'max_size[userfile,100]',
                    'max_dims[userfile,1024,768]',
                ],
            ],
        ];

        // Mengambil data yang disubmit dari form
        $post = $this->request->getPost([
            "idk", "nama", "plat", "tipe", "tgl_pjk", "status", "warna", "sewa", "foto"
        ]);

        if (!$this->validate($validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];

            return view('/Mobil/addMobil');
        }

        $img = $this->request->getFile('userfile');
        if (!$img->hasMoved()) {
            $filepath = WRITEPATH . 'uploads/' . $img->store();

            $data = ['uploaded_fileinfo' => new File($filepath)];
        }
        // Mengakses Model untuk menyimpan data
        $model = model(ModelMobil::class);
        $model->simpan($post);
        return view('/Mobil/Success');
        // } else {
        //     return view('/Mobil/addMobil');
        // } 
    }

    public function addData()
    {
        helper(['form', 'url']);

        $validationRule = [
            'userfile' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[userfile]',
                    'is_image[userfile]',
                    'mime_in[userfile,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    'max_size[userfile,100]',
                    'max_dims[userfile,1024,768]',
                ],
            ],
        ];

        if (!$this->validate($validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];
            return view('Mobil/addMobil', $data);
        }

        $model = new ModelMobil();
        $model->simpan($this->request->getPost());

        return view('Mobil/addMobil');
    }
}
