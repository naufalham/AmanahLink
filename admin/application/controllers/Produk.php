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

	function tambah() {
		$this->load->model("Mproduk");
	
		// Form validation
		$this->form_validation->set_rules("nama_produk", "nama produk", "required");
		$this->form_validation->set_rules("deskripsi_produk", "deskripsi produk", "required");
		$this->form_validation->set_rules("harga_produk", "harga produk", "required");
	
		// Validasi file upload
		if (empty($_FILES['foto_produk']['name'])) {
			$this->form_validation->set_rules("foto_produk", "Foto Produk", "required", [
				"required" => "Foto produk wajib diunggah."
			]);
		} else {
			// Validasi format file
			$file_type = strtolower(pathinfo($_FILES['foto_produk']['name'], PATHINFO_EXTENSION));
			if (!in_array($file_type, ['jpg', 'jpeg', 'png'])) {
				$this->form_validation->set_rules("foto_produk", "Foto Produk", "required", [
					"required" => "Jenis file harus JPG atau PNG."
				]);
			}
		}
	
		// Atur pesan dalam bahasa Indonesia
		$this->form_validation->set_message("required", "%s wajib diisi");
	
		if ($this->form_validation->run() == TRUE) {
			$inputan = $this->input->post();
			if ($inputan) {
				$this->Mproduk->simpan($inputan);
				$this->session->set_flashdata('pesan_sukses', 'Produk tersimpan');
				redirect('produk', 'refresh');
			}
		}
	
		$this->load->view("header");
		$this->load->view("produk_tambah");
		$this->load->view("footer");
	}
	

	function edit($id_produk) {
		$this->load->model("Mproduk");
		$data['produk'] = $this->Mproduk->detail($id_produk);
	
		// Form validation
		$this->form_validation->set_rules("nama_produk", "Nama Produk", "required");
		$this->form_validation->set_rules("deskripsi_produk", "Deskripsi Produk", "required");
		$this->form_validation->set_rules("harga_produk", "Harga Produk", "required");
		$this->form_validation->set_message("required", "%s wajib diisi");
	
<<<<<<< HEAD
		// Validasi dan upload foto jika ada
		if ($this->form_validation->run() == TRUE) {
			$inputan = $this->input->post();
	
			// Cek apakah ada file foto diunggah
=======
		// Jalankan validasi form
		if ($this->form_validation->run() == TRUE) {
			$inputan = $this->input->post();
	
			// Cek jika ada perubahan pada file
>>>>>>> e0f982ccf84a0de6b3886e578d62ab57a23c547b
			if (!empty($_FILES['foto_produk']['name'])) {
				$config['upload_path'] = $this->config->item("assets_produk");
				$config['allowed_types'] = 'jpg|jpeg|png';
	
				$this->load->library('upload', $config);
	
				if ($this->upload->do_upload('foto_produk')) {
					// Ambil nama file baru
					$inputan['foto_produk'] = $this->upload->data('file_name');
	
<<<<<<< HEAD
								// Validasi format file
					$file_type = strtolower(pathinfo($_FILES['foto_produk']['name'], PATHINFO_EXTENSION));
					if (!in_array($file_type, ['jpg', 'jpeg', 'png'])) {
						$this->form_validation->set_rules("foto_produk", "Foto Produk", "required", [
							"required" => "Jenis file harus JPG atau PNG."
						]);
					}

					// Hapus foto lama jika ada
=======
					// Hapus file lama jika ada
>>>>>>> e0f982ccf84a0de6b3886e578d62ab57a23c547b
					if (!empty($data['produk']['foto_produk'])) {
						unlink($this->config->item("assets_produk") . $data['produk']['foto_produk']);
					}
				} else {
<<<<<<< HEAD
					// Jika upload gagal, tampilkan pesan error
					$this->form_validation->set_rules("foto_produk", "Foto Produk", "required", [
					"required" => "Jenis file harus JPG atau PNG."]);
					redirect("produk/edit/$id_produk", 'refresh');
=======
					// Tambahkan error ke validasi
					$this->form_validation->set_rules("foto_produk", "Foto Produk", "required", [
						"required" => "Jenis file harus JPG atau PNG."
					]);
>>>>>>> e0f982ccf84a0de6b3886e578d62ab57a23c547b
				}
			}
	
			// Simpan perubahan jika tidak ada error pada validasi
			if ($this->form_validation->run() == TRUE) {
				$this->Mproduk->ubah($inputan, $id_produk);
				$this->session->set_flashdata('pesan_sukses', 'Produk berhasil diperbarui.');
				redirect('produk', 'refresh');
			}
		}
	
		$this->load->view("header");
		$this->load->view("produk_edit", $data);
		$this->load->view("footer");
	}
<<<<<<< HEAD
					
=======
	
	
		
>>>>>>> e0f982ccf84a0de6b3886e578d62ab57a23c547b

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