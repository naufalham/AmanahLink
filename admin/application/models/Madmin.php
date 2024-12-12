<?php 
class Madmin extends CI_Model {
    function login($inputan){
        $username = $inputan['username'];
        $password = $inputan['password'];
        $password = sha1($password);

        //cek database
        $this->db->where('username_admin', $username);
		$this->db->where('password_admin', $password);
        $q = $this->db->get('admin');
        $cekadmin = $q->row_array();

        //jika tidak kosong maka ada
        if (!empty($cekadmin)) {
            //membuat tiket login yang dipakae selama login
            $this->session->set_userdata("id_admin", $cekadmin["id_admin"]);
            $this->session->set_userdata("username_admin", $cekadmin["username_admin"]);
            return "ada";
        }else {
            return "tidak ada";
        }
    } 
}