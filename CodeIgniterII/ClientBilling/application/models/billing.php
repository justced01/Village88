<?php 
    if(!defined('BASEPATH')) exit('No direct script access allowed');

    class Billing extends CI_Model {
        /**
         * DOCU: This function for getting the total_cost per month in billing table
         * Owner: Newbie, Cedrick Dela Carcel
         */
        function total_cost(){
            return $this->db->query(
                "SELECT date_format(charged_datetime, '%M') AS month, 
                    date_format(charged_datetime, '%Y') AS year, 
                    SUM(amount) AS total_cost 
                    FROM billing 
                    WHERE charged_datetime BETWEEN '2011/01/01 00:00:00.000' AND '2011/12/31 23:59:59.000' 
                    GROUP BY date_format(charged_datetime, '%M')
                    ORDER BY MONTH(charged_datetime)")
                    ->result_array();
        }
        /**
         * DOCU: This function for validating input dates 
         * NOTE: Add date vlidation 
         * Owner: Newbie, Cedrick Dela Carcel
         */
        function validate($post){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('start_date', 'Start date', 'required');
            $this->form_validation->set_rules('end_date', 'End date', 'required');
            if($this->form_validation->run()){
                return 'valid';
            }
            else {
                return array(validation_errors());
            }
        }
    }