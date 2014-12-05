<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {

	public function login() {
		
		if (!empty($_POST)) {
		
			$this->load->library('form_validation');
			$this->form_validation->set_rules('email', 'email', 'required|valid_email');
			$this->form_validation->set_rules('password', 'password', 'required');
			
			if($this->form_validation->run() !== false) {
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$rememberme = $this->input->post('rememberme');
		
				$this->load->model('Account_model', 'account');
				$account = $this->account->login($email, $password);
				
				if($account) {
					
					$this->session->set_userdata('account', $account);
					
					redirect('home/index');
				}
				else {
					redirect('account/login');
				}
			}
		}
		else {
			$this->load->view('account/login');
		}
	}
	
	public function logout() {
		
		$this->session->sess_destroy();
		redirect('account/login');
	}
}