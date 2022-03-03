<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Quotes extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Quote");
	}
	public function index_html()
	{
	  $result["quotes"] = $this->Quote->fetch_all();
	  $this->load->view("partials/quotes", $result);
	}
	public function index()
	{
		$this->load->view('index');
    }
	public function create()
	{
		// this is an associative array with 'author' and 'name' with values user entered in the form
		// this is what $(this).serialize() sent over to this URL
		$new_quote = $this->input->post();
		$this->Quote->create($new_quote);
		// after we create the new quote then we can query the database again and it will include the new 
		// one we just included
		$result["quotes"] = $this->Quote->fetch_all();
		// then we respond to the AJAX request with a partial that will use the $result variable to generate      
		// the appropriate html
		$this->load->view("partials/quotes", $result);
	}
  }
