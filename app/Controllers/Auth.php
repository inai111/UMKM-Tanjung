<?php

namespace App\Controllers;

use App\Models\userModel;

class Auth extends BaseController
{
	protected $userModel;
	public function __construct()
	{
		$this->userModel = new userModel();
	}
	//view login sekalian validasi akun
	public function index()
	{

		$data = [
			'pesan' => $this->session->getFlashdata('pesan'),
			'username' => $this->session->get('username')
		];
		//cek form terisi
		if (!$this->validate([
			'username' => [
				'rules' => 'required',
				'errors' => ['required' => 'kolom {field} harus diisi']
			],
			'password' => ['rules' => 'required', 'errors' => ['required' => 'kolom {field} harus diisi']]
		])) {
			return view('auth', $data);
		} else {
			$user = [
				'username' => $this->request->getPost('username'),
				'password' => $this->request->getPost('password'),
			];

			$cek = $this->userModel->getUser($user['username']);
			$cekPassword = password_verify($user['password'], $cek['password']);
			$user['role'] = $cek['role'];
			//cek username
			if ($cek) {
				//cek password
				if ($cekPassword) {
					//cek aktifasi
					if ($cek['role'] != 0) {
						$this->session->set($user);
						return redirect()->to('/sistem')->withInput();
					} else {
						$this->session->setFlashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button> 
					<strong>Gagal</strong>, Hubungi ibu Nuril untuk aktivasi akun anda.
					</div>');
						return redirect()->to('/auth')->withInput();
					} //end cek aktifasi
				} else {
					$this->session->setFlashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button> 
					<strong>Gagal</strong>, Username atau password anda salah.
					</div>');
					return redirect()->to('/auth')->withInput();
				} //end cek password
			} else {
				$this->session->setFlashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button> 
				<strong>Gagal</strong>, username tidak terdaftar.
				</div>');
				return redirect()->to('/auth')->withInput();
			}; // end cek username
		} // end cek form terisi
	} // end method

	//cuman view daftar
	public function daftar()
	{
		$data = [
			'validation' => \Config\Services::validation(),
			'username' => $this->session->get('username')
		];
		return view('daftar', $data);
	} //end method

	//mendaftarkan anggota
	public function valid()
	{
		//cek form
		if (!$this->validate([
			'nama' => [
				'rules' => 'required|alpha_space',
				'errors' => [
					'required' => 'kolom {field} harus diisi',
					'aplha_space' => 'kolom {field} harus berisikan huruf abjad saja'
				]
			],
			'username' => [
				'rules' => 'required|is_unique[user.username]',
				'errors' => [
					'required' => 'kolom {field} harus diisi',
					'is_unique' => '{field} sudah dipakai'
				]
			],
			'block' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'kolom {field} perumahan harus diisi'
				]
			],
			'password' => [
				'rules' => 'required|min_length[6]|max_length[20]|matches[password2]',
				'errors' => [
					'required' => 'kolom {field} harus diisi',
					'min_length' => '{field} minimal 6 kombinasi dan maksimal 20',
					'max_length' => '{field} minimal 6 kombinasi dan maksimal 20',
					'matches' => 'Password tidak sama dengan password 2'
				]
			],
			'nomor' => [
				'rules' => 'required|numeric|min_length[11]|max_length[15]',
				'errors' => [
					'required' => 'kolom {field} whatsapp harus diisi',
					'numeric' => 'kolom {field} whatsapp harus memakai angka saja',
					'min_length' => 'minimal {field} berjumlah 11 dan maksimal 15 angka saja',
					'max_length' => 'minimal {field} berjumlah 11 dan maksimal 15 angka saja'

				]
			]

		])) {
			return redirect()->to('daftar')->withInput();
		} else {
			$query = [
				'nama' => $this->request->getPost('nama'),
				'username' => $this->request->getPost('username'),
				'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
				'role' => 0,
				'nomor' => $this->request->getPost('nomor'),
				'blok' => $this->request->getPost('block')
			];
			$this->userModel->save($query);
			// cek perubahan pada database
			if ($this->userModel->affectedRows() == 0) {
				$this->session->setFlashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button> 
				<strong>Gagal</strong> didaftarkan, silahkan coba kembali.
			</div>');
			} else {
				$this->session->setFlashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button> 
				<strong>Berhasil</strong> didaftarkan.
			</div>');
			} //end cek perubahan db
			return redirect()->to('/auth')->withInput();
		} //end cek form
	} // end method
}
