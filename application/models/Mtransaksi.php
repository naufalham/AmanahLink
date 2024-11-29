<?php

class Mtransaksi extends CI_Model{

    function tampil(){
    //melakukan query
    $q = $this->db->get("transaksi");

    //pecah ke array
    $d = $q->result_array();

    return $d;
    }

    function detail($id_transaksi){
        $this->db->where('id_transaksi', $id_transaksi);
        $q = $this->db->get('transaksi');
        $d = $q->row_array();

        return $d;
    }

    function transaksi_detail($id_transaksi){
        $this->db->where('id_transaksi', $id_transaksi);
        $q = $this->db->get('detail_transaksi');
        $d = $q->result_array();
    
        return $d;
    }
}
?>