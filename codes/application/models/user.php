<?php 
    if(!defined('BASEPATH')) exit('No direct script access allowed');
    class User extends CI_Model {
        /**
         * DOCU: This query is to check if admin exist in the database
         * Owned by: Cedrick Dela Carcel
         */
        public function admin_exist(){
            return $this->db->query('SELECT * FROM users LEFT JOIN roles ON roles.id = users.role_id WHERE users.role_id = 1')->row_array();
        }
        /**
         * DOCU: This query is to check and find user if exist in the database
         * Owned by: Cedrick Dela Carcel
         */
        public function find_user($post){
            return $this->db->query("SELECT * FROM users WHERE email = ?", array($this->security->xss_clean($post['email'])))->row_array();
        }
        /**
         * DOCU: This query is to check and find user if exist in the database
         * Owned by: Cedrick Dela Carcel
         */
        public function password_match($user, $post){
            $encrypted_password = $this->security->xss_clean(md5($post['password'] . '' . $user['salt']));
            if($encrypted_password !== $user['password']){
                return array('Incorrect email/password.');
            }
            return 'match';
        }
        /**
         * DOCU: This function is to query and insert new user from registration page
         * Owned by: Cedrick Dela Carcel
         */
        public function create_user($post){
            empty($this->user->admin_exist()) ? $role_id = 1 : $role_id = 2; // User Level
            $salt = bin2hex(openssl_random_pseudo_bytes(22));
            $query = "INSERT INTO users(role_id, first_name, last_name, email, password, salt, created_at, updated_at) VALUES (?,?,?,?,?,?,NOW(),NOW())";
            $values = array(
                $role_id,
                $this->security->xss_clean($post['first_name']), 
                $this->security->xss_clean($post['last_name']), 
                $this->security->xss_clean($post['email']), 
                $this->security->xss_clean(md5($post['password'] . '' . $salt)), 
                $salt);
            return $this->db->query($query, $values);
        }
        /**
         * DOCU: This function is to validate the post data from registration page
         * Owned by: Cedrick Dela Carcel
         */
        public function validate_registration(){
            $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
            $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');
            if(!$this->form_validation->run()){
                return array(validation_errors());
            } 
            return 'valid';
        }
        /**
         * DOCU: This function is to validate the post data from login
         * Owned by: Cedrick Dela Carcel
         */
        public function validate_login(){
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
            if(!$this->form_validation->run()){
                return array(validation_errors());
            } 
            return 'valid';
        }
    }