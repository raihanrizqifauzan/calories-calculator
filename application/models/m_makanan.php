<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_makanan extends CI_Model {
	
	public function getAll()
	{
		$this->db->select('*');
		$this->db->from('makanan');
		return $this->db->get();
	}

	public function delete($id)
	{
		return $this->db->delete("makanan", array("id" => $id));
	}

	public function update($data, $id) {
		$this->db->where('id', $id);
		return $this->db->update('makanan', $data);
	}

	public function insertKalori($data)
	{
		return $this->db->insert('detail_kalori', $data); 
	}

	public function getProfil($id)
	{
		$this->db->select('*');
		$this->db->select('sum(jumlah_kalori) as jml');
		$this->db->from('detail_kalori');
		$this->db->where('id_user', $id);
		$this->db->group_by('tgl');
		return $this->db->get();
	}

	public function getDetailKalori($tgl, $id)
	{
		$this->db->select('*');
		$this->db->select('makanan.*');
		$this->db->from('detail_kalori');
		$this->db->join('makanan', 'makanan.id = detail_kalori.id_makanan');
		$this->db->where(['detail_kalori.id_user' => $id, 'detail_kalori.tgl' => $tgl]);
		return $this->db->get();
	}
}
