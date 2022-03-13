<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller { 
    /**
     * DOCU: This function is to render the admin dashboard index page
     * Owned by: Cedrick Dela Carcel
     */
    public function index(){
        $data['header'] = array(
            'title' => 'Dashboard Products',
            'logged_in' => TRUE
        );
        $value = $this->pagination();
        $data['products'] = $value['products'];
        $data['paginations'] = $value['paginations'];
        $this->load->view('components/header_admin', $data);
        $this->load->view('dashboard/products/product', $data);
    }
    /**
     * DOCU: This function is to render the admin dashboard products index page
     * Owned by: Cedrick Dela Carcel
     */
    public function products(){
        $data['header'] = array(
            'title' => 'Dashboard Products',
            'logged_in' => TRUE
        );
        $value = $this->pagination();
        $data['products'] = $value['products'];
        $data['paginations'] = $value['paginations'];
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
        $data['response'] = $result;
        if($result === 'valid'){
            $this->product->insert_product($this->input->post());
            $data['response_code'] = 200;
            $data['response'] = 'Product has been added successfully';
            echo json_encode($data);
        }
        else {
            $data['response_code'] = 300;
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
        $result = $this->product->validate_update($this->input->post());
        $data['token'] = $this->security->get_csrf_hash();
        $data['response'] = $result;
        if($result === 'valid'){
            $this->product->edit_product($this->input->post(), $id);
            $data['response_code'] = 200;
            $data['response'] = 'Product has been updated successfully';
            echo json_encode($data);
        }
        else {
            $data['response_code'] = 300;
            echo json_encode($data);
        }
    }
    /**
     * DOCU: This function is to delete a product
     * Owned by: Cedrick Dela Carcel
     */
    public function delete_product($id){
        $this->product->delete_product($id);
        redirect('products');
    }
    /**
     * DOCU: This function is to delete a category
     * Owned by: Cedrick Dela Carcel
     */
    public function delete_category($id){
        $this->product->delete_category($id);
        $data['response_code'] = 200;
        $data['response'] = 'Category has been deleted successfully';
        $data['categories'] = $this->product->fetch_categories();
        echo json_encode($data);
    }
    /**
     * DOCU: This function is to delete an image
     * Owned by: Cedrick Dela Carcel
     */
    public function delete_image($id){
        $this->product->delete_image($id);
        $data['response_code'] = 200;
        $data['response'] = 'Selected image has been deleted successfully';
        echo json_encode($data);
    }
    /**
     * DOCU: This function is a search filter if users input in search form
     * Owned by: Cedrick Dela Carcel
     */
    public function search(){
        $result = $this->product->validate_search($this->input->post());
        $data['token'] = $this->security->get_csrf_hash();
        if($result === 'valid'){
            $data['products'] = $this->product->find_product($this->input->post());
            $data['response_code'] = 200;
            $this->load->view('partials/partials_search', $data);
        }
        else {
            $data['response_code'] = 300;
            $value = $this->pagination();
            $data['products'] = $value['products'];
            $data['paginations'] = $value['paginations'];
            $this->load->view('partials/partials_search', $data);
        }
    }

    /**
     * DOCU: This function is for pagination purposes
     * Owned by: Cedrick Dela Carcel 
     */
    public function pagination(){
        $total_rows = count($this->product->fetch_all_products());
        $limit_records = 5;
        $data['paginations'] = array(
            'limit_page' => $limit_records,
            'total_rows' => $total_rows,
            'number_of_page' => ceil($total_rows / $limit_records),
            'page' => !$this->input->get('page') ? $page = 1 : $page = $this->input->get('page')
        );
        $result = ($page - 1) * $limit_records;  
        return array(
            'products' => $this->product->fetch_products($result, $limit_records), 
            'paginations' => $data['paginations']
        );
    }
}
