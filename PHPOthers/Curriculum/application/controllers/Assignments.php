<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assignments extends CI_Controller {
	/**
	 * DOCU: This function is to render the Curriculum index page 
	 * Owned by: Cedrick Dela Carcel
	 */
	public function index(){
		$data['header'] = array(
			'title' => 'All Assignments'
		);
		$data['assignments'] = $this->assignment->fetch_all();
		$data['count'] = count($this->assignment->fetch_all());
		$this->load->view('components/header', $data);
		$this->load->view('index', $data);
	}
	/**
	 * DOCU: This function is to render the Curriculum index page with passed value of $limit from method process function
	 * Owned by: Cedrick Dela Carcel
	 */
	public function show($value){
		$data['assignments'] = $this->assignment->show_limit($value);
		$data['header'] = array(
			'title' => 'All Assignments - showing ' . $value . ' rows' 
		);
		$data['count'] = $value;
		$this->load->view('components/header', $data);
		$this->load->view('index', $data);
		$this->session->unset_userdata('count');
	}
	/**
	 * DOCU: This function is to process the post 'row' data from the index page
	 * Owned by: Cedrick Dela Carcel
	 */
	public function process($value){
		$counter = count($this->assignment->count());
		if($counter > $value){
			$value += 5;
			redirect('assignments/show/' . $value);
		}
		else {
			redirect('assignments/show/' . $counter);
		}
	}
	/**
	 * DOCU: This function is to process the post data from the filter form in index page
	 * Owned by: Cedrick Dela Carcel
	 */
	public function filter(){
		$data['assignments'] = $this->assignment->filter_assignments($this->input->post());
		$data['count'] = count($data['assignments']);
		$this->load->view('partials/assignment_partial', $data);
	}
}
