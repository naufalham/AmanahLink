<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index() {
		$this->load->model('Mproduk');
		$produk_terfavorit = $this->Mproduk->produk_terfavorit();
	  
		$data['produk_terfavorit'] = $produk_terfavorit;
	  
		$this->load->view('header');
		$this->load->view('welcome', $data);
		$this->load->view('footer');
	  }

	 
}
