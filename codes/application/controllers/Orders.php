<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {
    /**
     * DOCU: This function is to render the admin dashboard index page
     * Owned by: Cedrick Dela Carcel
     */
    public function index(){
        $data['header'] = array(
            'title' => 'Dashboard Orders',
            'logged_in' => TRUE
        );
        $this->load->view('components/header_admin', $data);
        $this->load->view('dashboard/orders/order');
    }
}