<?php
class Produk extends CI_Controller {
	function __construct()
    {
        parent::__construct();

        //jk tidak ada tiket biskop, maka suruh login
        if (!$this->session->userdata("id_pelanggan")) {
            redirect('/','refresh');
        }
    }
	
    function index() {

        //panggil model Mproduk dan fungsi tampil()

        $this->load->model("Mproduk");
        $data['produk'] = $this->Mproduk->tampil();

        $this->load->view('header');
        $this->load->view('produk_tampil', $data);
        $this->load->view('footer');

    }

    function detail($id_produk) {
        $this->load->model('Mproduk');
        $this->load->model('Mtransaksi');
        $data["produk"] = $this->Mproduk->detail($id_produk);
    
        $id_pelanggan = $this->session->userdata("id_pelanggan");
    
        // Ambil atau buat transaksi
        $id_transaksi = $this->Mtransaksi->get_or_create_transaksi($id_pelanggan);
        $this->session->set_userdata('id_transaksi', $id_transaksi);
    
        $inputan = $this->input->post();
        if ($inputan) {
            $jumlah = $this->input->post('jumlah');
    
            if (!is_numeric($jumlah) || $jumlah <= 0) {
                $this->session->set_flashdata('pesan_error', 'Jumlah tidak valid.');
                redirect('produk/detail/' . $id_produk, 'refresh');
            }
    
            // Simpan ke detail transaksi
            $this->Mtransaksi->simpan($id_produk, $jumlah, $id_transaksi);
    
            $this->session->set_flashdata('pesan_sukses', 'Produk masuk ke keranjang belanja.');
            redirect('produk/detail/' . $id_produk, 'refresh');
        }
    
        $this->load->view('header');
        $this->load->view('produk_detail', $data);
        $this->load->view('footer');
    }
    
    
    
}