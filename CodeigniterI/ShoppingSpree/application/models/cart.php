<?php
    class Cart extends CI_Model {
        function get_items(){
            return $this->db->query("SELECT * FROM items")->result_array();
        }

        // this query will display all inserted bought items but it's categorically by item
        function get_cart(){
            return $this->db->query(
                "SELECT carts.id, carts.item_id, items.title, SUM(carts.quantity) AS quantity, items.price 
                    FROM carts 
                    LEFT JOIN items ON carts.item_id = items.id
                    GROUP BY items.id")
                    ->result_array();
        }

        function find_item($id){
            return $this->db->query("SELECT * FROM items WHERE id = ?", array($id))->row_array();
        }

        function count_cart(){
            return $this->db->query("SELECT SUM(carts.quantity) AS total_quantity FROM carts ")->row()->total_quantity;
        }

        function total_price(){
            return $this->db->query(
                "SELECT SUM((items.price * carts.quantity)) AS total_price
                FROM carts 
                LEFT JOIN items ON items.id = carts.item_id")
                ->row()->total_price;
        }

        function insert_items($data){
            $query = "INSERT INTO carts(item_id, quantity, created_at, updated_at) VALUES(?,?,?,?)";
            $values = array($data['item_id'], $data['quantity'], date('Y-m-d H:i:s'), date('Y-m-d H:i:s'));
            return $this->db->query($query, $values);
        }

        function remove_item($id){
            return $this->db->query("DELETE FROM carts WHERE carts.item_id = ?", array($id));
        }
    }
?>