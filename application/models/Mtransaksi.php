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
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = transaksi.id_transaksi','left');
        $this->db->group_by('transaksi.id_transaksi');
        $q = $this->db->get('transaksi');
        $d = $q->row_array();

        return $d;
    }

    function transaksi_detail($id_transaksi){
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->join('produk', 'produk.id_produk = detail_transaksi.id_produk','left');
        $q = $this->db->get('detail_transaksi');
        $d = $q->result_array();
    
        return $d;

        

    }
}
?>