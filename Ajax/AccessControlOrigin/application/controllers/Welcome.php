<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
		public function index(){
			$this->load->view('components/header');
			$this->load->view('index');
		}

		public function search(){
			$game_id = str_replace(' ', '', $this->input->post('user_input'));
			$url = "https://www.freetogame.com/api/game?id=$game_id" ;
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$data = curl_exec($ch);
			$info = curl_getinfo($ch);
			curl_close($ch);
			echo $data;
		}
	}
  
