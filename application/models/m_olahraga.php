<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_olahraga extends CI_Model {
	
	public function getAll()
	{
		$this->db->select('*');
		$this->db->from('jenis_olahraga');
		return $this->db->get();
	}

	public function delete($id)
	{
		return $this->db->delete("jenis_olahraga", array("id" => $id));
	}

	public function update($data, $id) {
		$this->db->where('id', $id);
		return $this->db->update('jenis_olahraga', $data);
	}

	public function getProfil($id)
	{
		$this->db->select('*');
		$this->db->select('sum(jumlah_kalori) as jml');
		$this->db->select('sum(jumlah_menit) as menit');
		$this->db->from('detail_olahraga');
		$this->db->where('id_user', $id);
		$this->db->group_by('tgl');
		return $this->db->get();
	}

	public function getDetailOlahraga($tgl, $id)
	{
		$this->db->select('jenis_olahraga.*, detail_olahraga.*');
		$this->db->from('detail_olahraga');
		$this->db->join('jenis_olahraga', 'jenis_olahraga.id = detail_olahraga.id_olahraga');
		$this->db->where(['detail_olahraga.id_user' => $id, 'detail_olahraga.tgl' => $tgl]);
		return $this->db->get();
	}
	
}
