<?php

namespace App\Models;

use CodeIgniter\Model;

class FormulirModel extends Model
{
    protected $table = 'sewa';
    protected $primaryKey = 'idSewa';
    protected $allowedFields = ['idSewa','nama', 'mobil', 'sopir', 'tgl_pinjam', 'tgl_kembali'];

    public function simpan($record)
    {
        $this->save([
            'nama' => $record['nama'],
            'mobil' => $record['mobil'],
            'sopir' => $record['sopir'],
            'tgl_pinjam' => $record['pinjam'],
            'tgl_kembali' => $record['kembali'],
        ]);
    }
}
