<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!isset($this->session->username)) {
			redirect('Auth');
		}
		$this->load->model('Admin_model', 'model');
	}

	public function index()
	{
		$data = [
			'nilai'    => $this->model->getNilai(),
			'kriteria' => $this->model->getKriteria(),
			'skor'     => $this->model->getSkor(),
			'filter'   => $this->model->filter(),
		];
		$this->load->view('header', $data);
		$this->load->view('home', $data);
		$this->load->view('footer', $data);
	}
}
