<?php
class Transaksi extends CI_Controller {

	// function __construct()
    // {
    //     parent::__construct();

<<<<<<< HEAD
    //     //jk tidak ada tiket biskop, maka suruh login
    //     if (!$this->session->userdata("id_pelanggan")) {
    //         redirect('/','refresh');
    //     }
    // }
    
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
            $data["transaksi"] = $this->Mtransaksi->detail($id_transaksi);
            if ($data["transaksi"]['id_pelanggan']!==$this->session->userdata("id_pelanggan")) {
                $this->session->set_flashdata('pesan_gagal', 'tidak valid');
                redirect('transaksi','refresh');
            }
    
            $this->load->view('header');
            $this->load->view('transaksi_detail', $data);
            $this->load->view('footer');
            }


=======
        //jk tidak ada tiket biskop, maka suruh login
        if (!$this->session->userdata("id_pelanggan")) {
            redirect('/','refresh');
        } 
    }
    function index() {
>>>>>>> a2252a17c7a44e5cb317e8ae9f6dae8ee2a36440

        //panggil model Mproduk dan fungsi tampil()

        $this->load->model("Mproduk");
        $data['produk'] = $this->Mproduk->tampil();

        $this->load->view('header');
        $this->load->view('keranjang', $data);
        $this->load->view('footer');

    }
    
    // private function get_keranjang_by_pelanggan($id_pelanggan) {
    //     $this->db->where('id_pelanggan', $id_pelanggan);
    //     return $this->db->get('keranjang')->result_array();
    // }
    

    // // Proses checkout untuk satu penjual
    // public function checkout($id_member) {
    //     // Ambil data keranjang berdasarkan id_member dan id_pelanggan (dari session)
    //     $id_pelanggan = $this->session->userdata('id_pelanggan');
    //     $keranjang = $this->get_keranjang_by_member($id_member, $id_pelanggan);

    //     // Proses checkout
    //     $id_transaksi = $this->Mtransaksi->checkout($id_pelanggan, $keranjang);

    //     // Redirect atau tampilkan halaman konfirmasi
    //     redirect(base_url('transaksi/konfirmasi/' . $id_transaksi));
    // }

    // // Proses checkout untuk semua penjual
    // public function checkout_all() {
    //     // Ambil data keranjang berdasarkan id_pelanggan (dari session)
    //     $id_pelanggan = $this->session->userdata('id_pelanggan');
    //     $keranjang = $this->get_keranjang_by_pelanggan($id_pelanggan);

    //     // Proses checkout
    //     $id_transaksi = $this->Mtransaksi->checkout($id_pelanggan, $keranjang);

    //     // Redirect atau tampilkan halaman konfirmasi
    //     redirect(base_url('transaksi/konfirmasi/' . $id_transaksi));
    // }

    // // Menampilkan konfirmasi setelah transaksi selesai
    // public function konfirmasi($id_transaksi) {
    //     $data['transaksi'] = $this->db->get_where('transaksi', ['id_transaksi' => $id_transaksi])->row_array();
    //     $this->load->view('konfirmasi', $data);
    // }

    // // Fungsi untuk mendapatkan data keranjang berdasarkan id_member dan id_pelanggan
    // private function get_keranjang_by_member($id_member, $id_pelanggan) {
    //     // Ambil keranjang berdasarkan id_member dan id_pelanggan
    //     $this->db->where('id_member', $id_member);
    //     $this->db->where('id_pelanggan', $id_pelanggan);
    //     return $this->db->get('keranjang')->result_array();
    // }


}
?>
