<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_awal extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Nilai_awal_model', 'model');
		$this->load->model('Admin_model', 'alternatif');
		$this->load->model('Kriteria_model', 'kriteria');
	}

	public function index()
	{
		$data = [
			'nilai_awal' => $this->model->getNilaiAwal()
		];
		$this->load->view('header', $data);
		$this->load->view('nilai_awal', $data);
		$this->load->view('footer', $data);
	}

	public function tambah()
	{
		$data = [
			'wisata' => $this->alternatif->getWisata(),
			'kriteria' => $this->kriteria->getKriteria()
		];
		$this->load->view('header', $data);
		$this->load->view('tambah_nilai_awal', $data);
		$this->load->view('footer', $data);
	}

	public function simpan()
	{
		$id_alternatif = $this->input->post('id_alternatif');
		$nilai         = (array_sum($this->input->post("kriteria")) / $this->kriteria->countAll());
		$keterangan    = $this->model->getRange($nilai);
		$periode       = $this->input->post('periode');

		$data = [
			'id_alternatif' => $id_alternatif,
			'nilai'         => $nilai,
			'keterangan'    => $keterangan,
			'periode'       => $periode
		];

		$simpan = $this->model->simpan('nilai_awal', $data);
		$this->session->set_flashdata('pesan', '1');

		redirect('Nilai_awal/tambah');
	}

	public function hapus($id)
	{
		$where  = ['id_nilai_awal' => $id];
		$this->alternatif->deleteData('nilai_awal', $where);
		$this->session->set_flashdata('hapus', 'Data Berhasil dihapus...');
		redirect('Nilai_awal');
	}

	public function modal($id)
	{
		$data = [
			'id'     => $id,
			'wisata' => $this->model->getOneWisata($id),
			'nilai'  => $this->model->readAllWithCriteria($id)
		];
		$this->load->view('modal_nilai_awal', $data);
	}
	
}
