<?php

class Akun extends CI_MODEL
{
    // Model untung mengecek proses login
    public function ceklogin(){
        // Mengambil data form sebelumnya
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $cek = [
            'username'=> $username,
            'password' => $password
        ];
        // Mengecek,apakah ada didatabase data form yang dimasukkan sebelumya
        $cek_array = $this->db->get_where('akun',$cek)->row_array();
        if($cek_array){

            // Jika ada,maka isi session nya dan alihkan ke halaman sesuai hak aksesnya
            $data = [
                'id_akses' => $cek_array['id_akses'],
                'username' => $cek_array['username'],
                'nama' => $cek_array['nama_lengkap'],
                'login' => 'Ya'
            ];
            $this->session->set_userdata($data);
            $namaakses = $this->db->get_where('akses',['id_akses'=>$cek_array['id_akses']])->row_array();
            redirect($namaakses['nama_akses']);
        }else{

            // Jika data form tidak cocok,maka minta isi data form sebelumnya lagi
            $this->session->set_flashdata('pesan','<div class="alert alert-danger">Username atau password salah</div>');
            redirect();
        }
    }
}