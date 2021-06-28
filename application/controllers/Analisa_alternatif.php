<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analisa_alternatif extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Analisa_alternatif_model', 'model');
		$this->load->model('Kriteria_model', 'kriteria');
		$this->load->model('Nilai_model', 'nilai');
	}

	public function index()
	{
		
		$data = [
			// 'r' => $r

		];
		$this->load->view('header', $data);
		$this->load->view('analisa_alternatif', $data);
		$this->load->view('footer', $data);
	}
	public function tabel_analisa_alternatif()
	{

		$altkriteria = $this->input->post('kriteria');

		if (isset($altkriteria)) {
			$this->model->readKri($altkriteria);
			$count = $this->model->countAll();

			if (isset($_POST['submit'])) {
				$altCount = $this->model->countByFilter();

				$no  = 1; 
				$r   = []; 
				$nid = [];
				$alt1 = $this->model->readByFilter();
				foreach ($alt1 as $row) {
					$alt2 = $this->model->readByFilter();
					foreach ($alt2 as $roww) {
						$nid[$row->id_alternatif][] = $roww->id_alternatif;
					}
					$total = $altCount - $no;
					if ($total >= 1) {
						$r[$row->id_alternatif] = $total;
					}
					$no++;
				}
				$ni = 1;
				foreach ($nid as $key => $value) {
					array_splice($nid[$key], 0, $ni++);
				}
				$ne = count($nid)-1;
				array_splice($nid, $ne, 1);
				$no = 1; 
				foreach ($r as $k => $v) {
					$j=0; 
					for ($i=1; $i<=$v; $i++) {
						$data = [
							'alternatif_pertama'       => $this->input->post($k.$no),
							'nilai_analisa_alternatif' => $this->input->post('nl'.$no),
							'hasil_analisa_alternatif' => '',
							'alternatif_kedua'         => $this->input->post($nid[$k][$j].$no),
							'id_kriteria'              => $altkriteria
						];
						$data2 = [
							'alternatif_pertama'       => $this->input->post($nid[$k][$j].$no),
							'nilai_analisa_alternatif' => 1/$this->input->post('nl'.$no),
							'hasil_analisa_alternatif' => '',
							'alternatif_kedua'         => $this->input->post($k.$no),
							'id_kriteria'              => $altkriteria
						];
						if ($this->model->insert('analisa_alternatif', $data)) {
							// kode
						} else {
							$data = [
								'nilai_analisa_alternatif' => $this->input->post('nl'.$no)
							];
							$where = [
								'alternatif_pertama' => $this->input->post($k.$no),
								'alternatif_kedua'   => $this->input->post($nid[$k][$j].$no),
								'id_kriteria'        => $altkriteria,
							];
							$this->model->update('analisa_alternatif', $data, $where);
						}

						if ($this->model->insert('analisa_alternatif', $data2)) {
						// ...
						} else {
							$data = [
								'nilai_analisa_alternatif' => 1 / $this->input->post('nl'.$no)
							];
							$where = [
								'alternatif_pertama' => $this->input->post($nid[$k][$j].$no),
								'alternatif_kedua'   => $this->input->post($k.$no),
								'id_kriteria'        => $altkriteria,
							];
							$this->model->update('analisa_alternatif', $data, $where);
						}
						$no++; $j++;
					}
				}
			}
			$datax = [
				'kriteria' => $this->model->readKri($altkriteria),
				'altkriteria' => $altkriteria
			];
			
			$this->load->view('header', $datax);
			$this->load->view('analisa_alternatif_tabel', $datax);
			$this->load->view('footer', $datax);
		}	
	}

}