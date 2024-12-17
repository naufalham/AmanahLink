<?php
class Mtransaksi extends CI_Model {

    // Ambil transaksi berdasarkan pelanggan
    function transaksi_pelanggan_beli($id_pelanggan) {
        $this->db->where('id_pelanggan', $id_pelanggan);
        $this->db->where('status_transaksi !=', null); // Filter status tidak null
        $this->db->order_by('tgl_transaksi', 'DESC');
        return $this->db->get("transaksi")->result_array();
    }
    

    // Ambil detail transaksi lengkap berdasarkan ID transaksi
    function detail($id_transaksi) {
        $query = "SELECT 
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
                WHERE
                    t.id_transaksi = ?
                ORDER BY 
                    p.nama_produk";
        
        return $this->db->query($query, [$id_transaksi])->row_array();
    }

    // Ambil daftar produk yang dibeli dalam transaksi tertentu
    function produk_beli($id_transaksi) {
        $query = "SELECT 
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
                WHERE
                    t.id_transaksi = ?
                ORDER BY 
                    p.nama_produk";

        return $this->db->query($query, [$id_transaksi])->result_array();
    }

    // Simpan produk ke dalam keranjang
    function simpan($id_produk, $jumlah) {
        if (!is_numeric($jumlah) || $jumlah <= 0) {
            throw new Exception("Jumlah produk harus lebih dari 0.");
        }
    
        $id_pelanggan = $this->session->userdata("id_pelanggan");
        $id_transaksi = $this->get_or_create_transaksi($id_pelanggan);
    
        $produk = $this->db->get_where('produk', ['id_produk' => $id_produk])->row_array();
        if (!$produk) {
            throw new Exception("Produk tidak ditemukan.");
        }
    
        $subtotal_harga = $produk['harga_produk'] * $jumlah;
    
        // Cek apakah produk sudah ada di detail_transaksi
        $this->db->where(['id_transaksi' => $id_transaksi, 'id_produk' => $id_produk]);
        $detail = $this->db->get('detail_transaksi')->row_array();
    
        if ($detail) {
            // Hitung selisih harga sebelumnya
            $selisih_harga = $subtotal_harga - $detail['subtotal_harga'];
    
            // Update detail_transaksi dengan jumlah dan subtotal harga baru
            $this->db->where(['id_transaksi' => $id_transaksi, 'id_produk' => $id_produk]);
            $this->db->update('detail_transaksi', [
                'jumlah' => $jumlah,
                'subtotal_harga' => $subtotal_harga,
            ]);
    
            // Perbarui total_transaksi sesuai selisih harga
            $this->db->set('total_transaksi', 'total_transaksi + ' . $selisih_harga, FALSE);
        } else {
            // Jika produk belum ada di keranjang, tambahkan sebagai item baru
            $this->db->insert('detail_transaksi', [
                'id_transaksi' => $id_transaksi,
                'id_produk' => $id_produk,
                'jumlah' => $jumlah,
                'subtotal_harga' => $subtotal_harga,
            ]);
    
            // Tambahkan subtotal_harga ke total_transaksi
            $this->db->set('total_transaksi', 'total_transaksi + ' . $subtotal_harga, FALSE);
        }
    
        // Update transaksi
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->update('transaksi');
    }
    

    // Ambil data transaksi berdasarkan ID
    function get_transaksi($id_transaksi) {
        return $this->db->get_where('transaksi', ['id_transaksi' => $id_transaksi])->row_array();
    }

    // Ambil detail transaksi berdasarkan ID transaksi
    function get_detail_transaksi($id_transaksi) {
        return $this->db->get_where('detail_transaksi', ['id_transaksi' => $id_transaksi])->result_array();
    }

    // Proses checkout
    function checkout() {
        // Ambil ID transaksi dari sesi
        $id_transaksi = $this->session->userdata('id_transaksi');
        if (!$id_transaksi) {
            show_error('Tidak ada transaksi yang ditemukan untuk checkout.', 400);
        }
    
        // Ambil total transaksi dari database
        $transaksi = $this->get_transaksi($id_transaksi);
        $total_transaksi = $transaksi['total_transaksi'];
    
        // Cek apakah pelanggan adalah member
        $id_pelanggan = $this->session->userdata("id_pelanggan");
        $status_pelanggan = $this->status_pelanggan($id_pelanggan);
    
        // Terapkan diskon hanya jika pelanggan adalah member
        if ($status_pelanggan == 'Member') {
            $total_transaksi *= 0.9; // Diskon 10%
        }
    
        // Update total transaksi dan status transaksi
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->update('transaksi', [
            'total_transaksi' => $total_transaksi,
            'status_transaksi' => 'diproses'
        ]);
    
        // Hapus ID transaksi dari sesi
        $this->session->unset_userdata('id_transaksi');
    
        redirect(base_url('transaksi/konfirmasi/' . $id_transaksi));
    }
    
    

    // Ambil atau buat transaksi dengan status null
    function get_or_create_transaksi($id_pelanggan) {
        // Cari transaksi dengan status null
        $this->db->where('id_pelanggan', $id_pelanggan);
        $this->db->where('status_transaksi', null);
        $transaksi = $this->db->get('transaksi')->row_array();
    
        if ($transaksi) {
            return $transaksi['id_transaksi']; // Kembalikan transaksi yang ada
        }
    
        // Buat transaksi baru jika tidak ada
        $data_transaksi = [
            'id_pelanggan' => $id_pelanggan,
            'tgl_transaksi' => date('Y-m-d H:i:s'),
            'total_transaksi' => 0,
            'status_transaksi' => null,
        ];
        $this->db->insert('transaksi', $data_transaksi);
        $id_transaksi = $this->db->insert_id();
    
        // Simpan ID transaksi ke sesi
        $this->session->set_userdata('id_transaksi', $id_transaksi);
    
        return $id_transaksi;
    }
    

    // Ambil keranjang berdasarkan transaksi
    function get_keranjang($id_transaksi) {
        $this->db->select('p.id_produk, p.nama_produk, p.harga_produk, p.foto_produk, dt.jumlah, dt.subtotal_harga');
        $this->db->from('detail_transaksi dt');
        $this->db->join('produk p', 'dt.id_produk = p.id_produk');
        $this->db->where('dt.id_transaksi', $id_transaksi);
        $this->db->order_by('p.nama_produk', 'ASC');
    
        return $this->db->get()->result_array();
    }
    

    // Hapus produk dari keranjang
    function hapus_produk($id_transaksi, $id_produk) {
        // Ambil subtotal harga produk yang akan dihapus
        $this->db->select('subtotal_harga');
        $this->db->where(['id_transaksi' => $id_transaksi, 'id_produk' => $id_produk]);
        $detail = $this->db->get('detail_transaksi')->row_array();
        
        if ($detail) {
            $subtotal_harga = $detail['subtotal_harga'];
            
            // Hapus produk dari detail_transaksi
            $this->db->where(['id_transaksi' => $id_transaksi, 'id_produk' => $id_produk]);
            $this->db->delete('detail_transaksi');
            
            // Kurangi subtotal harga dari total_transaksi
            $this->db->set('total_transaksi', 'total_transaksi - ' . $subtotal_harga, FALSE);
            $this->db->where('id_transaksi', $id_transaksi);
            $this->db->update('transaksi');
        }
    }
    
    public function status_pelanggan($id_pelanggan) {
        $this->db->select('status_pelanggan');
        $this->db->from('pelanggan');
        $this->db->where('id_pelanggan', $id_pelanggan);
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->status_pelanggan;
        }
        return false;
    }
    
    
    

}
?>
