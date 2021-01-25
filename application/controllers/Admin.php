<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();		
		$this->load->model('m_login');
		
	}

	public function index()
	{
		if ($this->session->userdata('role') != "admin") {
			redirect(base_url("/"));
		}
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/dashboard');
		$this->load->view('admin/layout/footer');
	}

	public function login()
	{
		$this->load->view('admin/login');
	}

	public function doLogin()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => $password,
			'role' => '0'
		);
		$data['user'] = $this->m_login->login($where);

		if($data['user'] != ""){
 
			$data_session = array(
				'username' => $username,
				'nama' => $data['user']->nama,
				'role' => "admin"
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url("admin"));
 
		}else{
			redirect(base_url("admin/login"));
		}
	}

	public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url('/admin/login'));
    }

}
