<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {
    public function __construct(){
        parent::__construct();
        apakah_sudah_masuk();
        kasir_only();
        $this->load->model('Pesan');
        $this->load->model('Akun');
    }

    public function index(){
        
    }
}