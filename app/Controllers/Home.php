<?php

namespace App\Controllers;

use App\Models\kasModel;
use App\Models\userModel;
use App\Models\imgModel;

class Home extends BaseController
{
	protected $kasModel;
	protected $userModel;
	protected $imgModel;
	public function __construct()
	{
		$this->kasModel = new kasModel();
		$this->userModel = new userModel();
		$this->imgModel = new imgModel();
	}
	public function index()
	{
		$data = [
			'img' => $this->imgModel->findAll(),
			'kas' => $this->kasModel->lastSaldo()->first(),
			'jumlah' => $this->userModel->where('role !=', 3)->countAll(),
			'judul' => 'Home',
			'username' => $this->session->has('username')
		];
		return view('home/index', $data);
	}

	//--------------------------------------------------------------------

}
