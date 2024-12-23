<?php

class Mtransaksi extends CI_Model{

    function tampil() {
        // Filter status tidak null
        $this->db->where('status_transaksi !=', null);
    
        // Tambahkan urutan DESC berdasarkan kolom tertentu, misalnya id_transaksi
        $this->db->order_by('id_transaksi', 'DESC');
    
        // Eksekusi query
        $q = $this->db->get("transaksi");
    
        // Pecah ke array
        $d = $q->result_array();
    
        return $d;
    }
    
    
    //menampilkan transaksi berdasarkan id_pelanggan
    function transaksi_pelanggan_beli($id_pelanggan) {
        $this->db->where('id_pelanggan', $id_pelanggan);
        $this->db->where('status_transaksi !=', null); // Filter status tidak null
        $q = $this->db->get("transaksi");
        $d = $q->result_array();
        return $d;
    }
    
    function detail($id_transaksi){
        $q = $this->db->select('
            produk.id_produk,
            produk.nama_produk,
            produk.deskripsi_produk,
            produk.harga_produk,
            produk.foto_produk,
            detail_transaksi.jumlah,
            detail_transaksi.subtotal_harga,
            transaksi.id_transaksi,
            transaksi.tgl_transaksi,
            transaksi.total_transaksi,
            transaksi.status_transaksi,
            pelanggan.id_pelanggan,
            pelanggan.username_pelanggan,
            pelanggan.nama_pelanggan,
            pelanggan.status_pelanggan,
            pelanggan.alamat,
            pelanggan.wa_pelanggan
        ');
        
        $this->db->from('transaksi');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = transaksi.id_pelanggan', 'left');
        $this->db->join('detail_transaksi', 'detail_transaksi.id_transaksi = transaksi.id_transaksi', 'left');
        $this->db->join('produk', 'produk.id_produk = detail_transaksi.id_produk', 'left');
        $this->db->where('transaksi.id_transaksi', $id_transaksi);
        $this->db->group_by('transaksi.id_transaksi');

        $q = $this->db->get('');
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