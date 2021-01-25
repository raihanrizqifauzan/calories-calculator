<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Makanan extends CI_Controller {

	public function __construct(Type $var = null) {
		parent::__construct();	
		$this->load->model('m_makanan');
		if ($this->session->userdata('role') != "admin") {
			redirect(base_url("admin/login"));
		}
	}
	
	public function index()
	{
		$data['makanan'] = $this->m_makanan->getAll()->result();
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/makanan/index', $data);
		$this->load->view('admin/layout/footer');
	}

	public function save()
	{
		$data = array(
			'nama_makanan' => $this->input->post('nama_makanan'),
			'jumlah_kalori' => $this->input->post('jumlah_kalori'),
			'foto' => $_FILES['foto']['name'],
		);

		$config['upload_path'] = './upload/';
        $config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 2000;
 
 
		$this->load->library('upload', $config);
		
        if (!$this->upload->do_upload('foto')) 
        {
            $error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('failed',"Gagal Menyimpan");
            redirect(base_url("makanan"));
        } 
        else 
        {
			$this->session->set_flashdata('success',"Berhasil Menyimpan");
			$this->db->insert("makanan", $data);
			redirect(base_url("makanan"));
        }
	}

	public function delete($id)
	{
		if (!$this->m_makanan->delete($id)) 
        {
            $error = array('error' => $this->upload->display_errors());
			
            redirect(base_url("makanan"));
        } 
        else 
        {
			$this->m_makanan->delete($id);
			redirect(base_url("makanan"));
        }
	}

	public function update()
	{
		$id = $this->input->post('id');
		$foto = $_FILES['foto']['name'];

		if ($foto == "") {
			$data = array(
				'nama_makanan' => $this->input->post('nama_makanan'),
				'jumlah_kalori' => $this->input->post('jumlah_kalori'),
			);
			$this->m_makanan->update($data, $id);
		} else {
			$data = array(
				'nama_makanan' => $this->input->post('nama_makanan'),
				'jumlah_kalori' => $this->input->post('jumlah_kalori'),
				'foto' => $foto,
			);
			$config['upload_path'] = './upload/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = 2000;
	
	
			$this->load->library('upload', $config);
			
			if (!$this->upload->do_upload('foto')) {
				$error = array('error' => $this->upload->display_errors());
				redirect(base_url("makanan"));
			} else {
				$this->m_makanan->update($data, $id);
				redirect(base_url("makanan"));
			}
		}
        
		redirect(base_url("makanan"));
	}
}
