<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback extends CI_Controller {

	public function index(){
		$this->load->view('form/index');
	}
	
	public function process(){
		if(isset($_POST['submit'])){
			$data = array(
				'name' => $_POST['name'],
				'course' => $_POST['course'],
				'score' => $_POST['score'],
				'reason' => $_POST['reason'],
			);
		}
		$this->load->view('form/success', $data);
	}
}
