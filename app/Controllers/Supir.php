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
        $session = session();
        // if ($session->has('username')) {
        helper('form');
        // Memeriksa apakah melakukan submit data atau tidak.
        if (!$this->request->isMethod('post')) {
            return view('/Supir/addSupir');
        }

        $validationRules = [
            'userfile' => [
                'label' => 'Image File',
                'rules' => 'uploaded[userfile]|is_image[userfile]|mime_in[userfile,image/jpg,image/jpeg,image/gif,image/png,image/webp]|max_size[userfile,100]|max_dims[userfile,1024,768]',
            ],
        ];

        // Mengambil data yang disubmit dari form
        $post = $this->request->getPost([
            "idSupir", "nama_supir", "alamat_supir", "no_telp_supir", "foto_supir"
        ]);

        if (!$this->validate($validationRules)) {
            $data['errors'] = $this->validator->getErrors();
            return view('/Supir/addSupir', $data);
        }

        $img = $this->request->getFile('userfile');
        if (!$img->hasMoved()) {
            $filepath = WRITEPATH . 'uploads/' . $img->store();

            $data['uploaded_fileinfo'] = new File($filepath);
        }

        // Mengakses Model untuk menyimpan dat
        $model = new ModelSupir();
        $model->simpan($post);
        return view('/Supir/Success');
        // } else {
        //     return view('/Supir/addSupir');
        // } 
    }

    public function addData()
    {
        helper(['form', 'url']);

        $validationRules = [
            'userfile' => [
                'label' => 'Image File',
                'rules' => 'uploaded[userfile]|is_image[userfile]|mime_in[userfile,image/jpg,image/jpeg,image/gif,image/png,image/webp]|max_size[userfile,100]|max_dims[userfile,1024,768]',
            ],
        ];

        if (!$this->validate($validationRules)) {
            $data['errors'] = $this->validator->getErrors();
            return view('Supir/addSupir', $data);
        }

        $model = new ModelSupir();
        $model->simpan($this->request->getPost());

        return view('Supir/addSupir');
    }
}
