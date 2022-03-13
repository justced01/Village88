<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carts extends CI_Controller {
    /**
     * 
     */
    public function index(){
        $data['header'] = array(
            'title' => 'Cart Page',
            'logged_in' => TRUE
        );
        $this->load->view('components/header_main');
        $this->load->view('checkout/cart');
    }
}