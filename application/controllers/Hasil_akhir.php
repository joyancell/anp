<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil_akhir extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kriteria_model', 'kriteria');
		$this->load->model('Analisa_alternatif_model', 'al');
		$this->load->model('Rangking_model', 'rank');
	}

	public function index()
	{
		$data = [
			'jum_kriteria' => $this->kriteria->countAll(),
			'kriteria'     => $this->kriteria->getKriteria(),
			'baris'        => $this->al->readByFilter(),
		];
		$this->load->view('header', $data);
		$this->load->view('hasil_akhir', $data);
		$this->load->view('footer', $data);
	}

	
}
