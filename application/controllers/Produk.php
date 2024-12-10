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
        $data["produk"] = $this->Mproduk->detail($id_produk);
    
        $inputan = $this->input->post();
        if ($inputan) {
            $id_produk = $this->input->post('id_produk');  // Ambil id_produk dari POST
            $jumlah = $this->input->post('jumlah');  // Ambil jumlah dari POST
    
            if (!is_numeric($id_produk) || !is_numeric($jumlah) || $id_produk <= 0 || $jumlah <= 0) {
                // Tangani error jika id_produk atau jumlah tidak valid
                $this->session->set_flashdata('pesan_error', 'ID Produk atau Jumlah tidak valid.');
                redirect('produk/detail/'.$id_produk, 'refresh');  // Redirect kembali dengan pesan error
            }
    
            // Jika valid, simpan transaksi
            $this->load->model("Mtransaksi");
            $this->Mtransaksi->simpan($id_produk, $jumlah);
    
            $this->session->set_flashdata('pesan_sukses','produk masuk ke keranjang belanja');
            redirect('produk/detail/'.$id_produk, 'refresh');
        }
    
        $this->load->view('header');
        $this->load->view('produk_detail',$data);
        $this->load->view('footer');
    }
    
}