<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index() {
		$this->load->model('Madmin');
	  
		$this->load->view('header');
		$this->load->view('welcome');
		$this->load->view('footer');
	  }
}
