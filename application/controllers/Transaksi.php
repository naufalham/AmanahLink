<?php
class Transaksi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Jika tidak ada sesi pelanggan, arahkan ke halaman utama
        if (!$this->session->userdata("id_pelanggan")) {
            $this->session->set_flashdata('pesan_gagal', 'Anda harus login');
            redirect('/', 'refresh');
        }
    }

    function index() {
        $id_pelanggan = $this->session->userdata("id_pelanggan");

        // Panggil model dan ambil transaksi pelanggan
        $this->load->model("Mtransaksi");
        $data["transaksi"] = $this->Mtransaksi->transaksi_pelanggan_beli($id_pelanggan);

        // Cek apakah pelanggan adalah member
        $data['status_pelanggan'] = $this->Mtransaksi->status_pelanggan($id_pelanggan); 

        $this->load->view('header');
        $this->load->view('transaksi_tampil', $data);
        $this->load->view('footer');
    }

    function detail($id_transaksi) {
        $this->load->model('Mtransaksi');

        $data["produk_beli"] = $this->Mtransaksi->produk_beli($id_transaksi);
        $data["transaksi"] = $this->Mtransaksi->detail($id_transaksi);

        // Ambil ID pelanggan dan periksa apakah dia member
        $id_pelanggan = $this->session->userdata('id_pelanggan');
        $data['status_pelanggan'] = $this->Mtransaksi->status_pelanggan($id_pelanggan);

        $this->load->view('header');
        $this->load->view('transaksi_detail', $data);
        $this->load->view('footer');
    }

    function keranjang() {
        $this->load->model('Mtransaksi');
    
        $id_pelanggan = $this->session->userdata('id_pelanggan');
        $id_transaksi = $this->session->userdata('id_transaksi');
    
        if (!$id_transaksi) {
            // Ambil atau buat transaksi jika sesi kosong
            $id_transaksi = $this->Mtransaksi->ambil_buat_transaksi($id_pelanggan);
            $this->session->set_userdata('id_transaksi', $id_transaksi);
        }
    
        // Ambil data keranjang
        $data['keranjang'] = $this->Mtransaksi->ambil_keranjang($id_transaksi);
        
        // Cek apakah pelanggan adalah member
        $data['status_pelanggan'] = $this->Mtransaksi->status_pelanggan($id_pelanggan);

        $this->load->view('header');
        $this->load->view('keranjang', $data);
        $this->load->view('footer');
    }

    function checkout() {
        $this->load->model('Mtransaksi');
    
        // Ambil ID transaksi dari sesi
        $id_transaksi = $this->session->userdata('id_transaksi');
        if (!$id_transaksi) {
            show_error('Tidak ada transaksi yang ditemukan untuk checkout.', 400);
        }
    
        // Ambil total transaksi dari database
        $transaksi = $this->Mtransaksi->ambil_transaksi($id_transaksi);
        $total_transaksi = $transaksi['total_transaksi'];
    
        // Cek apakah pelanggan adalah member
        $id_pelanggan = $this->session->userdata("id_pelanggan");
        $status_pelanggan = $this->Mtransaksi->status_pelanggan($id_pelanggan);
    
        // Terapkan diskon hanya jika pelanggan adalah member
        $total_final = $status_pelanggan == 'Member' ? $total_transaksi * 0.9 : $total_transaksi;
    
        // Update total transaksi dan status transaksi
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->update('transaksi', [
            'total_transaksi' => $total_final,  // Simpan nilai total_final yang sudah dihitung
            'status_transaksi' => 'diproses'   // Update status transaksi
        ]);
    
        // Hapus ID transaksi dari sesi
        $this->session->unset_userdata('id_transaksi');
    
        // Redirect ke halaman konfirmasi dengan ID transaksi
        redirect(base_url('transaksi/konfirmasi/' . $id_transaksi));
    }
    

    function konfirmasi($id_transaksi) {
        $this->load->model('Mtransaksi');

        $data['transaksi'] = $this->Mtransaksi->ambil_transaksi($id_transaksi);
        $data['detail_transaksi'] = $this->Mtransaksi->ambil_detail_transaksi($id_transaksi);

        // Ambil ID pelanggan dan periksa apakah dia member
        $id_pelanggan = $this->session->userdata('id_pelanggan');
        $data['status_pelanggan'] = $this->Mtransaksi->status_pelanggan($id_pelanggan);

        // Set pesan alert menggunakan session flashdata
        $this->session->set_flashdata('pesan_sukses', 'Checkout berhasil! Pesanan Anda sedang diproses.');

        // Redirect ke halaman utama atau halaman lain
        redirect(base_url("transaksi/detail/" . $id_transaksi));
    }

    // Hapus salah satu produk di keranjang 
    function hapus($id_produk) {
        // Ambil ID transaksi dari session
        $id_transaksi = $this->session->userdata('id_transaksi');

        // Panggil model untuk menghapus produk dari keranjang
        $this->load->model('Mtransaksi');
        $this->Mtransaksi->hapus_produk($id_transaksi, $id_produk);

        // Redirect ke halaman keranjang dengan pesan sukses
        $this->session->set_flashdata('pesan_sukses', 'Produk berhasil dihapus dari keranjang.');
        redirect(base_url('transaksi/keranjang'), 'refresh');
    }
    
}
