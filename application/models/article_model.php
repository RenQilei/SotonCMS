<?php

class Article_model extends CI_Model {
	
	function listarticle() {
		
		$query = $this->db->from('Article')->where('isdeleted', '0')->order_by('id', 'DESC')->get();
		
		return $query->result();
	}
	
	function singlearticle($id) {
		
		$query = $this->db
					  ->select('ar.id, ar.title, ar.contents, ar.writer, ac.name, ar.datetime')
					  ->from('Article as ar')
					  ->join('Account as ac', 'ac.id = ar.writer')
					  ->where('ar.id', $id)
					  ->get();
		
		return $query->result();
	}
}
?>