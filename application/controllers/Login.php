

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$inputan = $this->input->post();

		//form validation ussername dan pass
		$this->form_validation->set_rules("username_pelanggan", "Username", "required");
		$this->form_validation->set_rules("password_pelanggan", "Password", "required");

		// atur pesan bindo
		$this->form_validation->set_message("required", "%s wajib diisi");
		
		if($this->form_validation->run()==TRUE){
			$this->load->model('Mpelanggan');
			$output = $this->Mpelanggan->login($inputan);

			if ($output=="ada") {
				$this->session->set_flashdata('pesan_sukses', 'Berhasil Login');
				redirect('welcome','refresh');
			}else {
				$this->session->set_flashdata('pesan_gagal', 'Gagal Login');
				redirect('/','refresh');
			}
		}
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
	}
}
