<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    /**
     * DOCU: This function is to load the home/dashboard page
     * Owner: Cedrick Dela Carcel
     */
	public function index(){
        $user = $this->session->userdata();
        $data['header'] = array(
            'title' => 'Product Dashboard - ' . $user['user_level'],
            'page' => 'dashboard',
            'anchor' => 'Logout',
            'link' => 'logout',
            'products' => $this->product->get_products()
        );
        $this->load->view('components/header', $data);
		$this->load->view('dashboard', $user);
	}
}
