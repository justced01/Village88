<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
	/**
	 * DOCU: This function is to render index page
	 * Owned by: Cedrick Dela Carcel
	 */
	public function index(){
		$data['products'] = $this->product->fetch_all();
		$this->load->view('components/header');
		$this->load->view('index', $data);
	}
	/**
	 * DOCU: This function is to validate and process the post data from index page
	 * Owned by: Cedrick Dela Carcel
	 */
	public function search(){
		$result = $this->product->validate($this->input->post());
		if($result === 'valid'){
			$data['products'] = $this->product->find_products($this->input->post());
			$this->load->view('components/header');
			$this->load->view('partials/product_partials', $data);
		}
		else {
			echo "error: " . $result;	
		}
	}
	/**
	 * DOCU: This function is to render product_partials page
	 * Owned by: Cedrick Dela Carcel
	 */
	public function product_partials(){
		$data['products'] = $this->product->fetch_all();
		$this->load->view('partials/product_partials', $data);
	}
}
