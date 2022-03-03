<?php 
    if(!defined('BASEPATH')) exit('No direct script access allowed');

    class Sport extends CI_Model {
        /**
         * DOCU: This query for getting all players data
         * Owner: Cedrick Dela Carcel
         */
        function get_players(){
            return $this->db->query(
                "SELECT CONCAT(first_name, ' ', last_name) AS fullname, img_filename, sports.title AS title
                FROM players
                LEFT JOIN sports ON players.sport_id = sports.id")->result_array();
        }
        /**
         * DOCU: This query for getting all sports data
         * Owner: Cedrick Dela Carcel
         */
        function get_sports(){
            return $this->db->query("SELECT * FROM sports")->result_array();
        }
        /**
         * DOCU: This query for getting a player/s depends on gender or sports
         * Owner: Cedrick Dela Carcel
         */
        function search_player($post){
            if(empty($post['sex'])){
                $post['sex'] = '';
            }
            if(empty($post['sport'])){
                $post['sport'] = '';
            }
            return $this->db->query(
                "SELECT CONCAT(players.first_name, ' ', players.last_name) AS fullname, players.img_filename, sports.title AS title
                FROM players 
                LEFT JOIN sports ON players.sport_id = sports.id
                WHERE CONCAT(players.first_name, ' ', players.last_name) LIKE '%{$post['name']}%'
                AND (CASE 
                        WHEN '{$post['sex']}' != '' THEN players.sex = '{$post['sex']}'
                        ELSE players.sex = 'M' OR players.sex = 'F'
                     END)
                AND (CASE
                        WHEN '{$post['sport']}' != '' THEN players.sport_id = '{$post['sport']}'
                        ELSE players.sport_id 
                    END)")
                ->result_array();
        }   
        /**
         * DOCU: This function will validation function, checks if the user input is valid and correct
         * NOTE: incomplete validation
         * Owner: Cedrick Dela Carcel
         */
        function validate($post){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('name', 'Name', 'required|min_length[2]');
            if($this->form_validation->run()){
                return 'valid';
            }
            else {
                return array(validation_errors());
            }
        }
    }