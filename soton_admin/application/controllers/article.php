<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends MY_Controller {
	
	public function addarticle() {
		$this->load->view('shared/admin_header');
		$this->load->view('article/add_article');
		$this->load->view('shared/admin_footer');
	}
}