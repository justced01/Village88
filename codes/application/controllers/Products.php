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
        $data['products'] = $this->product->fetch_products();
        $this->load->view('components/header_admin', $data);
        $this->load->view('dashboard/products/product', $data);
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
    /**
     * DOCU: This function is to render the editproduct modal
     * Owned by: Cedrick Dela Carcel 
     */
    public function edit_product($id){
        $data['product'] = $this->product->fetch_product($id);
        $data['img_product'] = $this->product->fetch_img_product($id);
        $data['categories'] = $this->product->fetch_categories();
        $this->load->view('dashboard/products/editproduct', $data); 
    }
    /**
     * DOCU: This function is to validate and process the post data from editproduct form
     * Owned by: Cedrick Dela Carcel
     */
    public function process_edit_product($id){
        var_dump($this->input->post());
    }
}
