<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {
    public function __construct(){
        parent::__construct();
        apakah_sudah_masuk();
    }

    public function index(){
        echo 'yas';
    }
}