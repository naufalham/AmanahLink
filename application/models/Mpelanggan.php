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

    function login($inputan){
        $username = $inputan['username_pelanggan'];
        $password = $inputan['password_pelanggan'];
        $password = sha1($password);

        //cek database
        $this->db->where('username_pelanggan', $username);
		$this->db->where('password_pelanggan', $password);
        $q = $this->db->get('pelanggan');
        $cekpelanggan = $q->row_array();

        //jika tidak kosong maka ada
        if (!empty($cekpelanggan)) {
            //membuat tiket login yang dipakae selama login
            $this->session->set_userdata("id_pelanggan", $cekpelanggan["id_pelanggan"]);
            $this->session->set_userdata("username_pelanggan", $cekpelanggan["username_pelanggan"]);
            $this->session->set_userdata("password_pelanggan", $cekpelanggan["password_pelanggan"]);
            $this->session->set_userdata("nama_pelanggan", $cekpelanggan["nama_pelanggan"]);
            $this->session->set_userdata("status_pelanggan", $cekpelanggan["status_pelanggan"]);
            $this->session->set_userdata("tgl_daftar", $cekpelanggan["tgl_daftar"]);
            $this->session->set_userdata("alamat", $cekpelanggan["alamat"]);
            $this->session->set_userdata("wa_pelanggan", $cekpelanggan["wa_pelanggan"]);
            return "ada";
        }else {
            return "tidak ada";
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

        //karena akun pelanggan telah diubah pada database, maka tiket bioskopnya jg harus membuat baru

        //dapatkan dulu data pelanggan yang abru yang telah diupdate 
        $this->db->where('id_pelanggan', $id_pelanggan);
        $q = $this->db->get('pelanggan');
        $cekpelanggan = $q->row_array();

        //buat tiket lagi
       //membuat tiket biskop yang dipakai selama keliling apliaksi
       $this->session->set_userdata("id_pelanggan", $cekpelanggan["id_pelanggan"]);
       $this->session->set_userdata("username_pelanggan", $cekpelanggan["username_pelanggan"]);
       $this->session->set_userdata("nama_pelanggan", $cekpelanggan["nama_pelanggan"]);
       $this->session->set_userdata("status_pelanggan", $cekpelanggan["status_pelanggan"]);
       $this->session->set_userdata("alamat", $cekpelanggan["alamat"]);
       $this->session->set_userdata("wa_pelanggan", $cekpelanggan["wa_pelanggan"]);
    }
    
    function register($m) {
        $this->db->insert('pelanggan', $m);
        
    } 

}
