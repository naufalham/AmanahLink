<?php 
class Mpelaporan extends CI_Model {

	function jumlah_penjualan(){

		//melakukan query
		$q = $this->db->query("SELECT 
									p.id_produk, 
									p.nama_produk, 
									SUM(dt.jumlah) AS total_terjual
								FROM 
									detail_transaksi dt
								JOIN 
									produk p ON dt.id_produk = p.id_produk
								JOIN 
									transaksi t ON dt.id_transaksi = t.id_transaksi
								WHERE 
									t.status_transaksi = 'selesai'
								GROUP BY 
									p.id_produk, 
									p.nama_produk
								ORDER BY 
									total_terjual DESC;
								");

		//pecah ke array
		$d = $q->result_array();

		return $d;
	}

	function jumlah_penjualan_tahun(){

		//melakukan query
		$q = $this->db->query("SELECT 
									p.id_produk, 
									p.nama_produk, 
									SUM(dt.jumlah) AS total_terjual
								FROM 
									detail_transaksi dt
								JOIN 
									produk p ON dt.id_produk = p.id_produk
								JOIN 
									transaksi t ON dt.id_transaksi = t.id_transaksi
								WHERE 
									t.status_transaksi = 'selesai'
									AND t.tgl_transaksi >= DATE_SUB(CURDATE(), INTERVAL 12 MONTH)
								GROUP BY 
									p.id_produk, 
									p.nama_produk
								ORDER BY 
									total_terjual DESC;
								");

		//pecah ke array
		$d = $q->result_array();

		return $d;
	}

	function jumlah_penjualan_bulan(){

		//melakukan query
		$q = $this->db->query("SELECT 
									p.id_produk, 
									p.nama_produk, 
									SUM(dt.jumlah) AS total_terjual
								FROM 
									detail_transaksi dt
								JOIN 
									produk p ON dt.id_produk = p.id_produk
								JOIN 
									transaksi t ON dt.id_transaksi = t.id_transaksi
								WHERE 
									t.status_transaksi = 'selesai'
									AND t.tgl_transaksi >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH) -- Filter 1 bulan terakhir
								GROUP BY 
									p.id_produk, 
									p.nama_produk
								ORDER BY 
									total_terjual DESC;
								");

		//pecah ke array
		$d = $q->result_array();

		return $d;
	}

	
	function pendapatan(){
	
		//melakukan query
		$q = $this->db->query("SELECT DATE_FORMAT(tgl_transaksi, '%M %Y') AS bulan, 
								    SUM(total_transaksi) AS total_pendapatan 
								FROM 
								    transaksi 
								WHERE 
								    tgl_transaksi >= DATE_SUB(CURDATE(), INTERVAL 12 MONTH)  -- Ambil data 12 bulan terakhir
									AND status_transaksi = 'selesai'
								GROUP BY 
								    YEAR(tgl_transaksi), MONTH(tgl_transaksi)
								ORDER BY 
								    YEAR(tgl_transaksi) DESC, MONTH(tgl_transaksi) DESC
								LIMIT 12;");
	
		//pecah ke array
		$d = $q->result_array();
	
		return $d;
	}

	function pendapatan_bulan(){
	
		//melakukan query
		$q = $this->db->query("SELECT DATE_FORMAT(tgl_transaksi, '%M %Y') AS bulan, 
								    SUM(total_transaksi) AS total_pendapatan 
								FROM 
								    transaksi 
								WHERE 
								    tgl_transaksi >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH) -- Filter 1 bulan terakhir
									AND status_transaksi = 'selesai'
								GROUP BY 
								    YEAR(tgl_transaksi), MONTH(tgl_transaksi)
								ORDER BY 
								    YEAR(tgl_transaksi) DESC, MONTH(tgl_transaksi) DESC
								LIMIT 12;");
	
		//pecah ke array
		$d = $q->result_array();
	
		return $d;
	}
}
