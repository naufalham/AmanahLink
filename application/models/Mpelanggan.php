<?php

class Mpelanggan extends CI_Model{

    function tampil(){
    //melakukan query
    $q = $this->db->get("pelanggan");

    //pecah ke array
    $d = $q->result_array();

    return $d;
    }

    function detail($id_pelanggan) {
    	$this->db->where('id_pelanggan', $id_pelanggan);
    	$q = $this->db->get('pelanggan');
    	$d = $q->row_array();

    	return $d;
    }

    function login($inputan) {
        $email_pelanggan = $inputan['username_pelanggan'];
        $password_pelanggan = $inputan['password_pelanggan'];
        $password_pelanggan = sha1($password_pelanggan);

        //cek ke database
        $this->db->where('username_pelanggan', $username_pelanggan);
        $this->db->where('password_pelanggan', $password_pelanggan);
        $q = $this->db->get('pelanggan');
        $cekpelanggan = $q->row_array();

        //jika tidak kosong, maka ada
        if (!empty($cekpelanggan)) {
            //membuat tiket biskop yang dipakai selama keliling apliaksi
            $this->session->set_userdata("id_pelanggan", $cekpelanggan["id_pelanggan"]);
            $this->session->set_userdata("username_pelanggan", $cekpelanggan["username_pelanggan"]);
            $this->session->set_userdata("nama_pelanggan", $cekpelanggan["nama_pelanggan"]);
            $this->session->set_userdata("alamat", $cekpelanggan["alamat"]);
            $this->session->set_userdata("wa_pelanggan", $cekpelanggan["wa_pelanggan"]);
            return "ada";
        } else {
            return "gak ada";
        }
    }

    function ubah($inputan, $id_pelanggan) {

        //jk tidak kosong password, maka enkripsi
        if (!empty($inputan["password_pelanggan"])) {
            $inputan['password_pelanggan'] = sha1($inputan['password_pelanggan']);
        } else {
            unset($inputan['password_pelanggan']);
        }
        
        $this->db->where('id_pelanggan', $id_pelanggan);
        $this->db->update('pelanggan', $inputan);

        //karena akun member telah diubah pada database, maka tiket bioskopnya jg harus membuat baru

        //dapatkan dulu data member yang abru yang telah diupdate 
        $this->db->where('id_pelanggan', $id_pelanggan);
        $q = $this->db->get('pelanggan');
        $cekpelanggan = $q->row_array();

        //buat tiket lagi
       //membuat tiket biskop yang dipakai selama keliling apliaksi
       $this->session->set_userdata("id_pelanggan", $cekpelanggan["id_pelanggan"]);
       $this->session->set_userdata("username_pelanggan", $cekpelanggan["username_pelanggan"]);
       $this->session->set_userdata("nama_pelanggan", $cekpelanggan["nama_pelanggan"]);
       $this->session->set_userdata("alamat", $cekpelanggan["alamat"]);
       $this->session->set_userdata("wa_pelanggan", $cekpelanggan["wa_pelanggan"]);
    }
    function register($m) {
        $this->db->insert('pelanggan', $m);
        
    } 

}
