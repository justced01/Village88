<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Billings extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->helper('form');
        $this->load->model('Billing');
    }
    /**
     * DOCU: This function is triggered by default to render the Index page.
     * This loads 2011 client billing.  
     * Owner: Newbie, Cedrick Dela Carcel
     */
	public function index(){
        $index['data'] = array(
            'title' => 'Client Billing',
            'class' => 'class="dateform"',
            'result' => $this->Billing->total_cost()
        );
        $this->load->view('components/header', $index);
        $this->load->view('partials/flash_messages');
		$this->load->view('index', $index);
	}
    /**
     * DOCU: This function for getting the inputted start and end date
     * NOTE: This function is not yet implemented and well function. 
     * Owner: Newbie, Cedrick Dela Carcel
     */
    public function date_range(){
        $result = $this->Billing->validate($this->input->post());
        if($result === 'valid'){
            $date = array(
                'start' => $this->input->post('start_date', TRUE),
                'end' => $this->input->post('end_date', TRUE)
            );
            $this->Billing->total_cost($date);
            $this->session->set_flashdata('success', 'Success!');
            redirect('/');
        }
        else {
            $errors = array(validation_errors('<p class="error">', '</p>'));
            $this->session->set_flashdata('errors', $errors);
            redirect('/');
        }
    }
}
