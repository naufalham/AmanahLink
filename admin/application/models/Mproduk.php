<?php 
class Mproduk extends CI_Model {
	function tampil(){

		//melakukan query
		$q = $this->db->get("produk");

		//pecah ke array
		$d = $q->result_array();

		return $d;
	}

	function simpan($inputan){
		//upload foto
		$config['upload_path'] = $this->config->item("assets_produk");
		$config['allowed_types'] = 'gif|jpg|png|jpeg';

		$this->load->library('upload', $config);

		//adegan upload foto
		$ngupload = $this->upload->do_upload("foto_produk");

		//jika upload maka dapat nama fotonya 
		if($ngupload){
			$inputan['foto_produk'] = $this->upload->data("file_name");
		}

		//query simpan data
		$this->db->insert('produk', $inputan);
	}

	function detail($id_produk){
		$this->db->where('id_produk', $id_produk);
		$q = $this->db->get("produk");
		$d = $q->row_array();

		return $d;
	}

	function ubah($inputan, $id){
		//ngurusi foto_produk jika pengguna up foto

		$config['upload_path'] = $this->config->item("assets_produk");
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$this->load->library("upload", $config);

		//adegan ngupload
		$ngupload = $this->upload->do_upload("foto_produk");

		//jika ngupload
		if($ngupload){
			$inputan['foto_produk'] = $this->upload->data("file_name");
		}

		$this->db->where('id_produk', $id);
		$this->db->update('produk', $inputan);
	}

	function hapus($id_produk){
		//query hapus data produk sesuai id_produk
		$this->db->where('id_produk', $id_produk);
		$this->db->delete('produk');
	}

	function detail_umum($id_produk){
		$this->db->where('id_produk', $id_produk);
		$this->db->join("kategori", 'produk.id_kategori = kategori.id_kategori', 'left');
		$q = $this->db->get("produk");
		$d = $q->row_array();

		return $d;
	}
}
