<?php

class Transaksi extends CI_Controller{

    function __construct()
    {
        parent::__construct();

        //jika tidak ada tiket, maka suruh login
        if(!$this->session->userdata("id_admin")) {
            $this->session->set_flashdata('pesan_gagal', 'Anda harus login');
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

    function detail($id_transaksi){

        //panggil modelMtransaksi
        $this->load->model('Mtransaksi');

        //panggil fungsi detail()
        $data["transaksi"] = $this->Mtransaksi->detail($id_transaksi);
        
        //panggil fungsi produk_transaksi()
        $data['transaksi_detail'] = $this->Mtransaksi->transaksi_detail($id_transaksi);

        // Panggil status pesanan
        $data['enum_status'] = $this->Mtransaksi->status_pesanan($id_transaksi);


        $this->load->view('header');
        $this->load->view('transaksi_detail', $data);
        $this->load->view('footer');
    }

    function update_status() {
        // Pastikan data dikirim melalui POST dan valid
        $input = json_decode(file_get_contents('php://input'), true);
    
        if (isset($input['id_transaksi']) && isset($input['status_transaksi'])) {
            $id_transaksi = $input['id_transaksi'];
            $status_transaksi = $input['status_transaksi'];
    
            // Panggil fungsi update_status di Model
            $this->load->model('Mtransaksi');
            $update_successful = $this->Mtransaksi->update_status($id_transaksi, $status_transaksi);
            
            // Mengirimkan pesan flashdata untuk sukses
            if ($update_successful) {
                $this->session->set_flashdata('pesan_sukses', 'Status pesanan berhasil diperbaharui');
            } else {
                // Jika gagal, berikan pesan error (optional)
                $this->session->set_flashdata('pesan_gagal', 'Terjadi kesalahan saat memperbarui status pesanan');
            }
            redirect('', 'refresh');
            // Redirect ke halaman detail transaksi (atau halaman yang sesuai)
            
        } else {
            // Jika parameter tidak valid, redirect ke halaman sebelumnya (atau halaman lain)
            $this->session->set_flashdata('pesan_gagal', 'Data tidak valid');
            redirect('transaksi', 'refresh');
        }
    }
    
}

?>