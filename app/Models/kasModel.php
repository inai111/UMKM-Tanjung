<?php

namespace App\Models;

use CodeIgniter\Model;

class kasModel extends Model
{
    protected $table = 'kas';
    protected $useTimestamps = true;
    protected $allowedFields = ['tanggal', 'keterangan', 'pemasukan', 'pengeluaran', 'saldo'];

    public function cariKas($cari)
    {
        $this->table('kas')->where('tanggal >=', $cari['tanggal1']);
        $this->table('kas')->where('tanggal <=', $cari['tanggal2']);
        return $this->table('kas')->orderBy('tanggal', 'DESC');
    }
    public function lastSaldo()
    {
        return $this->table('kas')->orderBy('id', 'DESC');
    }
    public function lastDate()
    {
        return $this->table('kas')->orderBy('tanggal', 'ASC');
    }
    public function deletekas($id)
    {
        return $this->table('kas')->delete(['id' => $id]);
    }
}
