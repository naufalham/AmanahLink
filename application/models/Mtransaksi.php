<?php
class Mtransaksi extends CI_Model {

    // Fungsi untuk membuat transaksi baru
    function buat_transaksi_baru() {
        // Ambil id pelanggan dari session
        $id_pelanggan = $this->session->userdata("id_pelanggan");

        // Data transaksi yang akan dimasukkan
        $data_transaksi = [
            'id_pelanggan' => $id_pelanggan,
            'status_transaksi' => 'diproses',
            'total_transaksi' => 0,  // Mulai dengan total 0
            'tgl_transaksi' => date('Y-m-d H:i:s')
        ];

        // Masukkan data transaksi ke tabel 'transaksi'
        $this->db->insert('transaksi', $data_transaksi);

        // Mengembalikan ID transaksi yang baru dibuat
        return $this->db->insert_id();
    }

    // Fungsi simpan (seperti yang Anda sudah buat)
    function simpan($id_produk, $jumlah) {
        // Validasi id_produk dan jumlah
        if (!is_numeric($id_produk) || $id_produk <= 0) {
            throw new Exception("ID Produk tidak valid.");
        }
        if (!is_numeric($jumlah) || $jumlah <= 0) {
            throw new Exception("Jumlah produk harus lebih dari 0.");
        }

        // Validasi apakah produk ada di database
        $this->db->where('id_produk', $id_produk);
        $produk = $this->db->get('produk')->row_array();
        if (!$produk) {
            throw new Exception("Produk dengan ID $id_produk tidak ditemukan.");
        }

        // Cek apakah ada transaksi dengan status diproses
        $this->db->where('id_pelanggan', $this->session->userdata("id_pelanggan"));
        $this->db->where('status_transaksi', 'diproses');
        $transaksi = $this->db->get('transaksi')->row_array();

        // Jika tidak ada transaksi diproses, buat transaksi baru
        if (!$transaksi) {
            $id_transaksi = $this->buat_transaksi_baru();
        } else {
            $id_transaksi = $transaksi['id_transaksi'];
        }

        // Hitung subtotal harga untuk produk yang ditambahkan
        $subtotal_harga = $produk['harga_produk'] * $jumlah;

        // Cek apakah produk sudah ada dalam detail transaksi
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->where('id_produk', $id_produk);
        $detail = $this->db->get('detail_transaksi')->row_array();

        // Jika produk sudah ada, update jumlah dan subtotal
        if ($detail) {
            $new_jumlah = $detail['jumlah'] + $jumlah;
            $new_subtotal = $new_jumlah * $produk['harga_produk'];

            $this->db->where('id_transaksi', $id_transaksi);
            $this->db->where('id_produk', $id_produk);
            $this->db->update('detail_transaksi', [
                'jumlah' => $new_jumlah,
                'subtotal_harga' => $new_subtotal
            ]);
        } else {
            // Jika produk belum ada, tambahkan produk baru ke detail transaksi
            $this->db->insert('detail_transaksi', [
                'id_transaksi' => $id_transaksi,
                'id_produk' => $id_produk,
                'jumlah' => $jumlah,
                'subtotal_harga' => $subtotal_harga
            ]);
        }

        // Update total transaksi setelah penambahan produk
        $this->db->set('total_transaksi', 'total_transaksi + ' . $subtotal_harga, FALSE);
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->update('transaksi');
    }
}

?>
