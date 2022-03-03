<?php 
    if(!defined('BASEPATH')) exit('No direct script access allowed');

    class Assignment extends CI_Model {
        /**
         * This query is to fetch all the information in the curriculum database 
         * Owned by: Cedrick Dela Carcel
         */
        public function fetch_all(){
            return $this->db->query(
                "SELECT assignments.title AS assignment, assignments.sequence_num, assignments.level, tracks.title AS track
                FROM assignments LEFT JOIN tracks ON tracks.id = assignments.track_id 
                ORDER BY assignments.id
                LIMIT 5")
                ->result_array();
        }
        /**
         * This query is to count all the information in the assignments table
         * Owned by: Cedrick Dela Carcel
         */
        public function count(){
            return $this->db->query("SELECT * FROM assignments")->result_array();
        }
        /**
         * This query is to show the information but with specific limit in the curriculum database 
         * Owned by: Cedrick Dela Carcel
         */
        public function show_limit($value){
            return $this->db->query(
                "SELECT assignments.title AS assignment, assignments.sequence_num, assignments.level, tracks.title AS track
                FROM assignments LEFT JOIN tracks ON tracks.id = assignments.track_id 
                ORDER BY assignments.id
                LIMIT ?", array((int)$value))
                ->result_array();
        }
        /**
         * This query is to select the informations from the database where the condition are met
         * Owned by: Cedrick Dela Carcel
         */
        public function filter_assignments($post){
            isset($post['level']) ? $level = $this->security->xss_clean($post['level']) : null;
            $track = $this->security->xss_clean($post['track']);
            if($track === 'Introduction'){
                $track = 1;
            }
            else if($track === 'Web Fundamentals'){
                $track = 2;
            }
            else if($track === 'PHP'){
                $track = 3;
            }

            $query = "SELECT assignments.track_id, assignments.title AS assignment, assignments.sequence_num, assignments.level, tracks.title AS track FROM assignments LEFT JOIN tracks ON tracks.id = assignments.track_id ";
            $conditions = array();
            if(!empty($level)){
                $conditions[] = "assignments.level LIKE '$level'";
            }
            if(!empty($track)){
                $conditions[] = "assignments.track_id = $track";
            }
            $sql = $query;
            if(!empty($conditions)){
                $sql .= " WHERE " . implode(' AND ', $conditions);
            }
            return $this->db->query($sql)->result_array();
        }
    }