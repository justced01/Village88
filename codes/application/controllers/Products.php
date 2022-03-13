<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
    /** 
     * DOCU: The category is to render the catalog page
     * Owned by: Cedrick Dela Carcel
    */
    public function index(){
        $data['header'] = array(
            'title' => 'Catalog | NEWBIE Merch',
            'logged_in' => TRUE
        );
        $value = $this->catalog_pagination();
        $data['products'] = $value['products'];
        $data['paginations'] = $value['paginations'];
        $data['categories'] = $this->product->count_products_by_category();
        $this->load->view('components/header_main', $data);
        $this->load->view('dashboard/products/catalog', $data);
    }
    /** 
     * DOCU: The category is to render and show the specific product
     * Owned by: Cedrick Dela Carcel
    */
    public function show($id){
        $data['header'] = array(
            'title' => 'Products Show',
            'logged_in' => TRUE
        );
        $data['product'] = $this->product->fetch_product($id);
        $data['similar_products'] = $this->product->fetch_similar_products($id, $data['product']);
        $data['product_imgs'] = $this->product->fetch_img_product($id);
        $this->load->view('components/header_main', $data);
        $this->load->view('dashboard/products/show', $data);
    }
    /**
     * DOCU: This function is to filter the products by category
     * Owned by: Cedrick Dela Carcel
     */
    public function category($id){
        $data['products'] = $this->product->filter_category($id);

        $category = $this->product->fetch_categories();
        foreach ($category as $category){
            if($category['id'] === $id){
                $data['title'] = $category['category'];
            }
        }
        $data['header'] = array(
            'title' => 'NEWBIE Merch | ' . $data['title'],
            'logged_in' => TRUE
        );
        $value = $this->catalog_pagination();
        $data['paginations'] = $value['paginations'];
        $data['categories'] = $this->product->count_products_by_category();
        $this->load->view('components/header_main', $data);
        $this->load->view('dashboard/products/catalog', $data);
    }
    /**
     * DOCU: This function is for sorting prduct purposes
     * Owned by: Cedrick Dela Carcel 
     */
    public function sort(){
        $result = $this->product->validate_sort($this->input->post());
        $data['token'] = $this->security->get_csrf_hash();
        if($result === 'valid'){
            $data['products'] = $this->product->sort_product($this->input->post());
            $data['response_code'] = 200;
            $this->load->view('partials/partials_catalog', $data);
        }
        else {
            $data['response_code'] = 300;
            $value = $this->catalog_pagination();
            $data['products'] = $value['products'];
            $data['paginations'] = $value['paginations'];
            $this->load->view('partials/partials_catalog', $data);
        }
    }

    /**
     * DOCU: This function is a search filter if users input in search form
     * Owned by: Cedrick Dela Carcel
     */
    public function search_catalog(){
        $result = $this->product->validate_search($this->input->post());
        $data['token'] = $this->security->get_csrf_hash();
        if($result === 'valid'){
            $data['products'] = $this->product->find_product($this->input->post());
            $data['response_code'] = 200;
            $this->load->view('partials/partials_catalog', $data);
        }
        else {
            $data['response_code'] = 300;
            $value = $this->catalog_pagination();
            $data['products'] = $value['products'];
            $data['paginations'] = $value['paginations'];
            $this->load->view('partials/partials_catalog', $data);
        }
    }

    /**
     * DOCU: This function is for pagination purposes
     * Owned by: Cedrick Dela Carcel 
     */
    public function catalog_pagination(){
        $total_rows = count($this->product->fetch_all_products());
        $limit_records = 10;
        $data['paginations'] = array(
            'limit_page' => $limit_records,
            'total_rows' => $total_rows,
            'number_of_page' => ceil($total_rows / $limit_records),
            'page' => !$this->input->get('page') ? $page = 1 : $page = $this->input->get('page')
        );
        $result = ($page - 1) * $limit_records;  
        return array(
            'products' => $this->product->fetch_products_catalog($result, $limit_records), 
            'paginations' => $data['paginations']
        );
    }
}