<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelRegister extends Model
{
    protected $table = 'customer';
    protected $allowedFields = ['idCustomer', 'username', 'password', 'nama', 'alamat', 'email', 'no_telp'];

    public function simpan($record)
    {
        $this->save([
            'idCustomer' => $record['idCustomer'],
            'username' => $record['username'],
            'password' => $record['password'],
            'nama' => $record['nama'],
            'alamat' => $record['alamat'],
            'email' => $record['email'],
            'no_telp' => $record['no_telp'],
        ]);
    }
}
