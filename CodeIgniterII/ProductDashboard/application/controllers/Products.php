<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
    /**
     * DOCU: This function is to load the new product page
     * Owner: Cedrick Dela Carcel
     */
	public function new(){
        $user = $this->session->userdata();
        $data['header'] = array(
            'title' => 'New Product - ' . $user['user_level'],
            'page' => 'dashboard',
            'anchor' => 'Logout',
            'link' => 'logout'
        );
        $this->load->view('components/header', $data);
		$this->load->view('products/new_product', $user);
	}
    /**
     * DOCU: This function is to load the new product page
     * Owner: Cedrick Dela Carcel
     */
	public function edit($id){
        $product['product'] = $this->product->get_product($id);
        $user = $this->session->userdata();
        $data['header'] = array(
            'title' => 'Edit Product - ' . $user['user_level'],
            'page' => 'dashboard',
            'anchor' => 'Logout',
            'link' => 'logout'
        );
        $this->load->view('components/header', $data);
		$this->load->view('products/edit_product', $product);
	}
    /**
     * DOCU: This function is to delete specific product in dashboard page
     * Owner: Cedrick Dela Carcel
     */
	public function remove($id){
        $this->product->remove_product($id);
        redirect('dashboard');
	}
    /**
     * DOCU: This function is to load the show product page
     * Owner: Cedrick Dela Carcel
     */
	public function show($id){
        $user_messages = $this->message->get_messages($id);
        $inbox = array();
        foreach($user_messages as $user_message){
            $comments = $this->comment->get_comments($user_message['message_id']);
            $user_message["comments"] = $comments;
            $inbox[] = $user_message;
        }
        $data['header'] = array(
            'title' => 'Product Information',
            'page' => 'dashboard',
            'anchor' => 'Logout',
            'link' => 'logout',
        );
        $param = array('products' => $this->product->get_product($id), 'inbox' => $inbox);
        $this->load->view('components/header', $data);
		$this->load->view('products/show_product', $param);
	}
    /**
     * DOCU: This function is to validate and process the post data from new product page
     * Owner: Cedrick Dela Carcel
     */
    public function process_product(){
        $result = $this->product->validate_product($this->input->post());
        if($result === 'valid'){
            $this->product->create_product($this->input->post());
            redirect('products/new');
        }
        else {
            $this->session->set_flashdata('errors', $result);
            redirect('products/new');
        }
    }
    /**
     * DOCU: This function is to validate and process the post data from edit product page
     * Owner: Cedrick Dela Carcel
     */
    public function process_edit_product($id){
        $result = $this->product->validate_product($this->input->post());
        if($result === 'valid'){
            $this->product->update_product($this->input->post());
            redirect('products/edit/' . $id);
        }
        else {
            $this->session->set_flashdata('errors', $result);
            redirect('products/edit/' . $id);
        }
    }
    /**
     * DOCU: This function is to validate and process the post message data from edit product page
     * Owner: Cedrick Dela Carcel
     */
    public function add_message($id){
        $result = $this->message->validate_message($this->input->post());
        $user_id = $this->session->userdata('user_id');
        if($result === 'valid'){
            $this->message->add_message($this->input->post(), $user_id);
            redirect('products/show/' . $id);
        }
        else {
            $this->session->set_flashdata('errors', $result);
            redirect('products/show/' . $id);
        }
    }
    /**
     * DOCU: This function is to validate and process the post comment data from edit product page
     * Owner: Cedrick Dela Carcel
     */
    public function add_comment($id){
        $result = $this->comment->validate_comment($this->input->post());
        $user_id = $this->session->userdata('user_id');
        if($result === 'valid'){
            $this->comment->add_comment($this->input->post(), $user_id);
            redirect('products/show/' . $id);
        }
        else {
            $this->session->set_flashdata('errors', $result);
            redirect('products/show/' . $id);
        }
    }
}
