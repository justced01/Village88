<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Products extends CI_Controller {
        /**
         * DOCU: This function is to render the My Store page
         * Owned by: Cedrick Dela Carcel
         */
        public function index(){
            $data['header'] = array(
                'title' => 'Store',
                'userBtn' => 'Logout',
				'anchor' => 'logout',
				'status' => $this->session->userdata('status'),
            );
            $this->load->view('components/header', $data);
            $this->load->view('products/store');
        }
        /**
         * DOCU: This function is to render the add product page
         * Owned by: Cedrick Dela Carcel
         */
        public function add_product(){
            $data['header'] = array(
                'title' => 'Add Product',
                'userBtn' => 'Logout',
				'anchor' => 'logout',
				'status' => $this->session->userdata('status'),
            );
            $this->load->view('components/header', $data);
            $this->load->view('products/add_product');
        }
        public function process_add_product(){

        }
	}
