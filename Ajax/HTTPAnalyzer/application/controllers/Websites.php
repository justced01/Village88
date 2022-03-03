<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Websites extends CI_Controller {
	public function index(){
		$data['header'] = array('title' => 'HTTP Analyzer');
		$this->load->view('components/header', $data);
		$this->load->view('index');
	}
	public function get_page(){
		require('application/libraries/simple_html_dom.php');
		$html = file_get_html($this->input->post('url'));
		foreach($html as $element) {
			echo $element;
		}
	}
}
