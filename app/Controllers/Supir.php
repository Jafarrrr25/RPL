<?php

namespace App\Controllers;

use CodeIgniter\Files\File;
use App\Models\ModelSupir;

class Supir extends BaseController
{
    public function showData()
    {
        return view('Supir/dataSupir');
    }

    public function simpan()
    {
        // $session = session();
        // if ($session->has('username')) {
        helper('form');
       

        $validationRule = [
            'foto_supir' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[foto_supir]',
                    'is_image[foto_supir]',
                    'mime_in[foto_supir,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    'max_size[foto_supir,100]',
                    'max_dims[foto_supir,1024,768]',
                ],
            ],
        ];

        // Mengambil data yang disubmit dari form
        // $post = $this->request->getPost([
        //     'idSupir', 'nama_supir', 'alamat_supir', 'no_telp_supir', 'foto_supir'
        // ]);

         // Memeriksa apakah melakukan submit data atau tidak.
         if (!$this->request->is('post')) {
            return view('/Supir/addSupir');
        }

        if (!$this->validate($validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];

            return view('/Supir/addSupir', $data);
        }

        if ($this->request->getFiles()) {

            // Generate nama unik untuk file
            $idSupir = $this->request->getPost(["idSupir"]);
            $nama_supir = $this->request->getPost(["nama_supir"]);
            $alamat_supir = $this->request->getPost(["alamat_supir"]);
            $no_telp_supir = $this->request->getPost(["no_telp_supir"]);
            $img = $this->request->getFile('foto_supir');

            $image = file_get_contents($img->getRealPath());

            // Mengakses Model untuk menyimpan data
            $model = model(ModelSupir::class);
            $model->insert([
                'idSupir' => $idSupir,
                'nama_supir' => $nama_supir,
                'alamat_supir' => $alamat_supir,
                'no_telp_supir' => $no_telp_supir,
                'foto_supir' => $image
            ]);
            return view('/Supir/SuccessSupir');
        } else {
            return view('/Supir/Error');
        }
        // } else {
        //     return view('/Supir/addSupir');
        // } 
    }
}
