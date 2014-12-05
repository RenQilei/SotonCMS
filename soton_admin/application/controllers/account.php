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
	
	public function adduser() {
		
		if (!empty($_POST)) {
		
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name', 'name', 'required|min_length[5]|max_length[20]|is_unique[account.name]');
			$this->form_validation->set_rules('email', 'email', 'required|valid_email|max_length[30]');
			$this->form_validation->set_rules('password', 'password', 'required|max_length[20]');
			
			if($this->form_validation->run() !== false) {
				$name = $this->input->post('name');
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$level = $this->input->post('level');
				
				$this->load->model('Account_model', 'account');
				$result = $this->account->adduser($name, $email, $password, $level);
			}
		}
		
		$account = $this->session->userdata('account');
		
		$data['name'] = $account->name;
		$data['level'] = $account->level;
		$this->load->vars($data);
		
		$this->load->view('shared/admin_header');
		$this->load->view('shared/admin_sidebar');
		$this->load->view('account/add_user');
		$this->load->view('shared/admin_footer');
	}
}