<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model("Contact");
	}
	
	public function index(){
		$data['contacts'] = $this->Contact->get_all();
		$this->load->view('contact/index', $data);
	}

	public function display_contact($id){
		$data = $this->Contact->get_contact($id);
		$this->load->view('contact/display_contact', $data);
	}

	public function add_contact(){
		$this->load->view('contact/add_contact');
	}

	public function edit_contact($id){
		$data = $this->Contact->get_contact($id);
		$this->load->view('contact/update_contact', $data);
	}

	public function create_contact(){
		$this->form_validation->set_rules('firstname', 'first name', 'required');
		$this->form_validation->set_rules('lastname', 'last name', 'required');
		$this->form_validation->set_rules('contact_num', 'contact number', 'required|exact_length[11]|is_unique[contacts.contact_num]|numeric', 
			array('is_unique' => 'Contact number has been used.')
		);
		if($this->form_validation->run() === FALSE){
			$this->session->set_flashdata('errors', validation_errors('<p class="error">', '</p>'));
			redirect('/add');
		}
		else {
			// $this->output->enable_profiler(TRUE);
			$data = array(
				'firstname' =>$this->input->post('firstname', TRUE),
				'lastname' => $this->input->post('lastname', TRUE),
				'contact_num' => $this->input->post('contact_num', TRUE)
			);
			$this->Contact->add_contact($data);
			$this->session->set_flashdata('success', 'Contact created successfully');
			redirect('/contacts');
		}
	}

	public function update_contact($id){
		$this->form_validation->set_rules('firstname', 'first name', 'required');
		$this->form_validation->set_rules('lastname', 'last name', 'required');
		$this->form_validation->set_rules('contact_num', 'contact number', 'required|exact_length[11]|numeric');
		if($this->form_validation->run() === FALSE){
			$this->session->set_flashdata('errors', validation_errors('<p class="error">', '</p>'));
			redirect('/edit/'. $id);
		}
		else{
			// $this->output->enable_profiler(TRUE);
			$data = array(
				'firstname' =>$this->input->post('firstname', TRUE),
				'lastname' => $this->input->post('lastname', TRUE),
				'contact_num' => $this->input->post('contact_num', TRUE)
			);
			$this->Contact->update_contact($data);
			$this->session->set_flashdata('success', 'Contact updated successfully.');
			redirect('/contacts');
		}
	}

	public function remove_contact(){
		$id = $this->input->post('id');
		$this->Contact->delete_contact($id);
		$this->session->set_flashdata('success', 'Contact removed successfully.');
		redirect('/contacts');
	}
}
