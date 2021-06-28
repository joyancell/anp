<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

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
		$this->load->view('profil', $data);
		$this->load->view('footer', $data);
	}

	public function update()
	{
		$nama_lengkap = $this->input->post('nl');
		$username     = $this->input->post('un');
		$password     = $this->input->post('pw');

		if ($password == '') {
			$data = [
				'nama_lengkap' => $nama_lengkap,
				'username'     => $username
			];
		}else{
			$data = [
				'nama_lengkap' => $nama_lengkap,
				'username'     => $username,
				'password'     => md5($password)
			];
		}
		$this->db->update('pengguna', $data);
		$datax = [
				'nama_lengkap' => $nama_lengkap,
				'username'     => $username,
			];
			$this->session->set_userdata($datax);
		redirect('Profil');
	}

	public function logout()
	{
		$this->session->unset_userdata('nama_lengkap');
		$this->session->unset_userdata('id_pengguna');
		$this->session->unset_userdata('role');
		$this->session->unset_userdata('username');
		redirect('Auth');
	}
}
