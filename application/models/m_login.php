<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {
	
	public function login($where)
	{
		return $this->db->get_where('users', [
			'username' => $where['username'],
			'password' => $where['password'],
			'role' => $where['role']
		])->row();
	}
}
