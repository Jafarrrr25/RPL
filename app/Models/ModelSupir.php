<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSupir extends Model
{
    protected $table = 'supir';
    protected $primaryKey = 'idSupir';
    protected $allowedFields = [
        'idSupir', 'nama_supir', 'alamat_supir', 'no_telp_supir', 'foto_supir'
    ];


}
