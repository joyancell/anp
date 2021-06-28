<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wisata extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model', 'model');
	}

	public function index()
	{
		$data = [
			'wisata' => $this->model->getWisata()
		];
		$this->load->view('header', $data);
		$this->load->view('wisata', $data);
		$this->load->view('footer', $data);
	}

	public function tambah()
	{
		$data = [
			// 'wisata' => $this->model->getWisata()
		];
		$this->load->view('header', $data);
		$this->load->view('tambah_wisata', $data);
		$this->load->view('footer', $data);
	}

	public function simpan()
	{
		$id_wisata   = $this->input->post('id_wisata');
		$nama_wisata = $this->input->post('nama_wisata');
		$alamat      = $this->input->post('alamat');

		$config['upload_path']   = './assets/images/wisata/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['file_name']     = time();
		$this->load->library('upload', $config);
		$this->upload->data();
		if ($this->upload->do_upload('foto_wisata')){
			$gambar = $this->upload->data("file_name");
		}else{
			$gamabr = '1.jpg';
		}

		$data = [
			'id_wisata'   => $id_wisata,
			'nama_wisata' => $nama_wisata,
			'foto_wisata' => $gambar,
			'alamat'      => $alamat,
		];

		$simpan = $this->model->simpan('data_wisata', $data);
		$this->session->set_flashdata('pesan', '1');
		
		
		redirect('Wisata/tambah');
	}

	public function edit($id)
	{
		$data = [
			'wisata' => $this->model->getOneWisata($id)
		];
		$this->load->view('header', $data);
		$this->load->view('edit_wisata', $data);
		$this->load->view('footer', $data);
	}

	public function update()
	{
		$id        = $this->input->post('id');
		$nama      = $this->input->post('nama');
		$foto_lama = $this->input->post('foto_lama');
		$alamat    = $this->input->post('alamat');

		$config['upload_path']   = './assets/images/wisata/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['file_name']     = time();
		$this->load->library('upload', $config);
		$this->upload->data();
		if (!$this->upload->do_upload('foto_wisata')){
			$gambar = $foto_lama;
		}else{
			$gambar = $this->upload->data("file_name");
			unlink('./assets/images/wisata/'.$foto_lama);
		}
		$where = ['id_wisata' => $id];
		$data     = [
			'nama_wisata' => $nama,
			'foto_wisata' => $gambar,
			'alamat'      => $alamat,
		];
		$this->model->updateData('data_wisata', $data, $where);
		$this->session->set_flashdata('update', 'Data Berhasil diubah...');
		redirect('Wisata');
	}

	public function hapus($id)
	{
		$where  = ['id_wisata' => $id];
		$gambar = $this->db->query(" SELECT data_wisata.foto_wisata FROM data_wisata WHERE id_wisata = '$id' ")->row();
		unlink('./assets/images/wisata/'.$gambar->foto_wisata);
		$this->model->deleteData('data_wisata', $where);
		$this->session->set_flashdata('hapus', 'Data Berhasil dihapus...');
		redirect('Wisata');
	}
	
}
