<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	// function __construct()
    // {
    //     parent::__construct();

    //     //jk tidak ada tiket biskop, maka suruh login
    //     if (!$this->session->userdata("id_pelanggan")) {
    //         redirect('/','refresh');
    //     }
    // }
	public function index()
	{
		// $inputan = $this->input->post();

		// //form validation username dan password wajib di isi
		// $this->form_validation->set_rules("username_pelanggan", "Email","required");
		// $this->form_validation->set_rules("password_pelanggan", "Password","required");

		// //atur pesan dalam b. indo
		// $this->form_validation->set_message("required", "%s wajib diisi");

		// //pakai validasinya
		// if ($this->form_validation->run()==TRUE) {
		// 	$this->load->model('Mpelanggan');
		// 	$output = $this->Mpelanggan->login($inputan);

		// 	if ($output=="ada") {

		// 		$this->session->set_flashdata('pesan_sukses', 'Berhasil Login');
		// 		redirect('home','refresh');
		// 	} else {
		// 		$this->session->set_flashdata('pesan_gagal', 'Gagal Login');
		// 		redirect('/','refresh');
		// 	}
		// }

		/* $this->load->model('Mslider');
		$this->load->model('Mkategori');
		$this->load->model('Mproduk');
		$this->load->model('Martikel');

		$data['slider'] = $this->Mslider->tampil();
		$data['kategori'] = $this->Mkategori->tampil();
		$data['produk'] = $this->Mproduk->tampil_produk_terbaru();
		$data['artikel'] = $this->Martikel->tampil_artikel_terbaru(); */


		$this->load->view('header');
		$this->load->view('welcome');
		$this->load->view('footer');
	}

	 
}
