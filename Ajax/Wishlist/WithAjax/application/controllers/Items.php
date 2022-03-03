<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends CI_Controller {
	/**
	 * DOCU: This function is to render the index page
	 * Owned by: Cedrick Dela Carcel
	 */
	public function index(){
		$this->load->view('components/header');
		$this->load->view('index');
	}
	/**
	 * DOCU: This function is to validate and process the post data from the index page create-form
	 * Owned by: Cedrick Dela Carcel
	 */
	public function create(){
		$result = $this->item->validate($this->input->post());
		if($result === 'valid'){
			$this->item->insert($this->input->post());
			$data['success'] = array('Created Successfully');
			$data['items'] = $this->item->fetch_all();
			$this->load->view('partials/flash_messages', $data);
			$this->load->view('partials/item_partial', $data);
		}
		else {
			$data['errors'] = $result;
			$data['items'] = $this->item->fetch_all();
			$this->load->view('partials/flash_messages', $data);
			$this->load->view('partials/item_partial', $data);
		}
	}
	public function update($id){
		$result = $this->item->validate($this->input->post());
		if($result === 'valid'){
			$this->item->update($this->input->post(), $id);
			$data['success'] = array('Updated Successfully');
			$data['items'] = $this->item->fetch_all();
			$this->load->view('partials/flash_messages', $data);
			$this->load->view('partials/item_partial', $data);
		}
		else {
			$data['errors'] = $result;
			$data['items'] = $this->item->fetch_all();
			$this->load->view('partials/flash_messages', $data);
			$this->load->view('partials/item_partial', $data);
		}
	}
	/**
	 * DOCU: This function is to render a html part that will get by ajax
	 * Owned by: Cedrick Dela Carcel
	 */
	public function render(){
		$data['items'] = $this->item->fetch_all();
		$this->load->view('partials/item_partial', $data);
	}
}
