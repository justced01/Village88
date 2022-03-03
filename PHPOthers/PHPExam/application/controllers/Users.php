<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Users extends CI_Controller {
		/**
		 * DOCU: This function is to render the login page 
		 * Owned by: Cedrick Dela Carcel
		 */
		public function index(){
			$this->session->set_userdata(array('status' => 'inactive'));
			$data['header'] = array(
                'title' => 'Login',
				'userBtn' => 'Register',
				'anchor' => 'register',
				'status' => $this->session->userdata('status')
            );
			$this->load->view('components/header', $data);
			$this->load->view('users/login');
		}
		/**
		 * DOCU: This function is to render the login page 
		 * Owned by: Cedrick Dela Carcel
		 */
		public function login(){
			$data['header'] = array(
                'title' => 'Login',
				'userBtn' => 'Register',
				'anchor' => 'register',
				'status' => $this->session->userdata('status')
            );
			$this->load->view('components/header', $data);
			$this->load->view('users/login');
		}
		/**
		 * DOCU: This function is to render the registration page 
		 * Owned by: Cedrick Dela Carcel
		 */
		public function register(){
			$data['header'] = array(
                'title' => 'Register',
				'userBtn' => 'Login',
				'anchor' => 'login',
				'status' => $this->session->userdata('status')
            );
			$this->load->view('components/header', $data);
			$this->load->view('users/register');
		}
		/**
		 * DOCU: This function is to validate and process the post data from login page 
		 * Owned by: Cedrick Dela Carcel
		 */
		public function process_login(){
			$result = $this->user->validate_login($this->input->post());
			if($result === 'valid'){
				$user = $this->user->find_user($this->input->post());
				$match = $this->user->password_match($user, $this->input->post());
				if($match === 'match' && !empty($user)){
					$user_level = $user['user_level'] === '9' ? 'admin' : 'user';
					$user_id = $user['user_id'];
					$this->session->set_userdata(array(
						'status' => 'active',
						'user_id' => $user_id,
						'user_level' => $user_level,
					));
					var_dump($this->session->userdata('status'));
					redirect('/dashboard');
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
		 * DOCU: This function is to validate and process the post data from registration page 
		 * Owned by: Cedrick Dela Carcel
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
			redirect('/');   
		}

		public function wala(){
			// Read new token and assing in $data['token']
			$data['token'] = $this->security->get_csrf_hash();

			echo json_encode($data);
		}
	}
