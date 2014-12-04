<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {

	public function login() {
		
		if (!empty($_POST)) {
			$array = array(
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password'),
				'remember' => $this->input->post('rememberme')
			);
		
			//print_r($array);
		
			$this->load->model('Account_model', 'account');
			$result = $this->account->getAll();
		}
		else {
			$this->load->view('account/login');
		}
	}
}