<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index()
	{
		$this->form_validation->set_rules('username','username','required');
		$this->form_validation->set_rules('password','password','required');
		
		if($this->form_validation->run() == false){
			$this->load->view('login');
		}else{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$cek = [
				'username'=> $username,
				'password' => $password
			];
			$cek_baris = $this->db->get_where('akun',$cek)->num_rows();
			$cek_array = $this->db->get_where('akun',$cek)->result_array();
		}
	}

 
}
