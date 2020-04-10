<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pelanggan extends CI_Controller {
    public function __construct(){
        parent::__construct();
        apakah_sudah_masuk();
        pelanggan_only();
        $this->load->model('pesan');
    }

    public function index(){
        $data['makanan'] = $this->db->get_where('menu',['jenis'=>"Makanan"]);
        $data['minuman'] = $this->db->get_where('menu',['jenis'=>"minuman"]);
        $this->db->order_by('jenis ASC,nama_menu ASC');
        $data['menu'] = $this->db->get('menu');
        $data['kotak'] = $this->db->get_where('order_detail',['no_invoice'=>$this->session->userdata('no_invoice')]);
        $this->db->select_sum('subtotal');
        $data['total'] = $this->db->get_where('order_detail',['no_invoice'=>$this->session->userdata('no_invoice')])->row_array();

        if(!$this->session->userdata('nama_pemesan')){
            $this->form_validation->set_rules('nama_pemesan','nama_pemesan','required');
            if($this->form_validation->run()==false){
                $this->load->view('pelanggan/awal',$data);
                $this->load->view('pelanggan/pemesanan');
                $this->load->view('pelanggan/akhir');
            }else{
                $this->session->set_userdata(['nama_pemesan'=>$this->input->post('nama_pemesan')]);
                $this->session->set_userdata(['no_invoice'=> random_string('alnum',8)]);
                $this->session->set_userdata(['tanggal'=> date('Y-m-d')]);
                redirect('pelanggan#pemesanan');
            }
        }else{
            $this->form_validation->set_rules('menu','menu','required');
            $this->form_validation->set_rules('harga','harga','required');
            $this->form_validation->set_rules('jumlah','is_natural_no_zero|required');
            if($this->form_validation->run()==false){
                $this->load->view('pelanggan/awal',$data);
                $this->load->view('pelanggan/pemesanan2',$data);
                $this->load->view('pelanggan/akhir');
            }else{
                $this->pesan->tambah_pesanan();
            }
        }
            
    }

    public function ambildata($a){
        $ambil = $this->db->get_where('menu',['id_menu'=>$a])->row_array();
        echo $ambil['id_menu']."|".$ambil['nama_menu']."|".$ambil['harga'];
    }

    public function hapus($a){
        $cek = $this->db->get_where('order_detail',['no_order'=>$a])->row_array();
        if($this->session->userdata('no_invoice') != $cek['no_invoice']){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger">Akses ditolak</div>');
        }else{
            $this->db->delete('order_detail',['no_order'=>$a]);
            $this->session->set_flashdata('pesan','<div class="alert alert-success">Berhasil dihapus</div>');
        }
        redirect('pelanggan#pemesanan');
    }

    public function selesai(){
        $this->db->select_sum('subtotal');
        $total = $this->db->get_where('order_detail',['no_invoice'=>$this->session->userdata('no_invoice')])->row_array();
        $data = [
            'no_invoice'=>$this->session->userdata('no_invoice'),
            'nama_pemesan'=>$this->session->userdata('nama_pemesan'),
            'meja'=>$this->session->userdata('username'),
            'tanggal_pemesanan'=>$this->session->userdata('tanggal'),
            'total'=>$total['subtotal'],
            'status'=>"Dipesan"
        ];
        $this->db->insert('order',$data);

        $this->session->unset_userdata('no_invoice');
        $this->session->unset_userdata('nama_pemesan');
        $this->session->unset_userdata('tanggal');

        $this->session->set_flashdata('pesan','<div class="alert alert-success">Pesanan anda sudah ada didalam antrian</div>');
        redirect('pelanggan#pemesanan');
    }
}