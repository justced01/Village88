<?php
    class Contact extends CI_Model {
        function get_all(){
            return $this->db->query("SELECT * FROM contacts")->result_array();
        }
        function get_contact($id)
        {
            return $this->db->query("SELECT * FROM contacts WHERE id = ?", array($id))->row_array();
        }
        function add_contact($data){
            $query = "INSERT INTO contacts(firstname, lastname, contact_num, created_at) VALUES (?,?,?,?)";
            $values = array($data['firstname'], $data['lastname'], $data['contact_num'], date("Y-m-d, H:i:s")); 
            return $this->db->query($query, $values);
        }
        function update_contact($data){
            $query = "UPDATE contacts SET firstname = ?, lastname = ?, contact_num = ?, updated_at = ? WHERE contact_num = ?";
            $values = array($data['firstname'], $data['lastname'], $data['contact_num'], date("Y-m-d, H:i:s"), $data['contact_num']);
            return $this->db->query($query, $values);
        }
        function delete_contact($id){
            return $this->db->query("DELETE FROM contacts WHERE id = $id");
        }
    }
?>