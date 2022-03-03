<?php 
    if(!defined('BASEPATH')) exit('No direct script access allowed');

    class Product extends CI_Model { 
        /**
         * This query is to get all data from the database
         * Owned by: Cedrick Dela Carcel
         */
        public function fetch_all(){
            return $this->db->query("SELECT * FROM products")->result_array();
        }
        /**
         * This query is to get all data from the database
         * Owned by: Cedrick Dela Carcel
         */
    }