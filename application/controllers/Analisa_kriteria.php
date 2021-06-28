<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analisa_kriteria extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Analisa_kriteria_model', 'model');
		$this->load->model('Kriteria_model', 'kriteria');
		$this->load->model('Nilai_model', 'nilai');
	}

	public function index()
	{
		
		$data = [
			// 'r' => $r

		];
		$this->load->view('header', $data);
		$this->load->view('analisa_kriteria', $data);
		$this->load->view('footer', $data);
	}
	public function tabel_analisa_kriteria()
	{
		$kriteriaCount = $this->kriteria->countAll();
		$r = [];
		$kriterias = $this->kriteria->getKriteria();
		foreach ($kriterias as $row) {
			$kriteriass = $this->kriteria->getOneKriteria2($row->id_kriteria);
			foreach ($kriteriass as $roww) {
				$pcs = explode("C", $roww->id_kriteria);
				$c = $kriteriaCount - $pcs[1];
			}
			if ($c>=1) {
				$r[$row->id_kriteria] = $c;
			}
		}

		$no=1;
		foreach ($r as $k => $v) {
			for ($i=1; $i<=$v; $i++) {
				$pcs = explode("C", $k);
				$nid = "C".($pcs[1]+$i);
				$aa = $this->input->post($k.$no);
				$bb = $this->input->post('nl'.$no);
				$cc = $this->input->post($nid.$no);
				$data = [
					'kriteria_pertama'       => $aa,
					'nilai_analisa_kriteria' => $bb,
					'hasil_analisa_kriteria' => 0,
					'kriteria_kedua'        => $cc
				];
				$data2 = [
					'kriteria_pertama'       => $cc,
					'nilai_analisa_kriteria' => 1/$bb,
					'hasil_analisa_kriteria' => 0,
					'kriteria_kedua'        => $aa
				];

				if ($this->model->insert('analisa_kriteria', $data)) {
				// ...
				} else {
					$this->model->update($_POST[$k.$no], $_POST['nl'.$no], $_POST[$nid.$no]);
				}

				if ($this->model->insert('analisa_kriteria', $data2)) {
				// ...
				} else {
					$this->model->update($_POST[$nid.$no], 1/$_POST['nl'.$no], $_POST[$k.$no]);
				}
				$no++;
			}
		}
		$datax = [
			'kriteria' => $this->kriteria->getKriteria(),
			'count'    => $kriteriaCount

		];
		$this->load->view('header', $datax);
		$this->load->view('analisa_kriteria_tabel', $datax);
		$this->load->view('footer', $datax);
	}	
}
