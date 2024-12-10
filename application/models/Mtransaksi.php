<?php
class Mtransaksi extends CI_Model {


    function transaksi_pelanggan_beli($id_pelanggan) {
        $this->db->where('id_pelanggan', $id_pelanggan);
        $q = $this->db->get("transaksi");
        $d = $q->result_array();
        return $d;
    }

    function detail($id_transaksi) {
    	$this->db->where('id_transaksi', $id_transaksi);
    	$q = $this->db->query("SELECT 
                                    p.nama_produk,
                                    p.foto_produk,
                                    p.harga_produk,
                                    dt.jumlah AS jumlah_produk,
                                    dt.subtotal_harga,
                                    t.total_transaksi AS total_harga,
                                    t.id_transaksi,
                                    t.tgl_transaksi,
                                    t.status_transaksi,
                                    pel.nama_pelanggan,
                                    pel.wa_pelanggan,
                                    pel.alamat
                                FROM 
                                    detail_transaksi dt
                                INNER JOIN 
                                    produk p ON dt.id_produk = p.id_produk
                                INNER JOIN 
                                    transaksi t ON dt.id_transaksi = t.id_transaksi
                                INNER JOIN 
                                    pelanggan pel ON t.id_pelanggan = pel.id_pelanggan
                                ORDER BY 
                                    t.id_transaksi, p.nama_produk;");
    	$d = $q->row_array();

    	return $d;
    }
    
    function produk_beli($id_transaksi) {
    	$this->db->where('id_transaksi', $id_transaksi);
    	$q = $this->db->query("SELECT 
                                    p.nama_produk,
                                    p.harga_produk,
                                    dt.jumlah AS jumlah_produk,
                                    dt.subtotal_harga,
                                    t.total_transaksi AS total_harga,
                                    p.foto_produk
                                FROM 
                                    detail_transaksi dt
                                INNER JOIN 
                                    produk p ON dt.id_produk = p.id_produk
                                INNER JOIN 
                                    transaksi t ON dt.id_transaksi = t.id_transaksi
                                ORDER BY 
                                    t.id_transaksi, p.nama_produk;
                                ");
    	$d = $q->result_array();

    	return $d;
    }


    // Fungsi untuk membuat transaksi baru
    function buat_transaksi_baru() {
        // Ambil id pelanggan dari session

        // Data transaksi yang akan dimasukkan
        $q = $this->db->query(
            // INSERT INTO transaksi (id_pelanggan, tgl_transaksi, total_transaksi, status_transaksi)
            // VALUES ($this->session->userdata("id_pelanggan");, NOW(), 0, 'diproses');
        );

        


        // Masukkan data transaksi ke tabel 'transaksi'
        $d = $this->db->insert('transaksi', $q);

        // Mengembalikan ID transaksi yang baru dibuat
        return $d;
    }

    // Fungsi simpan (seperti yang Anda sudah buat)
    function simpan($id_produk, $jumlah) {
        // Validasi id_produk dan jumlah
        if (!is_numeric($id_produk) || $id_produk <= 0) {
            throw new Exception("ID Produk tidak valid.");
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
