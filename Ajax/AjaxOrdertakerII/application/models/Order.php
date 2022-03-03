<?php 
    if(!defined('BASEPATH')) exit('No direct script access allowed');

    class Order extends CI_Model {
        /**
         * DOCU: This function is to query the post data
         * Owned by: Cedrick Dela Carcel
         */
        public function create($post){
            $query = "INSERT INTO orders(order_info, created_at, updated_at) VALUES (?,?,?)";
            $values = array(
                $this->security->xss_clean($post['order']),
                date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s")
            );
            return $this->db->query($query, $values);
        }
        /**
         * DOCU: This function is to get the all orders from database
         * Owned by: Cedrick Dela Carcel
         */
        public function get_orders(){
            return $this->db->query("SELECT * FROM orders")->result_array();
        }
        /**
         * DOCU: This function is to update single order from database
         * Owned by: Cedrick Dela Carcel
         */
        public function update_order($post){
            return $this->db->query("UPDATE orders SET order_info = ?, updated_at = ? WHERE id = ?", array(
                $this->security->xss_clean($post['order']),
                date("Y-m-d, H:i:s"), 
                $this->security->xss_clean($post['order_id'])));
        }
        /**
         * DOCU: This function is to delete single order from database
         * Owned by: Cedrick Dela Carcel
         */
        public function delete_order($post){
            return $this->db->query("DELETE FROM orders WHERE id = ?", array($post['order_id']));
        }
        /**
         * DOCU: This function is to validate the post data
         * Owned by: Cedrick Dela Carcel
         */
        public function validate(){
            $this->form_validation->set_rules('order', 'Order', 'trim|required');
            if(!$this->form_validation->run()) {
                return array(validation_errors());
            } 
            return 'valid';
        }
    }