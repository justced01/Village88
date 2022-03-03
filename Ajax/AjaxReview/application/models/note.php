<?php 
    if(!defined('BASEPATH')) exit('No direct script access allowed');

    class Note extends CI_Model {
        /**
         * DOCU: This query to fetch all the data from the Notes table
         * Owned by: Cedrick Dela Carcel
         */
        public function fetch_all(){
            return $this->db->query("SELECT * FROM notes ORDER BY created_at DESC")->result_array();
        }
        /**
         * DOCU: This query to insert the post data from the index page
         * Owned by: Cedrick Dela Carcel
         */
        public function insert_note($post){
            $query = "INSERT INTO notes(title, content, created_at, updated_at) VALUES(?,?,NOW(),NOW())";
            $values = array(
                $this->security->xss_clean($post['title']), 
                $this->security->xss_clean($post['content'])
            );
            return $this->db->query($query, $values);
        }
        /**
         * DOCU: This query to update the post data from the index page in the database
         * Owned by: Cedrick Dela Carcel
         */
        public function update_note($post, $id){
            $query = "UPDATE notes SET content = ?, updated_at = NOW() WHERE id = ?";
            $values = array(
                $this->security->xss_clean($post['content']),
                $this->security->xss_clean($id)
            );
            return $this->db->query($query, $values);
        }
        /**
         * DOCU: This query to delete a note from the database
         * Owned by: Cedrick Dela Carcel
         */
        public function remove_note($id){
            return $this->db->query("DELETE FROM notes WHERE id = ?", array($id));
        }
        /**
         * DOCU: This function is to validate the post data from index page
         * Owned by: Cedrick Dela Carcel
         */
        public function validate($post){
            if(isset($post['title'])){
                $this->form_validation->set_rules('title', 'Title', 'required');
            }
            $this->form_validation->set_rules('content', 'Notes', 'required');
            if(!$this->form_validation->run()){
                return array(validation_errors());
            }
            return 'valid';
        }
    }