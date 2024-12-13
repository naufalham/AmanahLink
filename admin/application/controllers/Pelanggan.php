<?php

class Pelanggan extends CI_Controller{
	function __construct()
    {
        parent::__construct();

        //jk tidak ada tiket biskop, maka suruh login
        if (!$this->session->userdata("id_admin")) {
            $this->session->set_flashdata('pesan_gagal', 'Anda harus login');
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

        // Ambil data enum status member
        $data['enum_status'] = $this->Mpelanggan->status_member($id_pelanggan);

        $this->load->model('Mtransaksi');
        $data['beli'] = $this->Mtransaksi->transaksi_pelanggan_beli($id_pelanggan); 

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

    function update_member() {
        // Pastikan data dikirim melalui POST dan valid
        $input = json_decode(file_get_contents('php://input'), true);
    
        if (isset($input['id_pelanggan']) && isset($input['status_pelanggan'])) {
            $id_pelanggan = $input['id_pelanggan'];
            $status_pelanggan = $input['status_pelanggan'];
    
            // Panggil fungsi update_status di Model
            $this->load->model('Mpelanggan');
            $update_successful = $this->Mpelanggan->update_member($id_pelanggan, $status_pelanggan);
            
            // Mengirimkan pesan flashdata untuk sukses
            if ($update_successful) {
                $this->session->set_flashdata('pesan_sukses', 'Status pelanggan berhasil diperbaharui');
            } else {
                // Jika gagal, berikan pesan error (optional)
                $this->session->set_flashdata('pesan_gagal', 'Terjadi kesalahan saat memperbarui status pelanggan');
            }
            redirect('', 'refresh');
            // Redirect ke halaman detail transaksi (atau halaman yang sesuai)
            
        } else {
            // Jika parameter tidak valid, redirect ke halaman sebelumnya (atau halaman lain)
            $this->session->set_flashdata('pesan_gagal', 'Data tidak valid');
            redirect('pelanggan', 'refresh');
        }
    }
}
