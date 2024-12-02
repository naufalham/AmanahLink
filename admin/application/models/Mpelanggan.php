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

    //tampil dropdown status pesanan
    function status_member($id_pelanggan){
        // Ambil metadata ENUM dari database
        $query = $this->db->query("
            SELECT COLUMN_TYPE 
            FROM INFORMATION_SCHEMA.COLUMNS 
            WHERE TABLE_NAME = 'pelanggan' 
              AND COLUMN_NAME = 'status_pelanggan'
        ");
        
        // Ambil hasil query
        $result = $query->row_array();
        
        // Ekstrak nilai ENUM dari hasil query
        if (isset($result['COLUMN_TYPE'])) {
            // Hapus 'enum(' dan ')'
            $status = str_replace(["enum('", "')"], '', $result['COLUMN_TYPE']);
            
            // Pisahkan berdasarkan koma dan tanda kutip
            return explode("','", $status);
        } else {
            return []; // Kembalikan array kosong jika tidak ditemukan
        }
    }

    //fungsi update status pesanan
    function update_member($id_pelanggan, $status_pelanggan){
        // Pastikan id_transaksi dan status_transaksi ada
        if ($id_pelanggan && $status_pelanggan) {
            // Update status transaksi di database
            $this->db->where('id_pelanggan', $id_pelanggan);
            $this->db->update('pelanggan', ['status_pelanggan' => $status_pelanggan]);

            // Cek apakah ada perubahan yang terjadi
            return $this->db->affected_rows() > 0;
        }
        return false;
    
    }
}
