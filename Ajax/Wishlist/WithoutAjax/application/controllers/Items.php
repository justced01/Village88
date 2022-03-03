<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends CI_Controller {
	/**
	 * DOCU: This function is to render the index page
	 * Owned by: Cedrick Dela Carcel
	 */
	public function index(){
		$data['items'] = $this->item->fetch_all();
		$this->load->view('components/header');
		$this->load->view('index', $data);
	}
	/**
	 * DOCU: This function is to validate and process the post data from the index page create-form
	 * Owned by: Cedrick Dela Carcel
	 */
	public function create(){
		$result = $this->item->validate($this->input->post());
		if($result === 'valid'){
			$data['success'] = array('Created Successfully');
			$this->item->insert($this->input->post());
			redirect('/');
		}
		else {
			redirect('/');
		}
	}
	public function update($id){
		$result = $this->item->validate($this->input->post());
		if($result === 'valid'){
			$data['success'] = array('Created Successfully');
			$this->item->update($this->input->post(), $id);
			redirect('/');
		}
		else {
			redirect('/');
		}
	}
}
