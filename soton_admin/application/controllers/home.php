<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	
	public function index() {
		
		$account = $this->session->userdata('account');
		$data['name'] = $account->name;
		$data['level'] = $account->level;
		
		$this->load->model('Article_model', 'article');
		$nopaResult = $this->article->numberOfPubisedArticle();
		$data['publishedarticlenumber'] = $nopaResult;
		$nouaResult = $this->article->numberOfUnpubisedArticle();
		$data['unpublishedarticlenumber'] = $nouaResult;
		$this->load->model('Article_model', 'article');
		$unopaResult = $this->article->numberOfPubisedArticleOfWriter($account->id);
		$data['userpublishedarticlenumber'] = $unopaResult;
		$unouaResult = $this->article->numberOfUnpubisedArticleOfWriter($account->id);
		$data['userunpublishedarticlenumber'] = $unouaResult;
		
		$this->load->vars($data);
		
		$this->load->view('shared/admin_header');
		$this->load->view('shared/admin_sidebar');
		$this->load->view('home/dashboard');
		$this->load->view('shared/admin_footer');
	}
}