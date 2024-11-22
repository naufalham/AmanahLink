<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function index(){

		// $this->load->model("Mmember");
		// $data['jumlah_member_distrik'] = $this->Mmember->jumlah_member_distrik("header");


		$this->load->view("home");
	}
}
