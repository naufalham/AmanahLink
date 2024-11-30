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
    function hapus($id_pelanggan) {
        //delete from pelanggan where id_pelanggan=5
        $this->db->where('id_pelanggan', $id_pelanggan);
        $this->db->delete('pelanggan');
    }
    /* function jumlah_member_distrik() {
        $q = $this->db->query("SELECT COUNT(*) as jumlah, nama_distrik_member FROM `member` GROUP BY nama_distrik_member");
        $d = $q->result_array();

        return $d;
    } */
}
