<?php

namespace App\Models;

use CodeIgniter\Model;

class userModel extends Model
{
    protected $table = 'user';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'username', 'password', 'role', 'nomor', 'blok', 'img'];

    public function getUser($username = false)
    {
        if ($username == true) {
            return $this->where(['username' => $username])->first();
        }
        return $this->where('role !=', 3)->findAll();
    }
    public function cariUser($cari)
    {
        return $this->table('user')->where('role !=', 3)->like('nama', $cari);
    }
    public function foto($id, $nama)
    {
        return $this->table('user')->save(['id' => $id, 'img' => $nama]);
    }
    public function hapusFoto($id)
    {
        return $this->table('user')->save(['id' => $id, 'img' => null]);
    }
    public function userHapus($id)
    {
        $this->where('id', $id);
        return $this->table('user')->delete();
    }
}
