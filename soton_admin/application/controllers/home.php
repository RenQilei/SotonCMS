<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	
	public function index() {
		
		$account = $this->session->userdata('account');
		
		$data['name'] = $account->name;
		$data['level'] = $account->level;
		$this->load->vars($data);
		
		$this->load->view('shared/admin_header');
		$this->load->view('shared/admin_sidebar');
		$this->load->view('home/dashboard');
		$this->load->view('shared/admin_footer');
	}
}