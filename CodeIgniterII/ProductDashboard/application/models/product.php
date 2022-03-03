<?php 
    if(!defined('BASEPATH')) exit('No direct script access allowed');

    class Product extends CI_Model {
        /**
         * DOCU: This function is to get all the products from the database and display in dashboard
         * Owner: Cedrick Dela Carcel
         */
        function get_products(){
            return $this->db->query("SELECT * FROM products")->result_array();
        }
        /**
         * DOCU: This function is to get matched product from the database and display in edit/show page
         * Owner: Cedrick Dela Carcel
         */
        function get_product($id){
            return $this->db->query("SELECT * FROM products WHERE id = ?", array($id))->row_array();
        }
        /**
         * DOCU: This function is to process and store the post data from new product page to the database
         * Owner: Cedrick Dela Carcel
         */
        function create_product($post){
            $query = "INSERT INTO products(title, description, price, inventory_count, created_at, updated_at) VALUES (?,?,?,?,?,?)";
            $values = array(
                $this->security->xss_clean($post['title']),
                $this->security->xss_clean($post['description']),
                $this->security->xss_clean($post['price']),
                $this->security->xss_clean($post['inventory_count']),
                date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
            $id = $this->db->insert_id($this->db->query($query, $values));
            return $id;
        }
        /**
         * DOCU: This function is to process and store the updated post data from edit product page to the database
         * Owner: Cedrick Dela Carcel
         */
        function update_product($post){
            return $this->db->query(
                "UPDATE products 
                SET title = ?, description = ?, price = ?, inventory_count = ?, updated_at = ?
                WHERE id = ?", array(
                    $this->security->xss_clean($post['title']),
                    $this->security->xss_clean($post['description']),
                    $this->security->xss_clean($post['price']),
                    $this->security->xss_clean($post['inventory_count']),
                    date("Y-m-d, H:i:s"),
                    $this->security->xss_clean($post['product_id'])
                )
            );
        }
        /**
         * DOCU: This function is to delete specific product from the database
         * Owner: Cedrick Dela Carcel
         */
        function remove_product($id){
            return $this->db->query("DELETE FROM products WHERE id = ?", array($id));
        }
        /**
         * DOCU: This function is to validate the post data from new product page
         * Owner: Cedrick Dela Carcel
         */
        function validate_product(){
            $this->form_validation->set_rules('title', 'Name', 'trim|required|min_length[2]');
            $this->form_validation->set_rules('description', 'Description', 'trim|required|min_length[2]|max_length[250]');
            $this->form_validation->set_rules('price', 'Price', 'trim|required|numeric|is_natural_no_zero');
            $this->form_validation->set_rules('inventory_count', 'Inventory Count', 'trim|required|numeric|is_natural_no_zero');
            if(!$this->form_validation->run()){
                return array(validation_errors());
            } 
            return 'valid';
        }
    }