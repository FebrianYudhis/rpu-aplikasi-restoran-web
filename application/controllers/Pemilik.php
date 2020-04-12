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

    public function tambah(){
        $data['judul'] = "Tambah menu";
        $this->form_validation->set_rules('nama_menu','nama_menu','required');
        $this->form_validation->set_rules('harga','harga','required');
        if($this->form_validation->run()==false){
            $this->load->view('template/pemilik/header',$data);
            $this->load->view('pemilik/menu');
            $this->load->view('template/pemilik/footer');
        }else{
            $a = $this->input->post('nama_menu');
            $b = $this->input->post('jenis');
            $c = $this->input->post('harga');
            $d = $_FILES['gambar']['name'];
            var_dump($d);
            if($d==""){
                $data =[
                    'nama_menu'=>$a,
                    'jenis'=>$b,
                    'harga'=>$c,
                    'gambar'=>'default.png'
                ];
                $this->db->insert('menu',$data);
                $this->session->set_flashdata('pesan','<div class="alert alert-success">Menu berhasil ditambahkan</div>');
                redirect('Pemilik/list');
            }else{
                $config['upload_path']= "assets/images/menu";
                $config['allowed_types']= 'jpg|png';
                $config['max_size']= '2048';
        
                $this->load->library('upload', $config);
                
                if(!$this->upload->do_upload('gambar')){
                    $this->session->set_flashdata('pesan','<div class="alert alert-danger">Upload gagal,hanya boleh upload foto(jpg,png) dengan ukuran maksimal 2MB</div>');
                    redirect('Pemilik/tambah');
                }else{
                    $data =[
                        'nama_menu'=>$a,
                        'jenis'=>$b,
                        'harga'=>$c,
                        'gambar'=>$d
                    ];
                    $this->db->insert('menu',$data);
                    $this->session->set_flashdata('pesan','<div class="alert alert-success">Menu berhasil ditambahkan</div>');
                    redirect('Pemilik/list');
                }
            }
        }
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