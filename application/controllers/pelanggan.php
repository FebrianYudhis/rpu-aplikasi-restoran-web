<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pelanggan extends CI_Controller {
    public function __construct(){
        parent::__construct();
        apakah_sudah_masuk();
        pelanggan_only();
    }

    public function index(){
        $this->load->view('pelanggan/index');
    }
}