<?php
	require_once('application/libraries/stripe-php/init.php');
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Carts extends CI_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->database();
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
			$this->form_validation->set_rules('quantity', 'Quantity', 'required|numeric|is_natural_no_zero|less_than_equal_to[50]');
			$this->form_validation->set_rules('item', 'Item', 'callback_item_exist');
			if($this->form_validation->run() === FALSE){
				$this->session->set_flashdata('error', validation_errors('<p class="error">', '</p>'));
				redirect('/');
			}
			else {
				$items = $this->Cart->find_item($this->input->post('item', TRUE));
				$data = array(
					'item_id' => $items['id'],
					'quantity' => $this->input->post('quantity', TRUE)
				);
			}
			$this->session->set_flashdata('success', 'Item has been added.');
			$this->Cart->insert_items($data);
			redirect('/');
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