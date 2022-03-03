<?php 
    if(!defined('BASEPATH')) exit('No direct script access allowed');

    class User extends CI_Model {
        /**
         * DOCU: This function is to process the post data from login page and will insert in the database
         * Owner: Cedrick Dela Carcel
         */
        function create_user($post){
            if($this->check_admin_exist() === null){
                $user_level = 9; // Admin Level
            }
            else {
                $user_level = 1; // User Level
            }
            $salt = bin2hex(openssl_random_pseudo_bytes(22));
            $query = "INSERT INTO users (first_name, last_name, email, password, salt, user_level, created_at, updated_at) VALUES (?,?,?,?,?,?,?,?)";
            $values = array(
                $this->security->xss_clean($post['first_name']),
                $this->security->xss_clean($post['last_name']),
                $this->security->xss_clean($post['email']),
                $this->security->xss_clean(md5($post['password'] . '' . $salt)),
                $salt, $user_level, date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
            $id = $this->db->insert_id($this->db->query($query, $values));
            return $id;
        }
        /**
         * DOCU: This function is to process the post data from edit profile page and will update the user in the database
         * Owner: Cedrick Dela Carcel
         */
        function edit_user($post, $user){
            $post_action = $this->security->xss_clean($post['action']);
            if($post_action === 'form1'){
                $query = "UPDATE users SET first_name = ?, last_name = ?, email = ?, updated_at = ? WHERE id = ?";
                $values = array(
                    $this->security->xss_clean($post['first_name']),
                    $this->security->xss_clean($post['last_name']),
                    $this->security->xss_clean($post['email']),
                    date("Y-m-d, H:i:s"), $user['id']
                );  
                return $this->db->query($query, $values);
            }
            else if ($post_action === 'form2'){
                $salt = bin2hex(openssl_random_pseudo_bytes(22));
                $query = "UPDATE users SET password = ?, salt = ?, updated_at = ? WHERE id = ?";
                $values = array(
                    $this->security->xss_clean(md5($post['password'] . '' . $salt)),
                    $salt, date("Y-m-d, H:i:s"), $user['id']
                );  
                return $this->db->query($query, $values);
            }
        }
        /**
         * DOCU: This function is to check the parameters from login controller if user exist in the database.
         * Owner: Cedrick Dela Carcel
         */
        function user_match($user, $post){
            $encrypted_password = md5($post['password'] . '' . $user['salt']);
            if($user && $encrypted_password !== $user['password']){
                return array('Incorrect email/password.');
            }
            return 'success';
        }
        /**
         * DOCU: This function is to get the info of user from post data of login page where email is match in the database. 
         * Owner: Cedrick Dela Carcel
         */
        function find_user($email){
            return $this->db->query("SELECT * FROM users WHERE email = ?", array($this->security->xss_clean($email)))->row_array();
        }
        /**
         * DOCU: This function is to get the specific info of user from post data of edit page where id is match in the database. 
         * Owner: Cedrick Dela Carcel
         */
        function get_user($id){
            return $this->db->query("SELECT * FROM users WHERE id = ?", array($this->security->xss_clean($id)))->row_array();
        }
        /**
         * DOCU: This function is to check the post data from login page if admin exist in the database.
         * Owner: Cedrick Dela Carcel
         */
        function check_admin_exist(){
            return $this->db->query("SELECT * FROM users WHERE user_level = 9")->row_array();
        }
        /**
         * DOCU: This function is to validate the post data from registration page.
         * Owner: Cedrick Dela Carcel
         */
        function validate_registration(){
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
         * DOCU: This function is to validate the post data from login page.
         * Owner: Cedrick Dela Carcel
         */
        function validate_login(){
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
            if(!$this->form_validation->run()){
                return array(validation_errors());
            } 
            return 'valid';
        }
        /**
         * DOCU: This function is to validate the post data from registration page.
         * Owner: Cedrick Dela Carcel
         */
        function validate_edit_profile(){
            if($this->input->post('action') === 'form1'){
                $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
                $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            }
            else if ($this->input->post('action') === 'form2'){
                $this->form_validation->set_rules('old_password', 'Old Password', 'trim|required|min_length[8]');
                $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
                $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');
            }
            if(!$this->form_validation->run()){
                return array(validation_errors());
            } 
            return 'valid';
        }
    }