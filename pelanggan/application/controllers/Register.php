<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index()
	{
		$this->load->model('Mpelanggan');

		$this->form_validation->set_rules("username_pelanggan","email","required|is_unique[pelanggan.username_pelanggan]");
		$this->form_validation->set_rules("password_pelanggan","password","required");
		$this->form_validation->set_rules("status_pelanggan","status","required");
		$this->form_validation->set_rules("tgl_daftar","tanggal","required");
		$this->form_validation->set_rules("nama_pelanggan","nama","required");
		$this->form_validation->set_rules("alamat","alamat","required");
		$this->form_validation->set_rules("wa_pelanggan","wa","required");

		$this->form_validation->set_message("required","%s wajib diisi");
		$this->form_validation->set_message("is_unique","%s yang sama sudah digunakan");
		if ($this->form_validation->run() == TRUE) {

			$m['username_pelanggan'] = $this->input->post("username_pelanggan");
			$m['password_pelanggan'] = $this->input->post("password_pelanggan");
			$m['password_pelanggan'] = sha1($m['password_pelanggan']);
			$m['nama_pelanggan'] = $this->input->post("nama_pelanggan");
			$m['status_pelanggan'] = $this->input->post("status_pelanggan");
			$m['tgl_daftar'] = $this->input->post("tgl_daftar");
			$m['alamat'] = $this->input->post("alamat");
			$m['wa_pelanggan'] = $this->input->post("wa_pelanggan");

			$this->Mpelanggan->register($m);
			$this->session->set_flashdata('pesan_sukses', 'registrasi berhasil, silahkan login');
			redirect('/','refresh');

		}
		$this->load->view('header');
		$this->load->view('register');
		$this->load->view('footer');
	}
}