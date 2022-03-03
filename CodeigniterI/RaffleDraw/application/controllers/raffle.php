<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Raffle extends CI_Controller {
	public function index(){
		$data = array(
			'ticket' => rand(1000000, 9999999)
		);
		$this->load->view('index', $data);
	}
	public function process(){
		if($this->input->post('action') && $this->input->post('action') == 'submit'){
			if(!$this->session->has_userdata('count')){
				$this->session->set_userdata('count', 1);
			}
			else if($this->input->post('reset')){
				$this->session->set_userdata('count', 0);
				redirect('/raffle');
			}
			else {
				$count = $this->session->userdata('count');
				$count++;
				$this->session->set_userdata('count', $count);
				redirect('/raffle');
			}
		}
	}
}
