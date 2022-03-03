<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Dashboard extends CI_Controller {
        /**
		 * DOCU: This function is to render the dashboard page 
		 * Owned by: Cedrick Dela Carcel
		 */
		public function index(){
            $data['header'] = array(
                'title' => 'Dashboard',
                'userBtn' => 'Logout',
				'anchor' => 'logout',
				'status' => $this->session->userdata('status'),
            );
			$data['main'] = array(
				'user_level' => $this->session->userdata('user_level')
			);
			$this->load->view('components/header', $data);
			$this->load->view('products/main', $data);
		}
	}
