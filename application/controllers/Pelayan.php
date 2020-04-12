<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelayan extends CI_Controller {
    public function __construct(){
        parent::__construct();
        apakah_sudah_masuk();
        pelayan_only();
        $this->load->model('Pesan');
        $this->load->model('Akun');
    }

    public function index(){
        $data['judul'] = "Home";
        $this->load->view('template/pelayan/header',$data);
        $this->load->view('pelayan/index');
        $this->load->view('template/pelayan/footer');
    }

    public function list(){
        $data['judul'] = "List pesanan";
        $data['list'] = $this->db->get_where('order',['status'=>'Dipesan']);
        $this->load->view('template/pelayan/header',$data);
        $this->load->view('pelayan/list',$data);
        $this->load->view('template/pelayan/footer');
    }

    public function tambah(){
        $data['judul'] = "Pemesanan";
        $data['meja'] = $this->db->get_where('akun',['id_akses'=>5]);
        $data['makanan'] = $this->db->get_where('menu',['jenis'=>"Makanan"]);
        $data['minuman'] = $this->db->get_where('menu',['jenis'=>"minuman"]);
        $this->db->order_by('jenis ASC,nama_menu ASC');
        $data['menu'] = $this->db->get('menu');
        $data['kotak'] = $this->db->get_where('order_detail',['no_invoice'=>$this->session->userdata('no_invoice')]);
        $this->db->select_sum('subtotal');
        $data['total'] = $this->db->get_where('order_detail',['no_invoice'=>$this->session->userdata('no_invoice')])->row_array();
        
        if(!$this->session->userdata('nama_pemesan')){
            $this->form_validation->set_rules('nama_pemesan','nama_pemesan','required');
            $this->form_validation->set_rules('meja','meja','required');
            if($this->form_validation->run()==false){
                $this->load->view('template/pelayan/header',$data);
                $this->load->view('pelayan/tambah',$data);
                $this->load->view('template/pelayan/footer');
            }else{
                $this->session->set_userdata(['nama_pemesan'=>$this->input->post('nama_pemesan')]);
                $this->session->set_userdata(['no_invoice'=> random_string('alnum',8)]);
                $this->session->set_userdata(['tanggal'=> date('Y-m-d')]);
                $this->session->set_userdata(['meja'=> $this->input->post('meja')]);
                redirect('Pelayan/tambah');
            }
        }else{
            $this->form_validation->set_rules('menu','menu','required');
            $this->form_validation->set_rules('harga','harga','required');
            $this->form_validation->set_rules('jumlah','jumlah','is_natural_no_zero|required');
            if($this->form_validation->run()==false){
                $this->load->view('template/pelayan/header',$data);
                $this->load->view('pelayan/tambah2');
                $this->load->view('template/pelayan/footer');
            }else{
                $this->Pesan->tambah_pesanan2();
            }
        }
    }

    public function edit($a){
        $data['judul'] = "Edit pesanan";
        $data['meja'] = $this->db->get_where('akun',['id_akses'=>5]);
        $data['makanan'] = $this->db->get_where('menu',['jenis'=>"Makanan"]);
        $data['minuman'] = $this->db->get_where('menu',['jenis'=>"minuman"]);
        $this->db->order_by('jenis ASC,nama_menu ASC');
        $data['menu'] = $this->db->get('menu');
        $data['kotak'] = $this->db->get_where('order_detail',['no_invoice'=>$a]);
        $this->db->select_sum('subtotal');
        $data['total'] = $this->db->get_where('order_detail',['no_invoice'=>$a])->row_array();
        $data['orderan'] = $this->db->get_where('order',['no_invoice'=>$a])->row_array();

        $query = $this->db->get_where('order',['no_invoice'=>$a])->row_array();
        
        if($query['status'] == "Dipesan"){
            $this->form_validation->set_rules('menu','menu','required');
            $this->form_validation->set_rules('harga','harga','required');
            $this->form_validation->set_rules('jumlah','jumlah','is_natural_no_zero|required');
            if($this->form_validation->run()==false){
                $this->load->view('template/pelayan/header',$data);
                $this->load->view('pelayan/edit');
                $this->load->view('template/pelayan/footer');
            }else{
                $this->Pesan->tambah_pesanan3($query['no_invoice']);
            }
        }else{
            $this->session->set_flashdata('pesan','<div class="alert alert-danger col-lg-12">Akses ditolak</div>');
            redirect('Pelayan/list');
        }
    }

    public function invoice($a){
        $data['judul'] = "Invoice";
        $data['lihat'] = $this->db->get_where('order',['no_invoice'=>$a]);
        $cek = $data['lihat']->row_array();
        $status = $cek['status'];
        if($status == "Dipesan"){
            $this->load->view('template/pelayan/header',$data);
            $this->load->view('pelayan/invoice',$data);
            $this->load->view('template/pelayan/footer');
        }else{
            $this->session->set_flashdata('pesan','<div class="alert alert-danger col-lg-12">Akses ditolak</div>');
            redirect('Pelayan/list');
        }
            
    }

    public function hapuspesanan($a){
        $cek = $this->db->get_where('order_detail',['no_order'=>$a])->row_array();
        if($this->session->userdata('no_invoice') != $cek['no_invoice']){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger">Akses ditolak</div>');
        }else{
            $this->db->delete('order_detail',['no_order'=>$a]);
            $this->session->set_flashdata('pesan','<div class="alert alert-success">Berhasil dihapus</div>');
        }
        redirect('Pelayan/tambah');
    }

    public function hapuspesanan2($a,$b){
        $this->db->delete('order_detail',['no_order'=>$a]);
        $this->session->set_flashdata('pesan','<div class="alert alert-success">Berhasil dihapus</div>');
        redirect('Pelayan/edit/'.$b);
    }

    public function hapus($a){
        $cek = $this->db->get_where('order',['no_invoice'=>$a])->row_array();
        if($cek['status'] == "Dipesan"){
            $this->db->delete('order',['no_invoice'=>$a]);
            $this->db->delete('order_detail',['no_invoice'=>$a]);
            $this->session->set_flashdata('pesan','<div class="alert alert-success col-lg-12">Berhasil dihapus</div>');
            redirect('Pelayan/list');
        }
    }

    public function konfirmasi($a){
        $cek = $this->db->get_where('order',['no_invoice'=>$a])->row_array();
        if($cek['status'] == "Dipesan"){
            $data=[
                'status'=>"Dikonfirmasi",
                'dikelola'=>$this->session->userdata('username')
            ];
            $this->db->where('no_invoice',$cek['no_invoice']);
            $this->db->update('order',$data);
            $this->session->set_flashdata('pesan','<div class="alert alert-success col-lg-12">Berhasil dikonfirmasi</div>');
            redirect('Pelayan/list');
        }
    }

    public function ambildata(){
        $list = $this->db->get_where('order',['status'=>'Dipesan'])->result();
        echo json_encode($list);
    }

    
    public function ambildatamenu($a){
        $ambil = $this->db->get_where('menu',['id_menu'=>$a])->row_array();
        echo $ambil['id_menu']."|".$ambil['nama_menu']."|".$ambil['harga'];
    }


    public function selesaiedit($a){
        $this->db->select_sum('subtotal');
        $total = $this->db->get_where('order_detail',['no_invoice'=>$a])->row_array();
        $this->session->set_flashdata('pesan','<div class="alert alert-success">Pesanan anda sudah ada didalam antrian</div>');
        $data = [
            'total'=>$total['subtotal'],
            'dikelola'=>$this->session->userdata('username')
        ];
        $this->db->where('no_invoice',$a);
        $this->db->update('order',$data);
        redirect('Pelayan');
    }
    
    public function selesai(){
        $this->db->select_sum('subtotal');
        $total = $this->db->get_where('order_detail',['no_invoice'=>$this->session->userdata('no_invoice')])->row_array();
        if($total['subtotal'] != NULL){
            $data = [
                'no_invoice'=>$this->session->userdata('no_invoice'),
                'nama_pemesan'=>$this->session->userdata('nama_pemesan'),
                'meja'=>$this->session->userdata('meja'),
                'tanggal_pemesanan'=>$this->session->userdata('tanggal'),
                'total'=>$total['subtotal'],
                'status'=>"Dipesan",
                'dikelola'=>$this->session->userdata('username')
            ];
            $this->db->insert('order',$data);
    
            $this->session->unset_userdata('no_invoice');
            $this->session->unset_userdata('nama_pemesan');
            $this->session->unset_userdata('tanggal');
            $this->session->unset_userdata('meja');
            
            $this->session->set_flashdata('pesan','<div class="alert alert-success">Pesanan anda sudah ada didalam antrian</div>');
        }else{
            $this->session->unset_userdata('no_invoice');
            $this->session->unset_userdata('nama_pemesan');
            $this->session->unset_userdata('tanggal');
            $this->session->unset_userdata('meja');
            $this->session->set_flashdata('pesan','<div class="alert alert-success">No invoice direset</div>');
        }
        redirect('Pelayan');
    }

    public function keluar(){
        $this->Akun->keluar();
    }

}