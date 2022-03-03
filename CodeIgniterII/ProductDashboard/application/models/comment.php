<?php 
    if(!defined('BASEPATH')) exit('No direct script access allowed');

    class Comment extends CI_Model {
        /**
         * DOCU: This function is to get all the comment of all users from the database and display in show page
         * Owner: Cedrick Dela Carcel
         */
        function get_comments($message_id){
            $safe_message_id = $this->security->xss_clean($message_id);

            $query = "SELECT comments.message_id, 
                CONCAT(first_name,' ',last_name) AS comment_sender_name, 
                comment AS comment_content, comments.created_at AS comment_date 
                FROM comments 
                LEFT JOIN users ON comments.user_id = users.id 
                WHERE comments.message_id = ?";
            
            return $this->db->query($query, $safe_message_id)->result_array();
        }
        /**
         * DOCU: This function is to process and store the post comment data from show page to the database
         * Owner: Cedrick Dela Carcel
         */
        function add_comment($post, $user_id){
            $query = "INSERT INTO comments(user_id, message_id, comment, created_at, updated_at) VALUES (?,?,?,?,?)";
            $values = array(
                $this->security->xss_clean($user_id),
                $this->security->xss_clean($post['message_id']),
                $this->security->xss_clean($post['comment']),
                date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
            $id = $this->db->insert_id($this->db->query($query, $values));
            return $id;
        }
        /**
         * DOCU: This function is to validate the post comment data from show page 
         * Owner: Cedrick Dela Carcel
         */
        function validate_comment(){
            $this->form_validation->set_rules('comment', 'Comment', 'trim|required|min_length[2]|max_length[250]');
            if(!$this->form_validation->run()){
                return array(validation_errors());
            } 
            return 'valid';
        }
    }