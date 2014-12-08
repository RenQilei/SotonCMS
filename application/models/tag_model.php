<?php

class Tag_model extends CI_Model {
	
	function alltags() {
		
		$query = $this->db->from('Article')->order_by('id', 'DESC')->get();
		
		return $query->result();
	}
	
	function tagsForOneArticle($id) {
		
		$query = $this->db
					  ->select('artag.tag, ta.name')
					  ->from('Article_Tag as artag')
					  ->join('Tag as ta', 'ta.id = artag.tag')
					  ->where('artag.article', $id)
					  ->get();
		
		return $query->result();
	}
}
?>