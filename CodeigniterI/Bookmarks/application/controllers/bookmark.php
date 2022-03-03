<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bookmark extends CI_Controller {

	public function index(){
		$this->load->database();  
		$this->load->model('select');  
		$data['books'] = $this->select->getAllBooks();  
		$this->load->view('index', $data);
	}

	public function process(){
		if($this->input->post('submit') && $this->input->post('submit') == 'Add'){
			$errors = array();
			if(empty($this->input->post('name'))){
				$errors[] = 'Name is required';
			}

			if(empty($this->input->post('url'))){
				$errors[] = 'URL is required';
			}

			if(!empty($errors)){
				$this->session->set_userdata('errors', $errors);
				redirect('/bookmark');
			}
			else {
				$data = array(
					'name' =>$this->input->post('name'),
					'url' => $this->input->post('url'),
					'folder' => $this->input->post('folder'),
					'created_at' => date('Y-m-d H:i:s')
				);
				$this->db->insert('books', $data);
				redirect('/bookmark');
			}
		}
	}

	public function destroy($id){
		$this->load->database();  
		$this->load->model('select');  
		$data['book'] = $this->select->getBook($id); 
		$this->load->view('destroy', $data);

		if($this->input->post('action') && $this->input->post('action') == 'delete'){
			$data['book'] = $this->select->deleteBook($id); 
			redirect('/bookmark');
		}
		else if($this->input->post('action') && $this->input->post('action') == 'cancel'){
			redirect('/bookmark');
		}
	}
}
