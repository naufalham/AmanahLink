<?php 
class Mpelaporan extends CI_Model {
	// function tampil(){

	// 	//melakukan query
	// 	$q = $this->db->get("detail_transaksi");

	// 	//pecah ke array
	// 	$d = $q->result_array();

	// 	return $d;
	// }

	

	// function detail($id_member){

	// 	//melakukan query
	// 	$this->db->where('id_member', $id_member);
	// 	$q = $this->db->get('member');

	// 	//pecah ke array
	// 	$d = $q->row_array();

	// 	return $d;
	// }

	function jumlah_penjualan(){

		//melakukan query
		$q = $this->db->query("SELECT p.id_produk, p.nama_produk, SUM(dt.jumlah) AS total_terjual FROM detail_transaksi dt JOIN produk p ON dt.id_produk = p.id_produk GROUP BY p.id_produk, p.nama_produk ORDER BY total_terjual DESC");

		//pecah ke array
		$d = $q->result_array();

		return $d;
	}

	
	function pendapatan(){
	
		//melakukan query
		$q = $this->db->query("SELECT DATE_FORMAT(tgl_transaksi, '%M %Y') AS bulan, SUM(total_transaksi) AS total_pendapatan FROM transaksi GROUP BY DATE_FORMAT(tgl_transaksi, '%Y-%m') ORDER BY DATE_FORMAT(tgl_transaksi, '%Y-%m') ASC;");
	
		//pecah ke array
		$d = $q->result_array();
	
		return $d;
	}
}
