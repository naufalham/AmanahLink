<?php
class Transaksi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata("id_pelanggan")) {
            redirect('/','refresh');
        }
        $this->load->model("Mtransaksi");
    }

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
