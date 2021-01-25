<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
		parent::__construct();		
		$this->load->model('m_login');
		$this->load->model('m_makanan');
		$this->load->model('m_olahraga');
	}
	
	public function index()
	{
		
		if ($this->session->userdata('role') != "user") {
			redirect(base_url("/"));
		}
		$id_user = $this->session->userdata('id');
		$data['profil'] = $this->m_makanan->getProfil($id_user)->result();
		$data['olahraga'] = $this->m_olahraga->getProfil($id_user)->result();
		$this->load->view('layout/header');
		$this->load->view('profil', $data);
		$this->load->view('layout/footer');
	}

	public function login()
	{
		$where = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'role' => '1'
		);


		$data['user'] = $this->m_login->login($where);
		

		if($data['user'] != ""){
 
			$data_session = array(
				'id' => $data['user']->id,
				'username' => $data['user']->username,
				'nama' => $data['user']->nama,
				'role' => "user"
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(site_url('/user'));
 
		}else{
			redirect(site_url('/'));
		}
	}

	public function register()
	{
		$data = array(
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'role' => '1'
		);
		$this->db->insert('users', $data);
		redirect(site_url('/'));
	}

	public function kalori()
	{
		if ($this->session->userdata('role') != "user") {
			redirect(base_url("/"));
		}
		$data['makanan'] = $this->m_makanan->getAll()->result();
		$this->load->view('layout/header');
		$this->load->view('kalori', $data);
		$this->load->view('layout/footer');
	}

	public function detail_kalori($tgl)
	{
		if ($this->session->userdata('role') != "user") {
			redirect(base_url("/"));
		}
		$id_user = $this->session->userdata('id');
		$data['makanan'] = $this->m_makanan->getDetailKalori($tgl, $id_user)->result();
		$data['tgl'] = $tgl;
		$this->load->view('layout/header');
		$this->load->view('kalori-detail', $data);
		$this->load->view('layout/footer');
	}

	public function saveKalori()
	{
		if ($this->session->userdata('role') != "user") {
			redirect(base_url("/"));
		}
		for ($i=0; $i < count($this->input->post('id_makanan')); $i++) { 
			$data[] = array(
				'tgl' => $this->input->post('tgl'),
				'id_user' => $this->session->userdata('id'),
				'id_makanan' => $this->input->post('id_makanan')[$i],
				'jumlah_kalori' => $this->input->post('jumlah_kalori')[$i]
			);
		}
		// var_dump($data);
		// die;
		$this->db->insert_batch('detail_kalori', $data);
		redirect(site_url('/user'));
	}

	public function saveOlahraga()
	{
		if ($this->session->userdata('role') != "user") {
			redirect(base_url("/"));
		}
		$data = array(
			'id_user' => $this->session->userdata('id'),
			'tgl' => $this->input->post('tgl'),
			'jumlah_kalori' => $this->input->post('jumlah_kalori'),
			'id_olahraga' => $this->input->post('id_olahraga'),
			'jumlah_menit' => $this->input->post('jumlah_menit')
		);
		// var_dump($data);
		// die;
		$this->db->insert('detail_olahraga', $data);
		redirect(site_url('/user'));
	}

	public function olahraga()
	{
		if ($this->session->userdata('role') != "user") {
			redirect(base_url("/"));
		}
		$data['olahraga'] = $this->m_olahraga->getAll()->result();
		$this->load->view('layout/header');
		$this->load->view('olahraga', $data);
		$this->load->view('layout/footer');
	}

	public function detail_olahraga($tgl)
	{
		if ($this->session->userdata('role') != "user") {
			redirect(base_url("/"));
		}
		$id_user = $this->session->userdata('id');
		$data['olahraga'] = $this->m_olahraga->getDetailOlahraga($tgl, $id_user)->result();
		$data['tgl'] = $tgl;
		$this->load->view('layout/header');
		$this->load->view('olahraga-detail', $data);
		$this->load->view('layout/footer');
	}

	public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url('/'));
    }
}
