<?php

namespace App\Controllers;

use App\Models\userModel;
use App\Models\kasModel;
use App\Models\imgModel;
use App\Models\agendaModel;

class Sistem extends BaseController
{
    protected $userModel;
    protected $kasModel;
    protected $imgModel;
    protected $agendaModel;
    public function __construct()
    {
        $this->userModel = new userModel();
        $this->kasModel = new kasModel();
        $this->imgModel = new imgModel();
        $this->agendaModel = new agendaModel();
    }
    public function index()
    {
        $user = $this->userModel->getUser($this->session->get('username'));
        if ($this->session->has('username')) {
            $data = [
                'img' => $this->imgModel->findAll(),
                'jumlah' => $this->userModel->where('role !=', 3)->countAll(),
                'kas' => $this->kasModel->lastSaldo()->first(),
                'agenda' => $this->agendaModel->where('expired >= CURDATE()')->findAll(),
                'judul' => 'Dashboard',
                'user' => $user,
                'role' => $user['role']
            ];
            return view('sistem/dashboard', $data);
        } else {
            return redirect()->to('/auth');
        }
    }
    // fungsi user
    public function user()
    {
        $user = $this->userModel->getUser($this->session->get('username'));
        $current = $this->request->getVar('page_user') ? $this->request->getVar('page_user') : 1;
        $cari = $this->request->getPost('cari');
        if ($cari) {
            $userTable = $this->userModel->cariUser($cari);
        } else {
            $userTable = $this->userModel->where('role !=', 3);
        }
        $data = [
            'judul' => 'Tabel User',
            'user' => $user,
            'current' => $current,
            'usertable' => $userTable->paginate(6, 'user'),
            'pager' => $userTable->pager
        ];
        return view('sistem/userTable', $data);
    }
    //fungsi ganti status
    public function ganti($id, $a)
    {
        $this->userModel->save(['id' => $id, 'role' => $a]);
        return redirect()->to('/user');
    }

    public function userhapus($id)
    {
        $this->userModel->userHapus($id);
        return redirect()->to('/user');
    }
    // end fungsi user

    //fungsi kas
    public function kas()
    {

        $cari = [
            'tanggal1' => $this->request->getPost('tanggal'),
            'tanggal2' => $this->request->getPost('tanggal2')
        ];
        if ($cari['tanggal1'] && $cari['tanggal2']) {
            $kastable = $this->kasModel->cariKas($cari);
        } else {
            $kastable = $this->kasModel->orderBy('tanggal', 'DESC');
        }
        $current = $this->request->getVar('page_kas') ? $this->request->getVar('page_kas') : 1;
        $user = $this->userModel->getUser($this->session->get('username'));
        $data = [
            'cari' => $cari,
            'judul' => 'Tabel Kas',
            'user' => $user,
            'current' => $current,
            'kastable' => $kastable->paginate(6, 'kas'),
            'pager' => $kastable->pager
        ];
        return view('sistem/kasTable', $data);
    }

    //hapus kas
    public function hapuskas($a)
    {
        $this->kasModel->deletekas($a);
        return redirect()->to('/kas');
    }
    //end fungsi kas

    //fungsi print
    public function print()
    {
        $tanggal = $this->kasModel->lastDate()->first();
        $cari = [
            'tanggal1' => $this->request->getPost('tanggal'),
            'tanggal2' => $this->request->getPost('tanggal2')
        ];
        if ($cari['tanggal1'] && $cari['tanggal2']) {
            $kastable = $this->kasModel->cariKas($cari);
        } else {
            $kastable = $this->kasModel->orderBy('tanggal', 'ASC');
        }
        $user = $this->userModel->getUser($this->session->get('username'));
        $data = [
            'tanggal' => $tanggal,
            'cari' => $cari,
            'judul' => 'Print Kas',
            'user' => $user,
            'kastable' => $kastable->findAll()
        ];
        return view('sistem/print', $data);
    }
    //end fungsi print

