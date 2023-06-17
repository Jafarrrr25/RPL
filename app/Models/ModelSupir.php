<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSupir extends Model
{
    protected $table = 'Supir';
    protected $allowedFields = [
        'idSupir', 'nama_supir', 'alamat_supir', 'no_telp_supir', 'foto_supir'
    ];

    public function simpan($record)
    {
        $foto = $this->request->getFile('foto');
        if ($foto->isValid() && !$foto->hasMoved()) {
            $newName = $foto->getRandomName();
            $foto->move('D:/Install/xampp/htdocs/RPL/public', $newName); // Specify the destination folder for uploaded photos

            $record['foto'] = $newName;
        } else {
            echo "<h2>Gagal Upload Foto</h2>";
        }

        $this->save($record);
    }

}
