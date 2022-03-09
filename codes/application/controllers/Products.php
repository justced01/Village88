<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller { 
    /**
     * DOCU: This function is to render the admin dashboard index page
     * Owned by: Cedrick Dela Carcel
     */
    public function index(){
        $data['header'] = array(
            'title' => 'Dashboard Products',
            'logged_in' => TRUE
        );
        $this->load->view('components/header_admin', $data);
        $this->load->view('dashboard/products/product');
    }
    /**
     * DOCU: This function is to validate and process the post data from the addproduct modal
     * Owned by: Cedrick Dela Carcel 
     */
    public function add_product(){
        $result = $this->product->validate_add($this->input->post());
        $data['token'] = $this->security->get_csrf_hash();
        $data['errors'] = $result;
        if($result === 'valid'){
            $this->product->insert_product($this->input->post());


            echo json_encode($data);
        }
        else {
            echo json_encode($data);
        }
    }

    public function create_directories(){
        
    }
}
