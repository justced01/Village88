<?php
    class Countdown extends CI_Controller {
        public function main(){
            date_default_timezone_set('Asia/Manila');
            $this->load->helper('date');
            $currentdays = 0;
            $dayspermonth = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31); 
            for($index = 0; $index < (date('m') - 1); $index++){
                $currentdays += $dayspermonth[$index];
            }

            $countdown = array(
                'day' => $day = 365 - ($currentdays + date('d')),
                'hours' => $hours = 24 - date('H'),
                'minutes' => $minutes = 60 - date('i'),
                'seconds' => $seconds = 60 - date('s')
            );
            $this->load->view('countdown/index', $countdown);
        }
    }
?>