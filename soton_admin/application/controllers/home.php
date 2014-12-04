<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	
	public function index() {
		$this->load->view('shared/admin_header');
		$this->load->view('home/dashboard');
		$this->load->view('shared/admin_footer');
	}
}