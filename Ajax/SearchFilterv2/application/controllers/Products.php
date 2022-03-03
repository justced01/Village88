<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
	/**
	 * DOCU: This function is to render index page
	 * Owned by: Cedrick Dela Carcel
	 */
	public function index(){
		$total_rows = count($this->product->fetch_all());
		$limit_page = 5;
		$data['paginations'] = array(
			'limit_page' => $limit_page,
			'total_rows' => $total_rows,
			'number_of_page' => ceil($total_rows / $limit_page),
			'page' => !$this->input->get('page') ? $page = 1 : $page = $this->input->get('page')
		);
		$page_first_result = ($page - 1) * $limit_page;  
		$data['products'] = $this->product->fetch_limit($page_first_result, $limit_page);
		$this->load->view('components/header');
		$this->load->view('index', $data);
	}
	/**
	 * DOCU: This function is for pagination
	 * Owned by: Cedrick Dela Carcel
	 */
	public function page(){
		$total_rows = count($this->product->fetch_all());
		$limit_page = 5;
		$data['paginations'] = array(
			'limit_page' => $limit_page,
			'total_rows' => $total_rows,
			'number_of_page' => ceil($total_rows / $limit_page),
			'page' => !$this->input->get('page') ? $page = 1 : $page = $this->input->get('page')
		);
		$page_first_result = ($page - 1) * $limit_page;  
		$data['products'] = $this->product->fetch_limit($page_first_result, $limit_page);
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

			$total_rows = count($data['products']);
			$limit_page = 5;
			$data['paginations'] = array(
				'limit_page' => $limit_page,
				'total_rows' => $total_rows,
				'number_of_page' => ceil($total_rows / $limit_page),
				'page' => !$this->input->get('page') ? $page = 1 : $page = $this->input->get('page')
			);

			$this->load->view('partials/product_partials', $data);
		}
		else {
			echo "error: " . $result;	
		}
	}
}
