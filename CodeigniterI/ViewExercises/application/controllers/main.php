<?php
    class Main extends CI_Controller {
        public function index(){
            echo "Welcome";
        }

        public function world(){
            $image['world'] = array(
                'image1' => 'china.jpeg',
                'image2' => 'america.jpeg',
                'image3' => 'ph.jpg'
            );
            $this->load->view('main/world', $image);
        }

        public function ninjas($value){
            $image['ninja'] = array(
                'ninja1' => 'ninja1.jpg',
                'ninja2' => 'ninja2.jpg',
                'ninja3' => 'ninja3.jpg',
                'ninja4' => 'ninja4.jpg',
                'ninja5' => 'zedd.jpg',
                'loop' => $value
            );

            $this->load->view('main/ninjas', $image);
        }
    }
?>