<?php

class Account_model extends CI_Model {
	
	function login($email, $password) {
	
		$query = $this->db->from('Account')->where('email', $email)->where('password', $password)->limit(1)->get();
		
		if($query->num_rows > 0) {
			return $query->row();
		}
		
		return false;
	}
}
?>