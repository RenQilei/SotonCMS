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
	
	function updatearticle($articleId, $title, $contents, $tags, $writer) {
		
		$date = date_create();
		$articleData = array(
			'title' => $title,
			'contents' => $contents,
			'writer' => $writer,
			'datetime' => date_timestamp_get($date)
		);
		
		$articleQuery = $this->db->where('id', $articleId)->update('Article', $articleData);
		//print_r($tags);
		foreach($tags as $temp) {
			$item = trim($temp);
			$query = $this->db->select('artag.id')->from('Article_Tag as artag')->join('Tag as tag', 'artag.tag = tag.id')->where('artag.article', $articleId)->where('tag.name', $item)->get();
			
			//echo '<br />'; var_dump($item); print_r($query->result());
			if($query->num_rows == 0) {
			
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
		}
		
		return true;
	}
	
	function deletearticle($id) {
		$data['isdeleted'] = 1;
		$query = $this->db->where('id', $id)->update('Article', $data);
		
		return $query;
	}
	
	function listarticle() {
		
		$query = $this->db->from('Article')->where('isdeleted', '0')->get();
		
		return $query->result();
	}
	
	function listArticleOfWriter($writer) {
		
		$query = $this->db->from('Article')->where('writer', $writer)->where('isdeleted', '0')->get();
		
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