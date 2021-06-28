<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kriteria_model', 'model');
	}

	public function index()
	{
		$data = [
			'kriteria' => $this->model->getKriteria()
		];
		$this->load->view('header', $data);
		$this->load->view('kriteria', $data);
		$this->load->view('footer', $data);
	}

	public function tambah()
	{
		$data = [
			// 'wisata' => $this->model->getWisata()
		];
		$this->load->view('header', $data);
		$this->load->view('tambah_kriteria', $data);
		$this->load->view('footer', $data);
	}

	public function simpan()
	{
		$id_kriteria = $this->input->post('id_kriteria');
		$nama        = $this->input->post('nama');

		$data = [
			'id_kriteria'   => $id_kriteria,
			'nama_kriteria' => $nama,
		];

		$simpan = $this->model->simpan('data_kriteria', $data);
		$this->session->set_flashdata('pesan', '1');
		
		
		redirect('Kriteria/tambah');
	}

	public function edit($id)
	{
		$data = [
			'kriteria' => $this->model->getOneKriteria($id)
		];
		$this->load->view('header', $data);
		$this->load->view('edit_kriteria', $data);
		$this->load->view('footer', $data);
	}

	public function update()
	{
		$id_kriteria = $this->input->post('id_kriteria');
		$nama        = $this->input->post('nama');

		$where = ['id_kriteria' => $id_kriteria];
		$data  = [
			'nama_kriteria' => $nama,
		];
		$this->model->updateData('data_kriteria', $data, $where);
		$this->session->set_flashdata('update', 'Data Berhasil diubah...');
		redirect('Kriteria');
	}

	public function hapus($id)
	{
		$where  = ['id_kriteria' => $id];
		$this->model->deleteData('data_kriteria', $where);
		$this->session->set_flashdata('hapus', 'Data Berhasil dihapus...');
		redirect('Kriteria');
	}
	
}
