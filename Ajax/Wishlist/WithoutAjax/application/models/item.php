<?php 
    if(!defined('BASEPATH')) exit('No direct script access allowed');

    class Item extends CI_Model {
        /**
         * DOCU: This query to process and insert the post data to the database
         * Owned by: Cedrick Dela Carcel
         */
        public function fetch_all(){
            return $this->db->query("SELECT * FROM wishlist")->result_array();
        }
        /**
         * DOCU: This query to process and insert the post data to the database
         * Owned by: Cedrick Dela Carcel
         */
        public function insert($post){
            $query = "INSERT INTO wishlist(item, created_at, updated_at) VALUES(?,NOW(),NOW())";
            $values = array(
                $this->security->xss_clean($post['item'])
            );
            return $this->db->query($query, $values);
        }
        /**
         * DOCU: This query to process and update a single data to the database
         * Owned by: Cedrick Dela Carcel
         */
        public function update($post, $id){
            $query = "UPDATE wishlist SET item = ?, updated_at = NOW() WHERE id = ?";
            $values = array(
                $this->security->xss_clean($post['item']),
                $this->security->xss_clean($id)
            );
            return $this->db->query($query, $values);
        }
        /**
         * DOCU: This query to validate the post data
         * Owned by: Cedrick Dela Carcel
         */
        public function validate(){
            $this->form_validation->set_rules('item', 'Item', 'required');
            if(!$this->form_validation->run()){
                return array(validation_errors());
            }
            return 'valid';
        }
    }