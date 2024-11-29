<?php

class Pelanggan extends CI_Controller{
	function __construct()
    {
        parent::__construct();

        //jk tidak ada tiket biskop, maka suruh login
        if (!$this->session->userdata("id_admin")) {
            redirect('/','refresh');
        }
    }
    
    public function index(){

    //panggil mode Mpelanggan
    $this->load->model("Mpelanggan");

    $data ["pelanggan"] = $this->Mpelanggan->tampil();

    
        $this->load->view('header');
        $this->load->view('pelanggan_tampil', $data);
        $this->load->view('footer');
    }
    function detail($id_pelanggan) {

        $this->load->model('Mpelanggan');
        $data["pelanggan"] = $this->Mpelanggan->detail($id_pelanggan);

        /* $this->load->model('Mtransaksi');
        $data['jual'] = $this->Mtransaksi->transaksi_member_jual($id_member);
        $data['beli'] = $this->Mtransaksi->transaksi_member_beli($id_member); */

        $this->load->view('header');
        $this->load->view('pelanggan_detail', $data);
        $this->load->view('footer');
    }

    function hapus($id_pelanggan) {

        echo $id_pelanggan;

        //panggil model Mpelanggan
        $this->load->model('Mpelanggan');

        //jalankan fungsi hapus();
        $this->Mpelanggan->hapus($id_pelanggan);

        //pesan di layar;
        $this->session->set_flashdata('pesan_sukses','pelanggan telah hapus');

        //redirect ke pelanggan unk tampil data
        redirect('pelanggan','refresh');

    }
}
