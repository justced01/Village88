<?php 
    if(!defined('BASEPATH')) exit('No direct script access allowed');

    class Message extends CI_Model {
        /**
         * DOCU: This function is to get all the messages of all users from the database and display in show page
         * Owner: Cedrick Dela Carcel
         */
        function get_messages($id){
            $query = "SELECT messages.id AS message_id, message AS message_content, 
            messages.created_at AS message_date, CONCAT(first_name,' ',last_name) AS message_sender_name 
            FROM messages 
            LEFT JOIN users ON messages.user_id = users.id 
            LEFT JOIN products ON messages.product_id = products.id 
            WHERE products.id = ?
            ORDER BY messages.created_at DESC";
            $values = array($id);
            return $this->db->query($query, $values)->result_array();
        }
        /**
         * DOCU: This function is to process and store the post message data from show page to the database
         * Owner: Cedrick Dela Carcel
         */
        function add_message($post, $user_id){
            $query = "INSERT INTO messages(user_id, message, created_at, updated_at) VALUES (?,?,?,?)";
            $values = array(
                $this->security->xss_clean($user_id),
                $this->security->xss_clean($post['product_id']),
                $this->security->xss_clean($post['message']),
                date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
            $id = $this->db->insert_id($this->db->query($query, $values));
            return $id;
        }
        /**
         * DOCU: This function is to validate the post message data from show page 
         * Owner: Cedrick Dela Carcel
         */
        function validate_message(){
            $this->form_validation->set_rules('message', 'Message', 'trim|required|min_length[2]|max_length[250]');
            if(!$this->form_validation->run()){
                return array(validation_errors());
            } 
            return 'valid';
        }
    }