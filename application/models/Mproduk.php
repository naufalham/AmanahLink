<?php 
class Mproduk extends CI_Model {
	function tampil(){

		//melakukan query
		$q = $this->db->get("produk");

		//pecah ke array
		$d = $q->result_array();

		return $d;
	}

	function tampil_produk_terbaru(){
		$this->db->order_by('id_produk', 'desc');
		$q = $this->db->get("produk",4,0);
		$d = $q->result_array();

		return $d;
	}

	

	function detail($id_produk){
		//detail data produk sesuai id_produk dan id_admin yang login
		// $this->db->where('id_admin', $this->session->userdata("id_admin"));
		$this->db->where('id_produk', $id_produk);
		// $this->db->join("kategori", 'produk.id_kategori = kategori.id_kategori', 'left');
		$q = $this->db->get("produk");
		$d = $q->row_array();

		return $d;
	}


	function detail_umum($id_produk){
		$this->db->where('id_produk', $id_produk);
		$this->db->join("kategori", 'produk.id_kategori = kategori.id_kategori', 'left');
		$q = $this->db->get("produk");
		$d = $q->row_array();

		return $d;
	}
}
