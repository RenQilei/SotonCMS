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
					redirect('home/index');
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
	
	public function managearticle() {
		
		$account = $this->session->userdata('account');
		$data['name'] = $account->name;
		$data['level'] = $account->level;
		
		$this->load->model('Article_model', 'article');
		$result = $this->article->listarticle();
		$data['articlelist'] = $result;
		
		$this->load->vars($data);
		
		$this->load->view('shared/admin_header');
		$this->load->view('shared/admin_sidebar');
		$this->load->view('article/manage_article');
		$this->load->view('shared/admin_footer');
	}
}