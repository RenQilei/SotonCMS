<?php

class Account_model extends CI_Model {
	
	function login($email, $password) {
	
		$query = $this->db->from('Account')->where('email', $email)->where('password', $password)->limit(1)->get();
		
		if($query->num_rows > 0) {
			return $query->row();
		}
		
		return false;
	}
	
	function adduser($name, $email, $password, $level) {
		
		$data = array(
			'name' => $name,
			'email' => $email,
			'password' => $password,
			'level' => $level
		);
		
		$query = $this->db->insert('Account', $data);
		
		return $query;
	}
	
	function listuser() {
		
		$query = $this->db->select('ac.id, ac.name, ac.email, au.title')->from('Account as ac')->join('Authority as au', 'ac.level = au.level')->get();
		
		return $query->result();
	}
}
?>