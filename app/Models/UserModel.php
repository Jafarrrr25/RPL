<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'idCustomer';
    protected $allowedFields = [
        'idCustomer', 'username', 'password', 'nama', 'alamat', 'email', 'no_telp'
    ];
}
