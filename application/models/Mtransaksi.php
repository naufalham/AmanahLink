<?php 
class Mtransaksi extends CI_Model {

    function simpan($inputan, $id_produk) {
        echo "<pre>";
        print_r($inputan, $id_produk);
        echo "</pre>";

        // $this->db->where('id_produk', $id_produk);
        // $qp = $this->db->get('produk');
        // $dp = $qp->row_array();

        // $inputan["id_produk"] = $id_produk;
        // $inputan["id_member_beli"] = $this->session->userdata("id_member");
        // $inputan["id_member_jual"] = $dp["id_member"];

        // //cek dulu apakah member ini ada produk di keranjang
        // $this->db->where('id_member_beli', $this->session->userdata("id_member"));
        // $this->db->where('id_produk', $id_produk);
        // $qk = $this->db->get('keranjang');
        // $dk = $qk->row_array();

        // if(empty($dk)){
        //     $this->db->insert('keranjang', $inputan);
        // } else {
        //     $this->db->where('id_member_beli', $this->session->userdata("id_member"));
        //     $this->db->where('id_produk', $id_produk);
        //     $this->db->update('keranjang', $inputan);
        // }
    }


}
