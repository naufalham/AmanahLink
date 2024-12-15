<?php 
class Mproduk extends CI_Model {
	function tampil(){

		//melakukan query
		$q = $this->db->get("produk");

		//pecah ke array
		$d = $q->result_array();

		return $d;
	}

	function detail($id_produk) {
        $this->db->where('id_produk', $id_produk);
        $q = $this->db->get('produk');
        $d = $q->row_array();

        return $d;
    }

	function favorit() {
        $this->db->where('id_produk', $pfavorit);
        $q = $this->db->get('produk');
        $d = $q->row_array();

        return $d;
    }

	function produk_terfavorit() {
		$query = "SELECT 
		  p.id_produk,
		  p.nama_produk,
		  p.foto_produk,
		  SUM(dt.jumlah) AS jumlah_terjual
		FROM 
		  detail_transaksi dt
		  INNER JOIN produk p ON dt.id_produk = p.id_produk
		GROUP BY 
		  p.id_produk, p.nama_produk, p.foto_produk
		ORDER BY 
		  jumlah_terjual DESC
		LIMIT 3";
	  
		return $this->db->query($query)->result_array();
	  }

}
