<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemilik extends CI_Controller {
    public function __construct(){
        parent::__construct();
        apakah_sudah_masuk();
        pemilik_only();
        $this->load->model('Pesan');
        $this->load->model('Akun');
    }

    public function index(){
        $data['judul'] = "Home";
        $sekarang = date('Y-m');
        $data['jumlahpendapatan'] = $this->db->query("SELECT sum(total) FROM `order` WHERE tanggal_pemesanan BETWEEN '{$sekarang}-1' AND '{$sekarang}-31' AND status='Sudah dibayar'")->row_array();
        $data['jumlahpemesanan'] = $this->db->query("SELECT * FROM `order` WHERE status='Sudah dibayar'")->num_rows();
        $data['jumlahmenu'] = $this->db->count_all('menu');
        $data['semuaorder'] = $this->db->get_where('order',['status'=>"Sudah dibayar"]);
        $this->load->view('template/pemilik/header',$data);
        $this->load->view('pemilik/index',$data);
        $this->load->view('template/pemilik/footer');
    }

    public function cek($a,$b){
        $check = $this->db->query("SELECT * FROM `ORDER` WHERE status='Sudah dibayar' AND tanggal_pemesanan BETWEEN '$a' and '$b'")->result();
        $check2 = $this->db->query("SELECT * FROM `ORDER` WHERE status='Sudah dibayar' AND tanggal_pemesanan BETWEEN '$a' and '$b'")->num_rows();
        if($check2 > 0){
            echo json_encode($check);
        }else{
            $kosong = [
                [
                "no_invoice"=>"-",
                "nama_pemesan"=>"-",
                "meja"=>"-",
                "tanggal_pemesanan"=>"-",
                "total"=>"-",
                "status"=>"-",
                "dikelola"=>"-"
                ]
            ];
            echo json_encode($kosong);
        }
    }

    public function keluar(){
        $this->Akun->keluar();
    }
}