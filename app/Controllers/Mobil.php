<?php

namespace App\Controllers;

use CodeIgniter\Files\File;
use App\Models\ModelMobil;

class Mobil extends BaseController
{
    public function index()
    {
        return view('Mobil/addMobil');
    }
    public function showData()
    {
        return view('Mobil/dataMobil');
    }

    public function simpan()
    {
        $session = session();
        if ($session->has('username')) {
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

            return view('Mobil/addMobil', $data);
        }


        // Memeriksa apakah melakukan submit data atau tidak.
        if (!$this->request->is('post')) {
            return view('/Mobil/addMobil');
        }
        if ($this->request->getFiles()) {

            // Generate nama unik untuk file
            $nama = $this->request->getPost(["nama"]);
            $plat = $this->request->getPost(["plat"]);
            $tipe = $this->request->getPost(["tipe"]);
            $pajak = $this->request->getPost(["tgl_pjk"]);
            $status = $this->request->getPost(["status"]);
            $warna = $this->request->getPost(["warna"]);
            $sewa = $this->request->getPost(["sewa"]);
            $img = $this->request->getFile('foto');

            $image = file_get_contents($img->getRealPath());

            // Mengakses Model untuk menyimpan data
            $model = model(ModelMobil::class);
            $model->insert([
                'nama_kendaraan' => $nama,
                'nopol' => $plat,
                'type' => $tipe,
                'tanggal_pajak' => $pajak,
                'status' => $status,
                'warna' => $warna,
                'harga_sewa' => $sewa,
                'foto' => $image
            ]);
            return view('/Mobil/Success');
        } else {            
            return view('/Mobil/Error');
        }
        } else {
            return view('/akun/Login');
        } 
    }
}
