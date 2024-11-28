<?php 
class Produk extends CI_Controller {

	function __construct(){
		parent::__construct();

		//jika tidak ada tiket login, maka suruh login
		if (!$this->session->userdata("id_admin")) {
			$this->session->set_flashdata('pesan_gagal', 'Anda harus login');
            redirect('','refresh');
		}
	}


    function index(){
		
		//manggil model Mproduk
		$this->load->model("Mproduk");

		$data ["produk"] = $this->Mproduk->tampil();

		$this->load->view("header");
		$this->load->view("produk_tampil", $data);
		$this->load->view("footer");
	}

	function tambah(){
		$this->load->model("Mproduk");

		$inputan = $this->input->post();
		if ($inputan){
			$this->Mproduk->simpan($inputan);
			$this->session->set_flashdata('pesan_sukses', 'rpoduk tersimpan');
			redirect('produk','refresh');
		}

		$this->load->view("header");
		$this->load->view("produk_tambah");
		$this->load->view("footer");
	}

	function edit($id_produk){

		//1. tampil data lama
		$this->load->model("Mproduk");
		$data['produk'] = $this->Mproduk->detail($id_produk);

		// $this->load->model("Mkategori");
		// $data ["kategori"] = $this->Mkategori->tampil();

		//2. ubah data
		$inputan = $this->input->post();

		if($inputan){
			$this->Mproduk->ubah($inputan, $id_produk);

			//pesan
			$this->session->set_flashdata('pesan_sukses', 'produk telah diubah');

			//redirect
			redirect('produk','refresh');
		}

		$this->load->view("header");
		$this->load->view("produk_edit", $data);
		$this->load->view("footer");
	}

	function hapus($id_produk){
		//query hapus data
		$this->load->model("Mproduk");
		$this->Mproduk->hapus($id_produk);

		//pesan
		$this->session->set_flashdata('pesan_sukses', 'produk telah diubah');

		//redirect
		redirect('produk','refresh');
	}
}