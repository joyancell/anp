<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ranking extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('Kriteria_model', 'kriteria');
		// $this->load->model('Analisa_alternatif_model', 'al');
		$this->load->model('Rangking_model', 'rank');
	}

	public function index()
	{
		$data = [
			// 'rank' => $this->rank->readByRank(),
			// 'kriteria' => $this->kriteria->getKriteria(),
			// 'baris' => $this->al->readByFilter(),
		];
		$this->load->view('header', $data);
		$this->load->view('ranking', $data);
		$this->load->view('footer', $data);
	}

	

	
}
