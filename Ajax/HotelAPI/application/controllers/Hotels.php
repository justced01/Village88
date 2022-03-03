<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hotels extends CI_Controller {
	public function index(){
		$data['header'] = array('title' => 'Hotel Search');
		$this->load->view('components/header', $data);
		$this->load->view('index');
	}

	public function search(){
		$start_date = date("Y-m-d",strtotime($this->input->post('start_date')));
		$end_date = date("Y-m-d",strtotime($this->input->post('end_date')));
        //Additional request info:
        $options = [
                "http" => [
                    "method" => "GET",
                    "header" => "Content-Type: application/json\r\n" .
                        "x-api-key: sandb_wycotxZyhAkoUhzSW6QH5h7WpvyX2IPLt6QUHxpb\r\n"
                ]
        ];
            
        // Will store other Request info. DOCS: https://www.php.net/manual/en/function.stream-context-create.php
        $context = stream_context_create($options);
        $url = "https://sandbox.impala.travel/v1/hotels?start=".$start_date."&end=".$end_date;
        // DOCS: https://www.php.net/manual/en/function.file-get-contents.php
        echo file_get_contents($url, false, $context); 
    }
}
