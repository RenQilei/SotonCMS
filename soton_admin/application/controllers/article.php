<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends MY_Controller {
	
	public function addarticle() {
	
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
		
		$this->load->vars($data);
		
		$this->load->view('shared/admin_header');
		$this->load->view('shared/admin_sidebar');
		$this->load->view('article/manage_article');
		$this->load->view('shared/admin_footer');
	}
}