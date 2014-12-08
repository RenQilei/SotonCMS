<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		
		$this->load->model('Article_model', 'article');
		$result = $this->article->listarticle();
		$data['articlelist'] = $result;
		
		$this->load->vars($data);
		
		$this->load->view('shared/leftside');
		$this->load->view('home/index');
		$this->load->view('shared/footer');
	}
}