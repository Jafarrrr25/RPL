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

        $validationRule = [
            'foto' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[foto]',
                    'is_image[foto]',
                    'mime_in[foto,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    'max_size[foto,100]',
                    'max_dims[foto,1024,768]',
                ],
            ],
        ];
        if (! $this->validate($validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];

            return view('/Mobil/addMobil', $data);
        }

        $img = $this->request->getFile('foto');

        if (! $img->hasMoved()) {
            $filepath = WRITEPATH . 'public/mobil' . $img->store();

            $data = ['uploaded_fileinfo' => new File($filepath)];

            return view('/Mobil/addMobil', $data);
        }

        $data = ['errors' => 'The file has already been moved.'];

        // Memeriksa apakah melakukan submit data atau tidak.
        if (!$this->request->is('post')) {
            return view('/Mobil/addMobil');
        }

        if ($this->request->getFiles()) {

            // Generate nama unik untuk file
            $nama_file = $img->getClientName();

            $id = $this->request->getPost(["idk"]);
            $nama = $this->request->getPost(["nama"]);
            $plat = $this->request->getPost(["plat"]);
            $tipe = $this->request->getPost(["tipe"]);
            $pajak = $this->request->getPost(["tgl_pjk"]);
            $status = $this->request->getPost(["status"]);
            $warna = $this->request->getPost(["warna"]);
            $sewa = $this->request->getPost(["sewa"]);
            // Mengakses Model untuk menyimpan data
            $model = model(ModelMobil::class);
            $model->insert([
                'idKendaraan' => $id,
                'nama_kendaraan' => $nama,
                'no_polisi' => $plat,
                'type' => $tipe,
                'tanggal_pajak' => $pajak,
                'status' => $status,
                'warna' => $warna,
                'sewa' => $sewa,
                'foto' => file_get_contents(FCPATH.'/public/mobil/' . $nama_file)
            ]);
        } else {            
            return view('/Mobil/Error');
        }
        
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
