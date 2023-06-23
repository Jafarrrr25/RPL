<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'idCustomer';
    protected $allowedFields = [
        'username', 'password', 'nama', 'alamat', 'email', 'no_telp'
    ];

    public function user($usr)
    {
        return $this->where(['username' => $usr, 'password' => $usr])->first();
    }
}
