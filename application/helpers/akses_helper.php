<?php


// Fungsi untuk mengecek,apakah sudah login atau belum,jika belum maka dialihkan ke halaman login
function apakah_sudah_masuk()
{
    // Merupakan instansiasi dari framework codeigniter ini,sebagai pengganti keyword this
    $ci = get_instance();
    if(!$ci->session->userdata('login') AND !$ci->session->userdata('id_akses')){
        $ci->session->set_flashdata('pesan','<div class="alert alert-danger">Login Dahulu !</div>');
        redirect();
    }
}

// Fungsi untuk mengunci form login jika sudah login
function kunci_login()
{
    $ci = get_instance();
    if($ci->session->userdata('login') AND $ci->session->userdata('id_akses')){
        $idakses = $ci->session->userdata('id_akses');
        $namaakses = $ci->db->get_where('akses',['id_akses'=>$idakses])->row_array();
        redirect($namaakses['nama_akses']);
    }
}

function admin_only(){
    $ci = get_instance();
    if($ci->session->userdata('id_akses') != 1){
        $ci->session->set_flashdata('pesan','<div class="alert alert-danger">Akses Ditolak !</div>');
        redirect();
    }
}

function pemilik_only(){
    $ci = get_instance();
    if($ci->session->userdata('id_akses') != 2){
        $ci->session->set_flashdata('pesan','<div class="alert alert-danger">Akses Ditolak !</div>');
        redirect();
    }
}

function kasir_only(){
    $ci = get_instance();
    if($ci->session->userdata('id_akses') != 3){
        $ci->session->set_flashdata('pesan','<div class="alert alert-danger">Akses Ditolak !</div>');
        redirect();
    }
}

function pelayan_only(){
    $ci = get_instance();
    if($ci->session->userdata('id_akses') != 4){
        $ci->session->set_flashdata('pesan','<div class="alert alert-danger">Akses Ditolak !</div>');
        redirect();
    }
}

function pelanggan_only(){
    $ci = get_instance();
    if($ci->session->userdata('id_akses') != 5){
        $ci->session->set_flashdata('pesan','<div class="alert alert-danger">Akses Ditolak !</div>');
        redirect();
    }
}