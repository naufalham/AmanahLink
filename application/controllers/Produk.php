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
        // $this->load->model('Mproduk');
        // $data["produk"] = $this->Mproduk->detail_umum($id_produk);

        // $inputan = $this->input->post();
        // if ($inputan) {
        //     $this->load->model("Mkeranjang");
        //     $this->Mkeranjang->simpan($inputan, $id_produk);

        //     $this->session->set_flashdata('pesan_sukses','produk masuk ke keranjang belanja');
        //     redirect('','refresh');
        // }

        $this->load->view('header');
        $this->load->view('produk_detail');
        $this->load->view('footer');
    }
}