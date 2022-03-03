<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
    header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept, Authorization");
    class Orders_ajax extends CI_Controller {
        /**
         * DOCU: This function is to render the order page
         * Owned by: Cedrick Dela Carcel
         */
        public function index(){
            $data['header'] = 'Ajax Ordertaker v1';
            $this->load->view('components/header', $data);
            $this->load->view('index');
        }
        /**
         * DOCU: This function is to validate and process the post data from the order page with Ajax
         * Owned by: Cedrick Dela Carcel
         */
        public function process_order(){
            $result = $this->order->validate($this->input->post());
            if($result === 'valid'){
                $this->order->create($this->input->post());
                $data['success'] = array('Ordered Success');
                $data['orders'] = $this->order->get_orders();
                $this->load->view('partials/orders', $data);
                $this->load->view('partials/flash_messages', $data);
            }
            else {
                $data['errors'] = $result;
                $data['orders'] = $this->order->get_orders();
                $this->load->view('partials/orders', $data);
                $this->load->view('partials/flash_messages', $data);
            }
        }
        /**
         * DOCU: This function is to get and render the data to partials/order page
         * Owned by: Cedrick Dela Carcel
         */
        public function index_html(){
            $data['orders'] = $this->order->get_orders();
            $this->load->view("partials/orders", $data);
        }
    }
