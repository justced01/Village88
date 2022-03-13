<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carts extends CI_Controller {
    /**
     * DOCU: This function is to render the checkout page
     * Owned by: Cedrick Dela Carcel
     */
    public function index(){
        $data['header'] = array(
            'title' => 'Cart Page',
            'logged_in' => TRUE
        );
        $this->load->view('components/header_main', $data);
        $this->load->view('checkout/cart');
    }
}