<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends MY_Controller {
	
	public function addarticle() {
	
		if (!empty($_POST)) {
		
			$this->load->library('form_validation');
			$this->form_validation->set_rules('title', 'title', 'required|min_length[5]|max_length[50]');
			$this->form_validation->set_rules('contents', 'content', 'required');
			$this->form_validation->set_rules('tags', 'tag', 'required');
			
			if($this->form_validation->run() !== false) {
				$title = $this->input->post('title');
				$contents = $this->input->post('contents');
				$tags = preg_split('[,]',$this->input->post('tags'));
				$writer = $this->session->userdata('account')->id;
				
				$this->load->model('Article_model', 'article');
				$result = $this->article->addarticle($title, $contents, $tags, $writer);
				
				if ($result) {
					redirect('article/managearticle');
				}
			}
		}
		
		$account = $this->session->userdata('account');
		$data['name'] = $account->name;
		$data['level'] = $account->level;
		
		$this->load->vars($data);
		
		$this->load->view('shared/admin_header');
		$this->load->view('shared/admin_sidebar');
		$this->load->view('article/add_article');
		$this->load->view('shared/admin_footer');
	}
	
	public function updatearticle() {
		
		if ($_POST) {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('title', 'title', 'required|min_length[5]|max_length[50]');
			$this->form_validation->set_rules('contents', 'content', 'required');
			$this->form_validation->set_rules('tags', 'tag', 'required');
			
			if($this->form_validation->run() !== false) {
				$id = $this->input->post('id');
				$title = $this->input->post('title');
				$contents = $this->input->post('contents');
				$tags = preg_split('[,]',$this->input->post('tags'));
				$writer = $this->session->userdata('account')->id;
				//echo $id.'<br />'.$title.'<br />'.$contents.'<br />'.$writer; print_r($tags);
				
				$this->load->model('Article_model', 'article');
				$result = $this->article->updatearticle($id, $title, $contents, $tags, $writer);
				
				if ($result) {
					redirect('article/managearticle');
				}
			}
		}
		if($this->uri->segment(3)) {
			$account = $this->session->userdata('account');
			$data['name'] = $account->name;
			$data['level'] = $account->level;
		
			// get for the article
			$this->load->model('Article_model', 'article');
			$articleResult = $this->article->singlearticle($this->uri->segment(3)); //print_r($articleResult);
			$data['article'] = $articleResult[0];
			// get for the tags
			$this->load->model('Tag_model', 'tag');
			$tagResult = $this->tag->tagsForOneArticle($this->uri->segment(3));
			$data['tags'] = $tagResult;
			
			$this->load->vars($data);
		
			$this->load->view('shared/admin_header');
			$this->load->view('shared/admin_sidebar');
			$this->load->view('article/update_article');
			$this->load->view('shared/admin_footer');
		}
		else {
			
		}
	}
	
	public function publisharticle() {
		if($this->uri->segment(3)) {
			$this->load->model('Article_model','article');
			$query = $this->article->publisharticle($this->uri->segment(3));
			if($query) {
				redirect('article/managearticle');
			}
		}
	}
	
	public function deletearticle() {
		
		if($this->uri->segment(3)) {
			$this->load->model('Article_model','article');
			$query = $this->article->deletearticle($this->uri->segment(3));
			if($query) {
				redirect('article/managearticle');
			}
		}
	}
	
	public function managearticle() {
		
		$account = $this->session->userdata('account');
		$data['name'] = $account->name;
		$data['level'] = $account->level;
		
		$this->load->model('Article_model', 'article');
		if ($account->level == 2) {
			$publishResult = $this->article->listarticle();
			$unpublishResult = $this->article->un_listarticle();
		}
		else {
			$publishResult = $this->article->listArticleOfWriter($account->id); //echo $account->id;
			$unpublishResult = $this->article->un_listArticleOfWriter($account->id);
		}
		$data['articlelist'] = $publishResult; //print_r($result);
		$data['unarticlelist'] = $unpublishResult;
		
		$this->load->vars($data);
		
		$this->load->view('shared/admin_header');
		$this->load->view('shared/admin_sidebar');
		$this->load->view('article/manage_article');
		$this->load->view('shared/admin_footer');
	}
}