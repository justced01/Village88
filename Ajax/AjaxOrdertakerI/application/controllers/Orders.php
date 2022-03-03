<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Orders extends CI_Controller {
        /**
         * DOCU: This function is to render the order page
         * Owned by: Cedrick Dela Carcel
         */
        public function index(){
            $data['header'] = 'Ajax Ordertaker v1';
            $data['orders'] = $this->order->get_orders();
            $this->load->view('components/header', $data);
            $this->load->view('index', $data);
        }
        /**
         * DOCU: This function is to validate and process the post data from the order page
         * Owned by: Cedrick Dela Carcel
         */
        public function process_order(){
            $result = $this->order->validate($this->input->post());
            if($result === 'valid'){
                $success = array('Ordered successfully');
                $this->order->create($this->input->post());
                $this->session->set_flashdata('success', $success);
                redirect('/');
            }
            else {
                $this->session->set_flashdata('errors', $result);
                redirect('/');
            }
        }
    }
