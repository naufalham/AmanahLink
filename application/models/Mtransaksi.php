<?php
class Mtransaksi extends CI_Model {

    function simpan($id_produk, $jumlah, $id_transaksi = null) {
        if (!is_numeric($id_produk) || $id_produk <= 0 || $jumlah <= 0) {
            throw new Exception("ID Produk atau jumlah tidak valid.");
        }
    
        // Ambil data produk
        $produk = $this->db->get_where('produk', ['id_produk' => $id_produk])->row_array();
        if (!$produk) {
            throw new Exception("Produk tidak ditemukan.");
        }
    
        // Jika id_transaksi tidak diberikan, buat transaksi baru
        if ($id_transaksi === null) {
            $data_transaksi = [
                'id_pelanggan' => $this->session->userdata("id_pelanggan"),
                'tgl_transaksi' => date('Y-m-d H:i:s'),
                'total_transaksi' => 0,
                'status_transaksi' => 'diproses'
            ];
            $this->db->insert('transaksi', $data_transaksi);
            $id_transaksi = $this->db->insert_id();
        }
    
        // Hitung subtotal
        $subtotal_harga = $produk['harga_produk'] * $jumlah;
    
        // Masukkan ke detail transaksi
        $this->db->insert('detail_transaksi', [
            'id_transaksi' => $id_transaksi,
            'id_produk' => $id_produk,
            'jumlah' => $jumlah,
            'subtotal_harga' => $subtotal_harga,
        ]);
    
        // Update total transaksi
        $this->db->set('total_transaksi', 'total_transaksi + ' . $subtotal_harga, FALSE);
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->update('transaksi');
    }
    

    
    // Ambil data transaksi berdasarkan ID
    public function get_transaksi($id_transaksi) {
        return $this->db->get_where('transaksi', ['id_transaksi' => $id_transaksi])->row_array();
    }

    // Ambil detail transaksi berdasarkan ID transaksi
    public function get_detail_transaksi($id_transaksi) {
        return $this->db->get_where('detail_transaksi', ['id_transaksi' => $id_transaksi])->result_array();
    }

    // Proses checkout
    public function checkout($id_pelanggan, $keranjang) {
        // Buat transaksi baru
        $data_transaksi = [
            'id_pelanggan' => $id_pelanggan,
            'tgl_transaksi' => date('Y-m-d H:i:s'),
            'total_transaksi' => 0, // Total akan dihitung nanti
            'status_transaksi' => 'diproses'
        ];
        $this->db->insert('transaksi', $data_transaksi);
        $id_transaksi = $this->db->insert_id();

        $total_transaksi = 0;

        // Simpan detail transaksi
        foreach ($keranjang as $item) {
            $this->db->where('id_produk', $item['id_produk']);
            $produk = $this->db->get('produk')->row_array();

            if ($produk) {
                $subtotal = $produk['harga_produk'] * $item['jumlah'];
                $total_transaksi += $subtotal;

                $this->db->insert('detail_transaksi', [
                    'id_transaksi' => $id_transaksi,
                    'id_produk' => $item['id_produk'],
                    'jumlah' => $item['jumlah'],
                    'subtotal_harga' => $subtotal
                ]);
            }
        }

        // Update total transaksi
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->update('transaksi', ['total_transaksi' => $total_transaksi]);

        return $id_transaksi;
    }

    function get_or_create_transaksi($id_pelanggan) {
        // Cek apakah transaksi sudah ada di database
        $this->db->where('id_pelanggan', $id_pelanggan);
        $this->db->where('status_transaksi', 'draft');
        $transaksi = $this->db->get('transaksi')->row_array();
    
        if ($transaksi) {
            return $transaksi['id_transaksi'];
        }
    
        // Jika belum ada transaksi, buat transaksi baru
        $data_transaksi = [
            'id_pelanggan' => $id_pelanggan,
            'tgl_transaksi' => date('Y-m-d H:i:s'),
            'total_transaksi' => 0,
            'status_transaksi' => 'draft', // Status awal: draft
        ];
        $this->db->insert('transaksi', $data_transaksi);
        return $this->db->insert_id();
    }
    
}
?>
