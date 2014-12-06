<?php

class Article_model extends CI_Model {
	
	function addarticle($title, $contents, $tags, $writer) {
		
		$date = date_create();
		$articleData = array(
			'title' => $title,
			'contents' => $contents,
			'writer' => $writer,
			'datetime' => date_timestamp_get($date)
		);
		
		$articleQuery = $this->db->insert('Article', $articleData);
		$articleId = $this->db->insert_id();
		
		foreach($tags as $item) {
			$query = $this->db->select('id')->from('Tag')->where('name', $item)->get();
			if($query->num_rows > 0) {
				$result = $query->row();
				$articleTagData = array(
					'article' => $articleId,
					'tag' => $result->id
				);
				
				$articleTagQuery = $this->db->insert('Article_Tag', $articleTagData);
			}
			else {
				
				$tagData['name'] = $item;
				$tagQuery = $this->db->insert('Tag', $tagData);
				$tagId = $this->db->insert_id();
				
				$articleTagData = array(
					'article' => $articleId,
					'tag' => $tagId
				);
				$articleTagQuery = $this->db->insert('Article_Tag', $articleTagData);
			}
		}
		
		return true;
	}
	
	function listarticle() {
		
		$query = $this->db->from('Article')->get();
		
		return $query->result();
	}
}
?>