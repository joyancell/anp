<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (isset($this->session->username)) {
			redirect('Welcome');
		}
		$this->load->model('Admin_model', 'model');
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function login() {
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$user = $this->checkCredentials($username, $password);
		if ($user) {
			$data = [
				'nama_lengkap' => $user->nama_lengkap,
				'id_pengguna'  => $user->id_pengguna,
				'role'         => $user->role,
				'username'     => $user->username,
			];
			$this->session->set_userdata($data);
			redirect('Welcome');
		}else{
			redirect('Auth');
		}
		return false;
	}

	protected function checkCredentials($username, $password) {
		$stmt = $this->db->query("SELECT * FROM pengguna WHERE username= '$username' and password = '$password' ");

		if ($stmt->num_rows() > 0) {
			$data = $stmt->row();
			$submitted_pass = $password;
			if ($submitted_pass == $data->password) {
				return $data;
			}
		}
		return false;
	}
}
