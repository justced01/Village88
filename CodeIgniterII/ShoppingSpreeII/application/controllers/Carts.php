<?php
	require_once('application/libraries/stripe-php/init.php');
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Carts extends CI_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->database();
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->model('Cart');
		}
		
		public function catalog(){
			$data['index'] = array(
				'title' => 'Catalog Page',
				'cart' => $this->Cart->count_cart(),
				'items' => $this->Cart->get_items()
			);
			$this->load->view('components/header', $data);
			$this->load->view('index', $data);
		}

		public function insert(){
			$result = $this->Cart->validate($this->input->post());
			if($result === 'valid'){
				$items = $this->Cart->find_item($this->input->post('item', TRUE));
				$data = array(
					'item_id' => $items['id'],
					'quantity' => $this->input->post('quantity', TRUE)
				);
				$this->Cart->insert_items($data);
				$this->session->set_flashdata('success', 'Item has been added.');
				redirect('/');
			} 
			else {
				$errors = array(validation_errors('<p class="error">', '</p>'));
				$this->session->set_flashdata('errors', $errors);
				redirect('/');
			}
		}

		public function checkout(){
			$data['index'] = array(
				'title' => 'Cart Page',
				'items' => $this->Cart->get_cart(),
				'total_price' => $this->Cart->total_price()
			);
			$this->load->view('components/header', $data);
			$this->load->view('checkout', $data);
		}

		public function remove($id){
			$this->Cart->remove_item($id);
			$this->session->set_flashdata('remove', 'Item has been removed.'); 
			redirect('/carts/checkout');
		}

		
        public function item_exist($id){
			if(!$this->Cart->find_item($id)){
				$this->form_validation->set_message('item_exist', 'Item does not exist.');
				return FALSE;
			}
		}

		// This could result in error after submit but it's authenticated in Stripe API
		// Refactoring Note: Client-side Validation, read the stripe js, read the docs in 
		// https://stripe.com/docs
		// https://stripe.com/docs/checkout/quickstart
		public function stripe_post(){
			\Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));
			\Stripe\Charge::create([
				'name' => $this->input->post('name'),
				'address' => $this->input->post('address'),
				'amount' => $this->input->post('total_price'),
				'card_num' => $this->input->post('card_num'),
				'currency' => "usd",
				'source' => $this->input->post('stripeToken'),
				'description' => "Test payment." 
			]);
				
			$this->session->set_flashdata('success', 'Payment made successfully.'); 
			redirect('/carts/checkout', 'refresh');
		}
	}
?>