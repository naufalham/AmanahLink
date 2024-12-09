<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

    public function index()
    {
        $this->session->unset_userdata("id_pelanggan");
		$this->session->unset_userdata("username_pelanggan");
    
        //redirect ke halaman login
        $this->session->set_flashdata('pesan_sukses', 'Anda telah Logout');
        redirect('/','refresh');
    }
}
?>