<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelaporan extends CI_Controller {
	function index(){

		$this->load->model("Mpelaporan");
		$data['jumlah_penjualan'] = $this->Mpelaporan->jumlah_penjualan("header");


		$this->load->view("header");
		$this->load->view("pelaporan", $data);
		$this->load->view("footer");
	}
}
