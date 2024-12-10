<?php
class Transaksi extends CI_Controller {

	function __construct()
    {
        parent::__construct();

        //jk tidak ada tiket biskop, maka suruh login
        if (!$this->session->userdata("id_pelanggan")) {
            redirect('/','refresh');
        }
    }

    // Proses checkout untuk satu penjual
    public function checkout($id_member) {
        // Ambil data keranjang berdasarkan id_member dan id_pelanggan (dari session)
        $id_pelanggan = $this->session->userdata('id_pelanggan');
        $keranjang = $this->get_keranjang_by_member($id_member, $id_pelanggan);

        // Proses checkout
        $id_transaksi = $this->Mtransaksi->checkout($id_pelanggan, $keranjang);

        // Redirect atau tampilkan halaman konfirmasi
        redirect(base_url('transaksi/konfirmasi/' . $id_transaksi));
    }

    // Proses checkout untuk semua penjual
    public function checkout_all() {
        // Ambil data keranjang berdasarkan id_pelanggan (dari session)
        $id_pelanggan = $this->session->userdata('id_pelanggan');
        $keranjang = $this->get_keranjang_by_pelanggan($id_pelanggan);

        // Proses checkout
        $id_transaksi = $this->Mtransaksi->checkout($id_pelanggan, $keranjang);

        // Redirect atau tampilkan halaman konfirmasi
        redirect(base_url('transaksi/konfirmasi/' . $id_transaksi));
    }

    // Menampilkan konfirmasi setelah transaksi selesai
    public function konfirmasi($id_transaksi) {
        $data['transaksi'] = $this->db->get_where('transaksi', ['id_transaksi' => $id_transaksi])->row_array();
        $this->load->view('konfirmasi', $data);
    }

    // Fungsi untuk mendapatkan data keranjang berdasarkan id_member dan id_pelanggan
    private function get_keranjang_by_member($id_member, $id_pelanggan) {
        // Ambil keranjang berdasarkan id_member dan id_pelanggan
        $this->db->where('id_member', $id_member);
        $this->db->where('id_pelanggan', $id_pelanggan);
        return $this->db->get('keranjang')->result_array();
    }

    // Fungsi untuk mendapatkan semua keranjang pelanggan
    private function get_keranjang_by_pelanggan($id_pelanggan) {
        // Ambil keranjang berdasarkan id_pelanggan
        $this->db->where('id_pelanggan', $id_pelanggan);
        return $this->db->get('keranjang')->result_array();
    }
}
?>
