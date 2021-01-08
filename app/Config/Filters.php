<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Filters extends BaseConfig
{
	// Makes reading things below nicer,
	// and simpler to change out script that's used.
	public $aliases = [
		'csrf'     => \CodeIgniter\Filters\CSRF::class,
		'toolbar'  => \CodeIgniter\Filters\DebugToolbar::class,
		'honeypot' => \CodeIgniter\Filters\Honeypot::class,
		'udahLogin' => \App\Filters\udahLogin::class,
		'belumLogin' => \App\Filters\belumLogin::class,
		'special' => [
			\App\Filters\udahLogin::class,
			\App\Filters\belumLogin::class
		],
	];

	// Always applied before every request
	public $globals = [
		'before' => [
			//'honeypot'
		],
		'after'  => [
			'toolbar',
			//'honeypot'
		],
	];

	// Works on all of a particular HTTP method
	// (GET, POST, etc) as BEFORE filters only
	//     like: 'post' => ['CSRF', 'throttle'],
	public $methods = [];

	// List filter aliases and any before/after uri patterns
	// that they should run on, like:
	//    'isLoggedIn' => ['before' => ['account/*', 'profiles/*']],
	public $filters = [
		'udahLogin' => [
			'before' => ['/auth', 'auth/daftar', '/pemasukan', '/pengeluaran', '/user'],
		],
		'belumLogin' => ['before' => [
			'/sistem', '/user', '/print', '/pemasukan',
			'/pengeluaran', '/fotoprofil', '/profil',
			'/akun', '/agenda', '/agendatambah',
			'/gambar', '/gambartambah', '/keluar'
		]],
		'csrf' => [
			'before' => ['/auth', 'auth/valid', '/agendatambah', '/akun', '/profil', '/gambartambah', '/pemasukan', '/pengeluaran'],
		],

	];
}
