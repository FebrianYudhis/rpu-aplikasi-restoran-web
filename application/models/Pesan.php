<?php

class Pesan extends CI_MODEL
{
    function tambah_pesanan(){
        $id_menu = $this->input->post('id_menu');
        $no_invoice = $this->session->userdata('no_invoice');
        $jumlah = $this->input->post('jumlah');

        $cekharga = $this->db->get_where('menu',['id_menu'=>$id_menu])->row_array();
        $subtotal = $cekharga['harga'] * $jumlah;
        
        $data = [
            'no_invoice'=>$no_invoice,
            'id_menu'=>$id_menu,
            'jumlah'=>$jumlah,
            'subtotal'=>$subtotal
        ];
        $this->db->insert('order_detail',$data);
        $this->session->set_flashdata('pesan','<div class="alert alert-success">Berhasil ditambah</div>');
        redirect('Pelanggan#pemesanan');
    }

    function tambah_pesanan2(){
        $id_menu = $this->input->post('id_menu');
        $no_invoice = $this->session->userdata('no_invoice');
        $jumlah = $this->input->post('jumlah');

        $cekharga = $this->db->get_where('menu',['id_menu'=>$id_menu])->row_array();
        $subtotal = $cekharga['harga'] * $jumlah;
        
        $data = [
            'no_invoice'=>$no_invoice,
            'id_menu'=>$id_menu,
            'jumlah'=>$jumlah,
            'subtotal'=>$subtotal
        ];
        $this->db->insert('order_detail',$data);
        $this->session->set_flashdata('pesan','<div class="alert alert-success">Berhasil ditambah</div>');
        redirect('Pelayan/tambah');
    }
    
    function tambah_pesanan3($a){
        $id_menu = $this->input->post('id_menu');
        $no_invoice = $this->session->userdata('no_invoice');
        $jumlah = $this->input->post('jumlah');

        $cekharga = $this->db->get_where('menu',['id_menu'=>$id_menu])->row_array();
        $subtotal = $cekharga['harga'] * $jumlah;
        
        $data = [
            'no_invoice'=>$a,
            'id_menu'=>$id_menu,
            'jumlah'=>$jumlah,
            'subtotal'=>$subtotal
        ];
        $this->db->insert('order_detail',$data);
        $this->session->set_flashdata('pesan','<div class="alert alert-success">Berhasil ditambah</div>');
        redirect('Pelayan/edit/'.$a);
    }
}
