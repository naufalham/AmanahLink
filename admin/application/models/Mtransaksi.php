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

    //tampil dropdown status pesanan
    function status_pesanan($id_transaksi){
        // Ambil metadata ENUM dari database
        $query = $this->db->query("
            SELECT COLUMN_TYPE 
            FROM INFORMATION_SCHEMA.COLUMNS 
            WHERE TABLE_NAME = 'transaksi' 
              AND COLUMN_NAME = 'status_transaksi'
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
    function update_status($id_transaksi, $status_transaksi){
        // Pastikan id_transaksi dan status_transaksi ada
        if ($id_transaksi && $status_transaksi) {
            // Update status transaksi di database
            $this->db->where('id_transaksi', $id_transaksi);
            $this->db->update('transaksi', ['status_transaksi' => $status_transaksi]);

            // Cek apakah ada perubahan yang terjadi
            return $this->db->affected_rows() > 0;
        }
        return false;
    
    }

    
}
?>