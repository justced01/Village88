<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	/**
	 * DOCU: This function is render index page
	 * Owned by; Cedrick Dela Carcel
	 */
	public function index(){
		$this->load->view('components/header_main');
		$this->load->view('index');
	}
	/**
	 * DOCU: This function is to render the login page
	 * Owned by; Cedrick Dela Carcel
	 */
	public function login(){
		$data['header'] = array(
			'title' => 'Login'
		);
		$this->load->view('components/header_main', $data);
		$this->load->view('users/login');
	}
	/**
	 * DOCU: This function is to render the register page
	 * Owned by; Cedrick Dela Carcel
	 */
	public function register(){
		$data['header'] = array(
			'title' => 'Register'
		);
		$this->load->view('components/header_main', $data);
		$this->load->view('users/register');
	}
	/**
	 * DOCU: This function is to process and validate the login user inputs 
	 * Owned by; Cedrick Dela Carcel
	 */
	public function process_login(){
		$result = $this->user->validate_login($this->input->post());
		if($result === 'valid'){
			$user = $this->user->find_user($this->input->post());
			!empty($user) ? $match = $this->user->password_match($user, $this->input->post()) : $match = array('User does not exist');
			if($match === 'match' && !empty($user)){
				$user_role = $user['role_id'] === '1' ? 'admin' : 'customer';
				$user_id = $user['user_id'];
				$this->session->set_userdata(array(
					'status' => 'active',
					'user_id' => $user_id,
					'user_level' => $user_role
				));
				$user_role === 'admin' ? redirect('orders') : redirect('products');
			}
			else {
				$this->session->set_flashdata('errors', $match);
				redirect('login');
			}
		}
		else {
			$this->session->set_flashdata('errors', $result);
			redirect('login');
		}
	}
	/**
	 * DOCU: This function is to process and validate the register user inputs 
	 * Owned by; Cedrick Dela Carcel
	 */
	public function process_register(){
		$result = $this->user->validate_registration($this->input->post());
		if($result === 'valid'){
			$this->user->create_user($this->input->post());
			$this->session->set_flashdata('success', array('Created successfully!'));
			redirect('register');
		}
		else {
			$this->session->set_flashdata('errors', $result);
			redirect('register');
		}
	}
	/**
	 * DOCU: This function logs out the current user then goes to login page.
	 * Owner: Cedrick Dela Carcel
	 */
	public function logout() {
		$this->session->sess_destroy();
		redirect('login');   
	}
}
