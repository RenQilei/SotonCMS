<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller {
	
	public function adduser() {
		
		if (!empty($_POST)) {
		
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name', 'name', 'required|min_length[5]|max_length[20]|is_unique[Account.name]');
			$this->form_validation->set_rules('email', 'email', 'required|valid_email|max_length[30]|is_unique[Account.email]');
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
		$this->load->view('user/add_user');
		$this->load->view('shared/admin_footer');
	}
	
	public function manageuser() {
		
		$account = $this->session->userdata('account');
		$data['name'] = $account->name;
		$data['level'] = $account->level;
		
		$this->load->model('Account_model', 'account');
		$result = $this->account->listuser();
		$data['userlist'] = $result;
		
		$this->load->vars($data);
		
		$this->load->view('shared/admin_header');
		$this->load->view('shared/admin_sidebar');
		$this->load->view('user/manage_user');
		$this->load->view('shared/admin_footer');
	}
}