<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelaporan extends CI_Controller {

	function __construct(){
		parent::__construct();

		//jika tidak ada tiket login, maka suruh login
		if (!$this->session->userdata("id_admin")) {
			$this->session->set_flashdata('pesan_gagal', 'Anda harus login');
            redirect('','refresh');
		}
	}

	function index(){

		$this->load->model("Mpelaporan");
		$data['jumlah_penjualan'] = $this->Mpelaporan->jumlah_penjualan("header");
		$tada['pendapatan'] = $this->Mpelaporan->pendapatan("header");


		$this->load->view("header");
		$this->load->view("pelaporan", $data, $tada);
		$this->load->view("footer");
	}
}
