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
        // Ambil data POST
        $id_transaksi = $this->input->post('id_transaksi');
        $status_transaksi = $this->input->post('status_transaksi');
    
        // Validasi data
        if ($id_transaksi && $status_transaksi) {
            // Panggil fungsi update_status di Model
            $this->load->model('Mtransaksi');
            $update_successful = $this->Mtransaksi->update_status($id_transaksi, $status_transaksi);
            
            // Berikan feedback kepada pengguna
            if ($update_successful) {
                $this->session->set_flashdata('pesan_sukses', 'Status pesanan berhasil diperbarui.');
            } else {
                $this->session->set_flashdata('pesan_gagal', 'Terjadi kesalahan saat memperbarui status pesanan.');
            }
        } else {
            $this->session->set_flashdata('pesan_gagal', 'Data tidak valid.');
        }
    
        // Redirect ke halaman detail transaksi
        redirect('transaksi/detail/'.$id_transaksi, 'refresh');
    }
    
    
}

?>