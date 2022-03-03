<?php
    class Users extends CI_Controller {
        public function index(){
            $this->load->view('users/index');
        }

        public function new(){
            $this->load->view('users/new');
        }

        public function create(){
            $this->session->set_userdata('message', 'This feature is coming soon!');
            redirect('/new');
        }

        public function count(){
            if(!isset($_SESSION['count'])){
                $_SESSION['count'] = 1;
            }
            else {
                $_SESSION['count'] += 1;
            }
            $this->load->view('users/count');
        }

        public function reset(){
            $_SESSION['count'] = 0;
            $this->load->view('users/reset');
        }

        public function say($message, $loop){
            if(!is_numeric($loop)){
                echo "Sorry.  This url does not meet our requirement.";
            }
            else {
                $say = array(
                    'message' => $message,
                    'loop' => $loop
                );
                $this->load->view('users/say', $say);
            }
        }

        public function mprep(){
            $view_data = array(
                'name' => "Michael Choi",
                'age'  => 40,
                'location' => "Seattle, WA",
                'hobbies' => array( "Basketball", "Soccer", "Coding", "Teaching", "Kdramas")
            );
            $this->load->view('users/mprep', $view_data);
        }
    }
?>