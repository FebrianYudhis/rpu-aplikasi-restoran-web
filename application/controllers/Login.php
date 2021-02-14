<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		// Load model diawal,agar bisa dibaca
		$this->load->model('Akun');

		// Mengunci controller ini apabila sudah ada session yang didaftarkan
		// Fungsi ini diambil dari helper yang sudah didaftarkan dari autoload
		kunci_login();
	}

	public function index()
	{
		// Mengecek form,apakah data diisi sudah valid
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');

		if ($this->form_validation->run() == false) {
			// Jika belum valid,kembali isi data form sampai valid
			$this->load->view('login');
		} else {
			// Jika sudah valid,maka jalankan model ceklogin
			$this->Akun->ceklogin();
		}
	}
}
