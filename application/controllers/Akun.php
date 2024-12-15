<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller{
	function __construct()
    {
        parent::__construct();

        //jk tidak ada tiket biskop, maka suruh login
        if (!$this->session->userdata("id_pelanggan")) {
            redirect('/','refresh');
        }
    }


	public function index()
    {
        $inputan = $this->input->post();

        // Perbaikan di sini: pastikan validasi sudah sesuai
        $this->form_validation->set_rules("username_pelanggan", "Username", "required");
        $this->form_validation->set_rules("password_pelanggan", "Password", "trim");
        $this->form_validation->set_rules("nama_pelanggan", "Nama Lengkap", "required");
        $this->form_validation->set_rules("alamat", "Alamat", "required");
        $this->form_validation->set_rules("wa_pelanggan", "Nomor WA", "required");
        
        // atur pesan bindo
            $this->form_validation->set_message("required", "%s wajib diisi");

        if ($this->form_validation->run() == TRUE) {
            $this->load->model('Mpelanggan');
            $id_pelanggan = $this->session->userdata("id_pelanggan");
            $this->Mpelanggan->ubah($inputan, $id_pelanggan);

            $this->session->set_flashdata('pesan_sukses', 'Akun telah diubah');
            redirect('/', 'refresh');
        }

        $this->load->view('header');
        $this->load->view('akun');
        $this->load->view('footer');
    }

}
