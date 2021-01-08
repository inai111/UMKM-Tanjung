<?php

namespace App\Models;

use CodeIgniter\Model;

class imgModel extends Model
{
    protected $table = 'img';
    protected $useTimestamps = true;
    protected $allowedFields = ['img', 'judul', 'tanggal'];

    public function cariImg($cari)
    {
        $this->table('img')->where('tanggal >=', $cari['tanggal1']);
        $this->table('img')->where('tanggal <=', $cari['tanggal2']);
        return $this->table('img')->orderBy('tanggal', 'DESC');
    }

    public function hapusImg($id)
    {
        $this->table('img')->where('id', $id);
        return $this->table('img')->delete();
    }
}
