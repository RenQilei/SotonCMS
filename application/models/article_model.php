<?php

class Article_model extends CI_Model {
	
	function listarticle() {
		
		$query = $this->db->from('Article')->get();
		
		return $query->result();
	}
}
?>