<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Nilai_model', 'model');
	}

	public function index()
	{
		$data = [
			'nilai' => $this->model->getNilai()
		];
		$this->load->view('header', $data);
		$this->load->view('nilai', $data);
		$this->load->view('footer', $data);
	}

	public function tambah()
	{
		$data = [
			// 'wisata' => $this->model->getWisata()
		];
		$this->load->view('header', $data);
		$this->load->view('tambah_nilai', $data);
		$this->load->view('footer', $data);
	}

	public function simpan()
	{
		$jm = $this->input->post('jm');
		$kt = $this->input->post('kt');

		$data = [
			'jum_nilai' => $jm,
			'ket_nilai' => $kt,
		];

		$simpan = $this->model->simpan('nilai', $data);
		$this->session->set_flashdata('pesan', '1');

		redirect('Nilai/tambah');
	}

	public function edit($id)
	{
		$data = [
			'nilai' => $this->model->getOneNilai($id)
		];
		$this->load->view('header', $data);
		$this->load->view('edit_nilai', $data);
		$this->load->view('footer', $data);
	}

	public function update()
	{
		$id_nilai = $this->input->post('id_nilai');
		$jm       = $this->input->post('jm');
		$kt       = $this->input->post('kt');

		$where = ['id_nilai' => $id_nilai];
		$data  = [
			'jum_nilai' => $jm,
			'ket_nilai' => $kt,
		];
		$this->model->updateData('nilai', $data, $where);
		$this->session->set_flashdata('update', 'Data Berhasil diubah...');
		redirect('Nilai');
	}

	public function hapus($id)
	{
		$where  = ['id_nilai' => $id];
		$this->model->deleteData('nilai', $where);
		$this->session->set_flashdata('hapus', 'Data Berhasil dihapus...');
		redirect('Nilai');
	}
	
}
