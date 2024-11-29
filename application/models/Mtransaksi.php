<?php

class Mtransaksi extends CI_Model{

    function tampil(){
    //melakukan query
    $q = $this->db->get("transaksi");

    //pecah ke array
    $d = $q->result_array();

    return $d;
    }
}
?>