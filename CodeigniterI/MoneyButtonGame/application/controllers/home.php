<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index(){
		$this->load->view('index');
	}

	public function process(){
		if(!$this->session->has_userdata('money')){
			$this->session->set_userdata('money', 500);
			$this->session->set_userdata('chance', 10);
		}
		if(!$this->session->has_userdata('message')){
			$this->session->set_userdata('message', array());
		}

		$risks = array(
			'low' => array('min' => -25, 'max' => 100, 'name' => 'Low Risk'),
			'moderate' => array('min' => -100, 'max' => 1000, 'name' => 'Moderate Risk'),
			'high' => array('min' => -500, 'max' => 2500, 'name' => 'High Risk'),
			'severe' => array('min' => -3000, 'max' => 5000, 'name' => 'Severe Risk')
		);

		foreach($risks as $key => $risk){
			if($this->input->post('action') == $key && $this->session->userdata('chance') >= 0){
				$this->session->set_userdata('value', rand($risk['min'], $risk['max']));
				$this->session->set_userdata('name', $risk['name']);
				$value = $this->session->userdata('value');
				$money = $this->session->userdata('money');
				$chance = $this->session->userdata('chance');
				$chance--;
				$this->session->set_userdata('money', $money += $value);
				$this->session->set_userdata('chance', $chance);
			}
		}

		$message = $this->session->userdata('message');
		array_push($message, array(	
			'value' => $this->session->userdata('value'),
			'money' => $this->session->userdata('money'),
			'chance' => $this->session->userdata('chance'),
			'name' => $this->session->userdata('name')
		));
		$this->session->set_userdata('message', $message);
		redirect('/home');
	}

	public function reset(){
		if($this->input->post('action') && $this->input->post('action') == 'reset'){
			$this->session->set_userdata('money', 500);
			$this->session->set_userdata('chance', 10);
			$this->session->set_userdata('message', array());
		}
		redirect('/home');
	}
}
