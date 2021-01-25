<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Olahraga extends CI_Controller {

	public function __construct(Type $var = null) {
		parent::__construct();	
		$this->load->model('m_olahraga');
		if ($this->session->userdata('role') != "admin") {
			redirect(base_url("admin/login"));
		}
	}
	
	public function index()
	{
		$data['olahraga'] = $this->m_olahraga->getAll()->result();
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/olahraga/index', $data);
		$this->load->view('admin/layout/footer');
	}

	public function save()
	{
		$data = array(
			'nama_olahraga' => $this->input->post('nama_olahraga'),
			'kalori_per_menit' => $this->input->post('kalori_per_menit')
		);
		$this->db->insert("jenis_olahraga", $data);
		redirect(base_url("olahraga"));
	}

	public function delete($id)
	{
		if (!$this->m_olahraga->delete($id)) 
        {
            $error = array('error' => $this->upload->display_errors());
			
            redirect(base_url("olahraga"));
        } 
        else 
        {
			$this->m_olahraga->delete($id);
			redirect(base_url("olahraga"));
        }
	}

	public function update()
	{
		$id = $this->input->post('id');
		$data = array(
			'nama_olahraga' => $this->input->post('nama_olahraga'),
			'kalori_per_menit' => $this->input->post('kalori_per_menit'),
		);
		$this->m_olahraga->update($data, $id);
		redirect(base_url("olahraga"));
	}
}
