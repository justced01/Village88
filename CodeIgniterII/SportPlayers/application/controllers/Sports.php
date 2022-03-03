<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sports extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('Sport');
    }
    /**
     * DOCU: This function is to displaying all players and sports, including displaying sports in forms
     * Owner: Cedrick Dela Carcel
     */
	public function index(){
        $data['index'] = array(
            'title' => 'Sport Player Lookup',
            'sports' => $this->Sport->get_sports(),
            'players' => $this->Sport->get_players()
        );
        $this->load->view('components/header', $data);
		$this->load->view('index', $data);
	}
    /**
     * DOCU: This function will search specific players depending on the user input
     * Owner: Cedrick Dela Carcel
     */
    public function search(){
        $result = $this->Sport->validate($this->input->post());
        if($result === 'valid'){
            $data['search'] = $this->Sport->search_player($this->input->post());
            $data['index'] = array(
                'title' => 'Sport Player Lookup',
                'sports' => $this->Sport->get_sports(),
            );
            $this->load->view('components/header', $data);
            $this->load->view('index', $data);
        }
        else {
            $errors = array(validation_errors());
            $this->session->set_flashdata('errors', $errors);
            redirect('/');
        }
    }
}
