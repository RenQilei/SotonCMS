<?php

class Account_model extends CI_Model {
	
	function login() {
	
		$result = $this->db->select('password')->from('Account')->where('email', $array['email'])->get();
		
		return $result->result();
	}
}
?>