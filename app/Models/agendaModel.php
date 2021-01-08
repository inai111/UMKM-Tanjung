<?php

namespace App\Models;

use CodeIgniter\Model;

class agendaModel extends Model
{
    protected $table = 'agenda';
    protected $useTimestamps = true;
    protected $allowedFields = ['agenda', 'tanggal', 'expired'];

    public function cariAgenda($cari)
    {
        $this->table('agenda')->where('tanggal >=', $cari['tanggal1']);
        $this->table('agenda')->where('tanggal <=', $cari['tanggal2']);
        return $this->table('agenda')->orderBy('tanggal', 'DESC');
    }

    public function hapusAgenda($id)
    {
        $this->table('agenda')->where('id', $id);
        return $this->table('agenda')->delete();
    }
}
