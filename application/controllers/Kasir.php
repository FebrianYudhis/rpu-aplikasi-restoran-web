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
        $data['judul'] = "Home";
        $data['list'] = $this->db->get_where('order',['status'=>"Dikonfirmasi"]);
        $this->load->view('template/kasir/header',$data);
        $this->load->view('kasir/index',$data);
        $this->load->view('template/kasir/footer');
    }

    public function invoice($a){
        $data['judul'] = "Invoice";
        $data['lihat'] = $this->db->get_where('order',['no_invoice'=>$a]);
        $cek = $data['lihat']->row_array();
        $status = $cek['status'];
        if($status == "Dikonfirmasi"){
            $this->load->view('template/kasir/header',$data);
            $this->load->view('kasir/invoice',$data);
            $this->load->view('template/kasir/footer');
        }else{
            $this->session->set_flashdata('pesan','<div class="alert alert-danger col-lg-12">Akses ditolak</div>');
            redirect('Kasir');
        }
    }

    public function konfirmasi($a){
        $cek = $this->db->get_where('order',['no_invoice'=>$a])->row_array();
        if($cek['status'] == "Dikonfirmasi"){
            $data=[
                'status'=>"Sudah dibayar",
                'dikelola'=>$this->session->userdata('username')
            ];
            $this->db->where('no_invoice',$cek['no_invoice']);
            $this->db->update('order',$data);
            $this->session->set_flashdata('pesan','<div class="alert alert-success col-lg-12">Berhasil dibayar</div>');
            redirect('Kasir');
        }
    }

    public function keluar(){
        $this->Akun->keluar();
    }
}