<?php
class Transaksi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Jika tidak ada sesi pelanggan, arahkan ke halaman utama
        if (!$this->session->userdata("id_pelanggan")) {
            redirect('/', 'refresh');
        }
    }

    function index() {
        $id_pelanggan = $this->session->userdata("id_pelanggan");

        // Panggil model dan ambil transaksi pelanggan
        $this->load->model("Mtransaksi");
        $data["transaksi"] = $this->Mtransaksi->transaksi_pelanggan_beli($id_pelanggan);

        $this->load->view('header');
        $this->load->view('transaksi_tampil', $data);
        $this->load->view('footer');
    }

    function detail($id_transaksi) {
        $this->load->model('Mtransaksi');

        $data["produk_beli"] = $this->Mtransaksi->produk_beli($id_transaksi);
        $data["transaksi"] = $this->Mtransaksi->detail($id_transaksi);

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
            $id_transaksi = $this->Mtransaksi->get_or_create_transaksi($id_pelanggan);
            $this->session->set_userdata('id_transaksi', $id_transaksi);
        }
    
        $data['keranjang'] = $this->Mtransaksi->get_keranjang($id_transaksi);
    
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

        // Update status transaksi menjadi diproses
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->update('transaksi', ['status_transaksi' => 'diproses']);

        // Hapus ID transaksi dari sesi
        $this->session->unset_userdata('id_transaksi');

        redirect(base_url('transaksi/konfirmasi/' . $id_transaksi));
    }

    function konfirmasi($id_transaksi) {
        $this->load->model('Mtransaksi');

        $data['transaksi'] = $this->Mtransaksi->get_transaksi($id_transaksi);
        $data['detail_transaksi'] = $this->Mtransaksi->get_detail_transaksi($id_transaksi);

        // Set pesan alert menggunakan session flashdata
        $this->session->set_flashdata('pesan_sukses', 'Checkout berhasil! Pesanan Anda sedang diproses.');

        // Redirect ke halaman utama atau halaman lain
        redirect(base_url("transaksi/detail/" .$id_transaksi));
    }

    //hapus salah satu produk di keranjang 
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
