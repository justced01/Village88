<?php  
    class Select extends CI_Model {  
        public function getAllBooks(){  
            $query = $this->db->get('books');  
            return $query;  
        }  
        public function getBook($id){ 
            $query = $this->db->query("SELECT * FROM books WHERE id = $id");
            return $query; 
        }
        public function deleteBook($id){ 
            $query = $this->db->query("DELETE FROM books WHERE id = $id");
            return $query; 
        }
    }  
?>  