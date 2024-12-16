<?php 
class Produk extends CI_Controller {

	function __construct(){
		parent::__construct();

		//jika tidak ada tiket login, maka suruh login
		if (!$this->session->userdata("id_admin")) {
			$this->session->set_flashdata('pesan_gagal', 'Anda harus login');
            redirect('','refresh');
		}
	}

    function index(){
		//manggil model Mproduk
		$this->load->model("Mproduk");

		$data ["produk"] = $this->Mproduk->tampil();

		$this->load->view("header");
		$this->load->view("produk_tampil", $data);
		$this->load->view("footer");
	}

	function tambah(){
		$this->load->model("Mproduk");

		//form validation
		$this->form_validation->set_rules("nama_produk", "nama produk", "required");
		$this->form_validation->set_rules("deskripsi_produk", "deskripsi produk", "required");
		$this->form_validation->set_rules("harga_produk", "harga produk", "required");
		if (empty($_FILES['foto_produk']['name'])) {
			$this->form_validation->set_rules("foto_produk", "Foto Produk", "required", [
				"required" => "Foto produk wajib diunggah."
			]);
		}
		
		// atur pesan bindo
		$this->form_validation->set_message("required", "%s wajib diisi");

		if($this->form_validation->run()==TRUE){
			$inputan = $this->input->post();
			if ($inputan){
				$this->Mproduk->simpan($inputan);
				$this->session->set_flashdata('pesan_sukses', 'produk tersimpan');
				redirect('produk','refresh');
			}
		}

		$this->load->view("header");
		$this->load->view("produk_tambah");
		$this->load->view("footer");
	}

	function edit($id_produk){

		//tampil data lama
		$this->load->model("Mproduk");
		$data['produk'] = $this->Mproduk->detail($id_produk);

		//form validation
		$this->form_validation->set_rules("nama_produk", "nama produk", "required");
		$this->form_validation->set_rules("deskripsi_produk", "deskripsi produk", "required");
		$this->form_validation->set_rules("harga_produk", "harga produk", "required");
		
		// atur pesan bindo
		$this->form_validation->set_message("required", "%s wajib diisi");

		//ubah data
		if($this->form_validation->run()==TRUE){
			$inputan = $this->input->post();
			if($inputan){
				$this->Mproduk->ubah($inputan, $id_produk);
				$this->session->set_flashdata('pesan_sukses', 'produk telah diubah');
				redirect('produk','refresh');
			}
		}

		$this->load->view("header");
		$this->load->view("produk_edit", $data);
		$this->load->view("footer");
	}

	function hapus($id_produk){
		//query hapus data
		$this->load->model("Mproduk");
		$this->Mproduk->hapus($id_produk);

		//pesan
		$this->session->set_flashdata('pesan_sukses', 'produk telah dihapus');

		//redirect
		redirect('produk','refresh');
	}
}