<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notes extends CI_Controller {
	/**
	 * DOCU: This function is to render index page
	 * Owned by: Cedrick Dela Carcel
	 */
	public function index(){
		$this->load->view('components/header');
		$this->load->view('index');
	}
	/**
	 * DOCU: This function is to process and validate the post data from index form page
	 * Owned by: Cedrick Dela Carcel
	 */
	public function create(){
		$result = $this->note->validate($this->input->post());
		if($result === 'valid'){
			$this->note->insert_note($this->input->post());
			$data['notes'] = $this->note->fetch_all();
			$data['success'] = array('Created successfully');
			$this->load->view('partials/flash_messages', $data);
			$this->load->view('partials/note_partial', $data);
		}
		else {
			$data['errors'] = $result;
			$data['notes'] = $this->note->fetch_all();
			$this->load->view('partials/flash_messages', $data);
			$this->load->view('partials/note_partial', $data);
		}
	}
	/**
	 * DOCU: This function is to process and update a post data from index page
	 * Owned by: Cedrick Dela Carcel
	 */
	public function update($id){
		$result = $this->note->validate($this->input->post());
		if($result === 'valid'){
			$this->note->update_note($this->input->post(), $id);
			$data['data'] = array(
				'sucess' => 'Updated successfully', 
				'notes' => $this->note->fetch_all()
			);
			$this->load->view('partials/flash_messages', $data);
			$this->load->view('partials/note_partial', $data);
		}
		else {
			$data['errors'] = $result;
			$data['notes'] = $this->note->fetch_all();
			$this->load->view('partials/flash_messages', $data);
			$this->load->view('partials/note_partial', $data);
		}
	}
	/**
	 * DOCU: This function is to delete a single data from database
	 * Owned by: Cedrick Dela Carcel
	 */
	public function remove($id){
		$this->note->remove_note($id);
		$data['errors'] = array('Deleted successfully');
		$data['notes'] = $this->note->fetch_all();
		$this->load->view('partials/flash_messages', $data);
		$this->load->view('partials/note_partial', $data);
	}
	/**
	 * DOCU: This function is to render a html part that will get by ajax
	 * Owned by: Cedrick Dela Carcel
	 */
	public function render(){
		$data['notes'] = $this->note->fetch_all();
		$this->load->view('partials/note_partial', $data);
	}
}
