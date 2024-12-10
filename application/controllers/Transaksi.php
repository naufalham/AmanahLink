<?php
class Transaksi extends CI_Controller {

    public function __construct() {
        parent::__construct();
<<<<<<< HEAD
        if (!$this->session->userdata("id_pelanggan")) {
            redirect('/','refresh');
        }
        $this->load->model("Mtransaksi");
    }
=======
        //jk tidak ada tiket biskop, maka suruh login
        if (!$this->session->userdata("id_pelanggan")) {
            redirect('/','refresh');
        }
    }
    
    public function index(){

        //dapatkan id_pelanggan yang login
            $id_pelanggan = $this->session->userdata("id_pelanggan");
    
        //panggil mode Mtransaksi dan fungsi transaksi_pelanggan_beli (id_pelanggan yg login)
        $this->load->model("Mtransaksi");
        $data["transaksi"] = $this->Mtransaksi->transaksi_pelanggan_beli($id_pelanggan);
    
        
            $this->load->view('header');
            $this->load->view('transaksi_tampil', $data);
            $this->load->view('footer');
        }

    function detail($id_transaksi) {

            //panggil model Mtransaksi
            $this->load->model('Mtransaksi');
    
            
            //panggil fungsi detail()
            
            $data["produk_beli"] = $this->Mtransaksi->produk_beli($id_transaksi);
            $data["transaksi"] = $this->Mtransaksi->detail($id_transaksi);
            // if ($data["transaksi"]['id_pelanggan']!==$this->session->userdata("id_pelanggan")) {
            //     $this->session->set_flashdata('pesan_gagal', 'tidak valid');
            //     redirect('transaksi','refresh');
            // }
    
            $this->load->view('header');
            $this->load->view('transaksi_detail', $data);
            $this->load->view('footer');
            }
    
    function keranjang() {

        //panggil model Mproduk dan fungsi tampil()

        $this->load->model("Mproduk");
        $data['produk'] = $this->Mproduk->tampil();
>>>>>>> fe6418ce7bb0bcd3ead387e7ffbf77e349d05fa2

    // Halaman keranjang
    public function keranjang() {
        $id_transaksi = $this->session->userdata('id_transaksi');
        if (!$id_transaksi) {
            $data['keranjang'] = []; // Kosongkan keranjang jika tidak ada ID transaksi
        } else {
            $data['keranjang'] = $this->Mtransaksi->get_detail_transaksi($id_transaksi);
        }
    
        $this->load->view('header');
        $this->load->view('keranjang', $data);
        $this->load->view('footer');
    }
    

    // Proses checkout (data keranjang dikirim via POST)
    public function checkout() {
        $id_transaksi = $this->session->userdata('id_transaksi');
        if (!$id_transaksi) {
            $this->session->set_flashdata('error', 'Keranjang kosong!');
            redirect('transaksi/keranjang');
        }
    
        $keranjang = $this->Mtransaksi->get_detail_transaksi($id_transaksi);
        if (empty($keranjang)) {
            $this->session->set_flashdata('error', 'Keranjang kosong!');
            redirect('transaksi/keranjang');
        }
    
        // Update status transaksi
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->update('transaksi', ['status_transaksi' => 'diproses']);
    
        $this->session->unset_userdata('id_transaksi'); // Hapus ID transaksi dari sesi
        redirect(base_url('transaksi/konfirmasi/' . $id_transaksi));
    }
    

    // Halaman konfirmasi transaksi
    public function konfirmasi($id_transaksi) {
        $data['transaksi'] = $this->Mtransaksi->get_transaksi($id_transaksi);
        $data['detail_transaksi'] = $this->Mtransaksi->get_detail_transaksi($id_transaksi);

        $this->load->view('header');
        $this->load->view('konfirmasi', $data);
        $this->load->view('footer');
    }
}
?>
