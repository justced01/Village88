<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    /**
     * DOCU: This function is to load the login page
     * Owner: Cedrick Dela Carcel
     */
	public function index(){
        $data['header'] = array(
            'title' => 'Login',
            'anchor' => 'Register',
            'link' => 'register'
        );
        $this->load->view('components/header', $data);
		$this->load->view('users/login');
	}
    /**
     * DOCU: This function is to load the login page
     * Owner: Cedrick Dela Carcel
     */
	public function login(){
        $data['header'] = array(
            'title' => 'Login',
            'anchor' => 'Register',
            'link' => 'register'
        );
        $this->load->view('components/header', $data);
		$this->load->view('users/login');
	}
    /**
     * DOCU: This function is to load the register page
     * Owner: Cedrick Dela Carcel
     */
	public function register(){
        $data['header'] = array(
            'title' => 'Register',
            'anchor' => 'Login',
            'link' => 'login'
        );
        $current_user_id = $this->session->userdata('user_id');
        if(!$current_user_id){
            $this->load->view('components/header', $data);
            $this->load->view('users/register');
        }
        else {
            redirect('dashboard');
        }
	}
    /**
     * DOCU: This function is to render the edit profile page
     * Owner: Cedrick Dela Carcel
     */
	public function edit(){
        $user['profile']= $this->user->get_user($this->session->userdata('user_id'));
        $data['header'] = array(
            'title' => 'Edit Profile',
            'page' => 'dashboard',
            'anchor' => 'Logout',
            'link' => 'logout',
        );
        $this->load->view('components/header', $data);
        $this->load->view('users/edit', $user);
	}
    /**
     * DOCU: This function is to process the post data from registration page
     * Owner: Cedrick Dela Carcel
     */
    public function process_register(){
        $result = $this->user->validate_registration($this->input->post());
        if($result === 'valid'){
            $this->user->create_user($this->input->post());
            redirect('dashboard');
        }
        else {
            $this->session->set_flashdata('errors', $result);
            redirect('/');
        }
    }
    /**
     * DOCU: This function is to process the post data from login page
     * Owner: Cedrick Dela Carcel
     */
    public function process_login(){
        $result = $this->user->validate_login($this->input->post());
        if($result === 'valid'){
            $user = $this->user->find_user($this->input->post('email'));
            $result = $this->user->user_match($user, $this->input->post());
            if($result === 'success' && $user !== null){
                $user_level = $user['user_level'] === '9' ? 'admin' : 'user';
                $this->session->set_userdata(array(
                    'user_id' => $user['id'],
                    'user_level' => $user_level,
                ));
                redirect('dashboard');
            }
            else {
                $result = array('Incorrect email/password.');
                $this->session->set_flashdata('errors', $result);
                redirect('login');
            }
        }
        else {
            $this->session->set_flashdata('errors', $result);
            redirect('login');
        }
    }
    /**
     * DOCU: This function is to process the post data from edit profile page
     * Owner: Cedrick Dela Carcel
     */
    public function process_edit_profile(){
        $result = $this->user->validate_edit_profile($this->input->post());
        if($result === 'valid'){
            $user = $this->user->get_user($this->session->userdata('user_id'));
            $result = $this->input->post('action') === 'form2' ? $this->user->user_match($user, $this->input->post('old_password')) : 'success';
            if($result === 'success'){
                $this->user->edit_user($this->input->post(), $user);
                redirect('users/edit');
            }
            else {
                $this->session->set_flashdata('errors', $result);
                redirect('users/edit');
            }
        }
        else {
            $this->session->set_flashdata('errors', $result);
            redirect('users/edit');
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
}