    //fungsi pemasukan
    public function pemasukan()
    {
        $user = $this->userModel->getUser($this->session->get('username'));
        if ($this->session->has('username')) {
            $data = [
                'judul' => 'Pemasukan',
                'validation' => \Config\Services::validation(),
                'user' => $user
            ];
            return view('sistem/pemasukan', $data);
        }
        return redirect()->to('/auth');
    }

    //terima data dan masukkan ke db; ada hitungannya juga
    public function pemasukanDB()
    {
        if (!$this->validate([
            'tanggal' => [
                'rules' => 'required',
                'errors' => ['required' => '{field} pemasukan harus diisi']
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => ['required' => '{field} pemasukan harus diisi']
            ],
            'pemasukan' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} pemasukan harus diisi',
                    'numeric' => '{field} harus berisi angka saja'
                ]
            ]
        ])) {
            return redirect()->to('/pemasukan')->withInput();
        } else {
            $saldo = $this->kasModel->lastSaldo()->first();
            $pemasukan = $this->request->getPost('pemasukan');
            $query = [
                'tanggal' => $this->request->getPost('tanggal'),
                'keterangan' => $this->request->getPost('keterangan'),
                'pemasukan' => $pemasukan,
                'pengeluaran' => null,
                'saldo' => $saldo['saldo'] + $pemasukan
            ];
            $this->kasModel->insert($query);
            return redirect()->to('/kas');
        };
    }
    //end fungsi pemasukan

    //fungsi pengeluaran
    public function pengeluaran()
    {
        $user = $this->userModel->getUser($this->session->get('username'));
        $data = [
            'judul' => 'Pengeluaran',
            'validation' => \Config\Services::validation(),
            'user' => $user
        ];
        return view('sistem/pengeluaran', $data);
    }

    //fungsi memasukkan ke db dan hitungan pengeluaran;
    public function pengeluaranDB()
    {
        if (!$this->validate([
            'tanggal' => [
                'rules' => 'required',
                'errors' => ['required' => '{field} pengeluaran harus diisi']
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => ['required' => '{field} pengeluaran harus diisi']
            ],
            'pengeluaran' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} pengeluaran harus diisi',
                    'numeric' => '{field} harus berisi angka saja'
                ]
            ]
        ])) {
            return redirect()->to('/pengeluaran')->withInput();
        } else {
            $saldo = $this->kasModel->lastSaldo()->first();
            $pengeluaran = $this->request->getPost('pengeluaran');
            $query = [
                'tanggal' => $this->request->getPost('tanggal'),
                'keterangan' => $this->request->getPost('keterangan'),
                'pemasukan' => null,
                'pengeluaran' => $pengeluaran,
                'saldo' => $saldo['saldo'] - $pengeluaran
            ];
            $this->kasModel->insert($query);
            return redirect()->to('/kas');
        };
    }
    //end fungsi pengeluaran

    //fungsi fotoProfil
    public function fotoProfil()
    {
        $user = $this->userModel->getUser($this->session->get('username'));
        $data = [
            'pesan' => $this->session->getFlashdata('pesan'),
            'validation' => \Config\Services::validation(),
            'judul' => 'Foto Profil',
            'user' => $user
        ];
        return view('sistem/fotoprofil', $data);
    }

    //memasukkan foto sambil nge random nama ke db
    public function fotoDB()
    {
        $user = $this->userModel->getUser($this->session->get('username'));
        if (!$this->validate([
            'foto' => [
                'rules' => 'uploaded[foto]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Kolom {field} harus diisi',
                    'is_image' => 'yang anda pilih bukan gambar',
                    'mime_in' => 'yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to('/fotoprofil')->withInput();
        } else {
            $cekImg = $user['img'];
            if ($cekImg) {
                unlink('assets/img/fotoProfile/' . $cekImg);
            };
            $foto = $this->request->getFile('foto');
            $namaFoto = $foto->getRandomName();
            $foto->move('assets/img/fotoProfile', $namaFoto);
            $this->userModel->foto($user['id'], $namaFoto);

            $this->session->setFlashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button> 
            Foto <strong>Berhasil</strong>, disimpan.
            </div>');
            return redirect()->to('/fotoprofil');
        }
    }

    //ganti nama foto ke kosong
    public function fotohapus($i)
    {

        $user = $this->userModel->getUser($this->session->get('username'));
        unlink('assets/img/fotoProfile/' . $user['img']);
        $this->userModel->hapusFoto($i);
        $this->session->setFlashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button> 
					Foto telah <strong>berhasil</strong> dihapus.
					</div>');
        return redirect()->to('/fotoprofil');
    }

    //end fungsi foto

    //fungsi data diri
    public function profil()
    {
        $user = $this->userModel->getUser($this->session->get('username'));
        $data = [
            'judul' => 'Data Diri',
            'validation' => \Config\Services::validation(),
            'user' => $user
        ];
        return view('sistem/data', $data);
    }

    public function profildb($id)
    {
        $user = $this->userModel->getUser($this->session->get('username'));
        if (!$this->validate([
            'nomor' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'kolom {field} whatsapp harus diisi',
                    'numeric' => 'kolom {field} harus berisi angka saja'
                ]
            ],
            'blok' => ['rules' => 'required', 'errors' => ['required' => 'kolom {field} perumahan harus diisi']]
        ])) {
            return redirect()->to('/profil')->withInput();
        } else {
            $query = [
                'id' => $id,
                'nomor' => $this->request->getPost('nomor'),
                'blok' => $this->request->getPost('blok')
            ];
            $this->userModel->save($query);
            return redirect()->to('/profil');
        }
    }
    //end fungsi data diri

    //fungsi data diri
    public function akun()
    {
        $user = $this->userModel->getUser($this->session->get('username'));
        $data = [
            'pesan' => $this->session->getFlashdata('pesan'),
            'judul' => 'Informasi Akun',
            'validation' => \Config\Services::validation(),
            'user' => $user
        ];
        return view('sistem/akun', $data);
    }

    public function akundb($id)
    {
        $user = $this->userModel->getUser($this->session->get('username'));
        if (!$this->validate([
            'password' => [
                'rules' => 'required|min_length[6]|max_length[20]',
                'errors' => [
                    'required' => 'Password perlu diisi untuk konfirmasi',
                    'min_length' => 'Password minimal memiliki 6 karakter dan angka',
                    'max_length' => 'Password maximal memiliki 20 karakter dan angka',
                ]
            ],
            'password3' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Password Perlu diisi',
                    'matches' => 'Tidak sama dengan Password baru anda'
                ],
            ],
            'password2' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pastikan mengisi kolom password lama untuk mengganti password baru'
                ]
            ]
        ])) {
            return redirect()->to('/akun')->withInput();
        } else {
            $query = [
                'id' => $id,
                'username' => $this->request->getPost('username'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            ];
            $cekPassword = password_verify($this->request->getPost('password'), $user['password']);
            if ($cekPassword) {
                $this->userModel->save($query);
                return redirect()->to('/akun')->withInput();
            } else {
                $this->session->setFlashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button> 
					<strong>Gagal</strong>, Password konfirmasi anda salah.
					</div>');
                return redirect()->to('/akun')->withInput();
            }
        }
    }
    //end fungsi data diri

    //fungsi agenda
    public function agenda()
    {
        $user = $this->userModel->getUser($this->session->get('username'));
        $cari = [
            'tanggal1' => $this->request->getPost('tanggal1'),
            'tanggal2' => $this->request->getPost('tanggal2')
        ];
        if ($cari['tanggal1'] && $cari['tanggal2']) {
            $agenda = $this->agendaModel->cariAgenda($cari);
        } else {
            $agenda = $this->agendaModel->orderBy('tanggal', 'DESC');
        }
        $data = [
            'pesan' => $this->session->getFlashdata('pesan'),
            'agenda' => $agenda->paginate(7, 'agenda'),
            'pager' => $agenda->pager,
            'judul' => 'Agenda UMKM',
            'user' => $user
        ];
        return view('sistem/agenda', $data);
    }

    public function agendahapus($id)
    {
        $this->agendaModel->hapusAgenda($id);
        $this->session->setFlashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button> 
					Agenda telah <strong>berhasil</strong> dihapus.
					</div>');
        return redirect()->to('/agenda');
    }

    public function agendatambah()
    {
        $user = $this->userModel->getUser($this->session->get('username'));
        $data = [
            'validation' => \Config\Services::validation(),
            'pesan' => $this->session->getFlashdata('pesan'),
            'judul' => 'Tambah Agenda',
            'user' => $user
        ];
        return view('sistem/agendatambah', $data);
    }


    public function agendatambahdb()
    {
        $user = $this->userModel->getUser($this->session->get('username'));
        if (!$this->validate([
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tanggal dimulai agenda perlu diisi'
                ],
            ],
            'exp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Agenda berakhir hingga tanggal ?'
                ],
            ],
            'agenda' => [
                'rules' => 'required',
                'errors' => [
                    'max_length' => 'agenda cukup 20',
                    'required' => 'Pastikan mengisi kolom agenda'
                ]
            ]
        ])) {
            return redirect()->to('/agendatambah')->withInput();
        } else {
            $query = [
                'agenda' => $this->request->getPost('agenda'),
                'tanggal' => $this->request->getPost('tanggal'),
                'expired' => $this->request->getPost('exp')
            ];
            $this->agendaModel->save($query);
            return redirect()->to('/agenda');
        }
    }
    //end fungsi agenda

    //fungsi gambar
    public function gambar()
    {
        $user = $this->userModel->getUser($this->session->get('username'));
        $cari = [
            'tanggal1' => $this->request->getPost('tanggal1'),
            'tanggal2' => $this->request->getPost('tanggal2')
        ];
        if ($cari['tanggal1'] && $cari['tanggal2']) {
            $images = $this->imgModel->cariImg($cari);
        } else {
            $images = $this->imgModel->orderBy('tanggal', 'DESC');
        }
        $data = [
            'pesan' => $this->session->getFlashdata('pesan'),
            'img' => $images->paginate(7, 'img'),
            'pager' => $images->pager,
            'judul' => 'Gambar',
            'user' => $user
        ];
        return view('sistem/gambar', $data);
    }

    public function gambarhapus($id)
    {
        $images = $this->imgModel->where('id', $id)->first();
        unlink('assets/img/karosel/' . $images['img']);
        $this->imgModel->hapusImg($id);
        $this->session->setFlashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button> 
					Gambar telah <strong>berhasil</strong> dihapus.
					</div>');
        return redirect()->to('/gambar');
    }

    public function gambartambah()
    {
        $user = $this->userModel->getUser($this->session->get('username'));
        $data = [
            'validation' => \Config\Services::validation(),
            'pesan' => $this->session->getFlashdata('pesan'),
            'judul' => 'Tambah Gambar',
            'user' => $user
        ];
        return view('sistem/gambartambah', $data);
    }

    public function gambartambahdb()
    {
        $user = $this->userModel->getUser($this->session->get('username'));
        if (!$this->validate([
            'gambar' => [
                'rules' => 'uploaded[gambar]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Kolom {field} harus diisi',
                    'is_image' => 'yang anda pilih bukan gambar',
                    'mime_in' => 'yang anda pilih bukan gambar'
                ]
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tanggal foto perlu diisi'
                ],
            ],
            'judul' => [
                'rules' => 'required|max_length[80]',
                'errors' => [
                    'max_length' => 'judul cukup 80',
                    'required' => 'Pastikan mengisi kolom judul'
                ]
            ]
        ])) {
            return redirect()->to('/gambartambah')->withInput();
        } else {
            $gambar = $this->request->getFile('gambar');
            $namaGambar = $gambar->getRandomName();
            $gambar->move('assets/img/karosel/', $namaGambar);
            $query = [
                'img' => $namaGambar,
                'judul' => $this->request->getPost('judul'),
                'tanggal' => $this->request->getPost('tanggal'),
            ];
            $this->imgModel->save($query);
            return redirect()->to('/gambar');
        }
    }
    //end fungsi gambar
    //--------------------------------------------------------------------

}
