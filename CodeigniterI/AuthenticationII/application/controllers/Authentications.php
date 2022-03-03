<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Authentications extends CI_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->library('form_validation');
			$this->load->model('Authentication');
		}

		public function index(){
			$this->load->view('index');
		}
		public function profile(){
			$this->load->view('users/profile');
		}

		public function create_user(){
			$this->form_validation->set_rules('firstname', 'First name', 'required|min_length[2]');
			$this->form_validation->set_rules('lastname', 'Last name', 'required|min_length[2]');
			$this->form_validation->set_rules('email', 'Email address', 'required|valid_email|trim|is_unique[users.email]',
				array('is_unique' => 'Email address has been used already.'));
			$this->form_validation->set_rules('contactnum', 'Contact number', 'required|exact_length[11]|is_unique[users.contactnum]|numeric', 
				array('is_unique' => 'Contact number has been used.'));
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
			$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|min_length[8]|matches[password]');
			if($this->form_validation->run() === FALSE){
				$this->session->set_flashdata('signup_errors', validation_errors('<p class="error">', '</p>'));
				redirect('/authentications');
			}
			else {
				$salt = bin2hex(openssl_random_pseudo_bytes(22));
				$encrypted_password = md5($this->input->post('password', TRUE) . '' . $salt);
				$data = array(
					'firstname' => $this->input->post('firstname', TRUE),
					'lastname' => $this->input->post('lastname', TRUE),
					'email' => $this->input->post('email', TRUE),
					'password' => $encrypted_password,
					'salt' => $salt,
					'contactnum' => $this->input->post('contactnum', TRUE)
				);
				$this->Authentication->insert_user($data);
				$this->session->set_flashdata('signup-success', 'Contact created successfully');
				redirect('/authentications');
			}
		}

		public function login_user(){
			$this->form_validation->set_rules('email_contactnum', 'Email address or contact number', 'required|trim');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
			$user = $this->Authentication->get_user($this->input->post('email_contactnum'));
			if($this->form_validation->run() === FALSE){
				$this->session->set_flashdata('login_errors', validation_errors('<p class="error">', '</p>'));
				redirect('/authentications');
			}
			else if(!empty($user)){
				$encrypted_password = md5($this->input->post('password', TRUE) . '' . $user['salt']);
				if($user['password'] !== $encrypted_password){
					$this->session->set_flashdata('login_errors', '<p class="error">Password does not match.</p>');
					redirect('/authentications');
				}
				else {
					$this->session->set_userdata('firstname', $user['firstname']);
					$this->session->set_userdata('lastname', $user['lastname']);
					$this->session->set_userdata('email', $user['email']);
					$this->session->set_userdata('contactnum', $user['contactnum']);
					$this->session->set_flashdata('login-success', 'Login Successfully.');
					redirect('/profile');
				}
			}
			else {
				$this->session->set_flashdata('login_errors', '<p class="error">User does not exist.</p>');
				redirect('/authentications');
			}
		}

		public function logout(){
			session_destroy();
			redirect('/authentications');
		}
	}
?>
