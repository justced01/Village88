<?php
    class Authentication extends CI_Model {
        function get_all_user(){
            return $this->db->query("SELECT * FROM users")->result_array();
        }
        function get_user($email_contactnum){
            return $this->db->query("SELECT * FROM users WHERE email = ? OR contactnum = ?", array($email_contactnum, $email_contactnum))->row_array();
        }
        function insert_user($data){
            $query = "INSERT INTO users(firstname, lastname, email, password, salt, contactnum, created_at) VALUES (?,?,?,?,?,?,?)";
            $values = array($data['firstname'], $data['lastname'], $data['email'], $data['password'], $data['salt'], $data['contactnum'], date("Y-m-d, H:i:s")); 
            return $this->db->query($query, $values);
        }
    }
?>