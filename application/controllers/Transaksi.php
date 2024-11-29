<?php

class Transaksi extends CI_Controller{

    function __construct()
    {
        parent::__construct();

        //jika tidak ada tiket, maka suruh login
        if(!$this->session->userdata("id_admin")) {
            redirect('/','refresh');
        }
    }
    
    public function index(){

    //panggil mode Mtransaksi dan fungsi tampil
    $this->load->model("Mtransaksi");

    $data["transaksi"] = $this->Mtransaksi->tampil();

    
        $this->load->view('header');
        $this->load->view('transaksi_tampil', $data);
        $this->load->view('footer');
    }
}

?>