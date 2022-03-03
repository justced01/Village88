<?php 
    if(!defined('BASEPATH')) exit('No direct script access allowed');

    class Product extends CI_Model {
        /**
         * DOCU: This query to fetch all data from the database
         * Owned by: Cedrick Dela Carcel
         */
        public function fetch_all(){
            return $this->db->query("SELECT * FROM products")->result_array();
        }
        /**
         * DOCU: This query to search a product from the database
         * Owned by: Cedrick Dela Carcel
         */
        public function find_products($post){
            $title = $this->security->xss_clean($post['title']);
            $min = $this->security->xss_clean($post['min_price']);
            $max = $this->security->xss_clean($post['max_price']);
            $post['sort'] === 'ascending' ? $sort = 'ASC' : $sort = 'DESC';

            $query = "SELECT * FROM products";
            $conditions = array();
            if(!empty($title)){
                $conditions[] = "title LIKE '%$title%'";
            }
            if(!empty($min) && !empty($max)){
                $conditions[] = "price BETWEEN $min AND $max";
            }
            $sql = $query;
            if(!empty($conditions)){
                $sql .= " WHERE " . implode(' AND ', $conditions) . " ORDER BY price $sort";
            }
            else {
                $sql .= " ORDER BY price $sort";
            }

            return $this->db->query($sql)->result_array();
        }
        /** 
         * DOCU: This function is to validate a post data from index page 
         * Owned by: Cedrick Dela Carcel
         */
        public function validate(){
            $this->form_validation->set_rules('min_price', 'Minimum price', 'numeric');
            $this->form_validation->set_rules('max_price', 'Maximum price', 'numeric');
            if(!$this->form_validation->run()){
                return array(validation_errors());
            }
            return 'valid';
        }
    }