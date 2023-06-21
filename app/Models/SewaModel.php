<?php

namespace App\Models;

use CodeIgniter\Model;

class SewaModel extends Model
{
    protected $table = 'sewa';
    protected $primaryKey = 'idSewa';
    protected $allowedFields = [
        'idSewa', 'nopol', 'idCustomer', 'idStaff', 'idSupir', 'tanggal_pinjam', 'tanggal_kembali', 'total_biaya'
    ];
}
