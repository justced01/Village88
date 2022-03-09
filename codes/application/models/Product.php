<?php 
    if(!defined('BASEPATH')) exit('No direct script access allowed');
    class Product extends CI_Model {
        /**
         * DOCU: This function is to fetch all categories in product_categories table 
         * Owned by: Cedrick Dela Carcel
         */
        public function fetch_categories(){
            $id = $this->db->insert_id($this->db->query("SELECT * FROM product_categories")->result_array());
            return $id;
        }
        /**
         * DOCU: This function is to insert new category in product_categories table 
         * Owned by: Cedrick Dela Carcel
         */
        public function new_category($category){
            return $this->db->query("INSERT INTO product_categories(category, created_at, updated_at) VALUES (?,NOW(),NOW())", array($category));
        }
        /**
         * DOCU: This function is to insert uploaded images in product_images table 
         * Owned by: Cedrick Dela Carcel
         */
        public function upload_imgs($product_id, $category_id){
            $categories = $this->product->fetch_categories();
            foreach($categories as $folder){
                if(!is_dir("uploads/" . $folder['category'] . "/")){
                    mkdir("uploads/" . $folder['category'] . "/");
                }
            }
            foreach($categories as $category){
                if($category['id'] === $category_id){
                    $upload_dir = base_url() . 'uploads/' . $category['category'];
                    foreach($_FILES['thumbnails']['tmp_name'] as $key => $tmp_name){
                        $file_name = $_FILES['thumbnails']['name'][$key];
                        $file_tmp = $_FILES['thumbnails']['tmp_name'][$key];
                    } 
                }
            }
        }
        /**
         * DOCU: This function is to insert the post data and uploaded images in database after validation
         * Owned by: Cedrick Dela Carcel
         */
        public function insert_product($post){
            if(!empty($post['new_category'])){
                $category_id = $this->product->new_category($this->security->xss_clean($post['new_category']));
            } else {
                $category_id = $this->security->xss_clean($post['category']);
            }
            $query = "INSERT INTO products(product_category_id, name, description, price, inventory_stock, created_at, updated_at) VALUES(?,?,?,?,?,NOW(),NOW())";
            $values = array(
                $category_id,
                $this->security->xss_clean($post['name']),
                $this->security->xss_clean($post['description']),
                $this->security->xss_clean($post['price']),
                $this->security->xss_clean($post['inventory_stock'])
            );
            $id = $this->db->insert_id($this->db->query($query, $values));
            $this->product->upload_imgs($id, $category_id);
            return $id;
        }

        /**
         * DOCU: This function is to validate the post data from add product form
         * Owned by: Cedrick Dela Carcel
         */
        public function validate_add($post){
            $this->form_validation->set_error_delimiters('<div class="my-1 text-sm text-red-500 font-semibold", </div>');
            $this->form_validation->set_rules('name', 'Product name', 'trim|required');
            $this->form_validation->set_rules('description', 'Description', 'trim|required');
            $this->form_validation->set_rules('price', 'Price', 'trim|required|integer|max_length[8]');
            $this->form_validation->set_rules('inventory_stock', 'Inventory stock', 'trim|required|integer|max_length[8]');
            if(empty($post['new_category'])){
                $this->form_validation->set_rules('category', 'Category', 'trim|required|integer', array('required' => 'Please specify a category'));
            }
            else {
                $this->form_validation->set_rules('new_category', 'Category', 'trim|required|is_unique[product_categories.category]', array('required' => 'Please specify a new category'));
            }

            if(empty($_FILES['main_img']['name'])){
                $this->form_validation->set_rules('main_img', 'Main image', 'trim|required', array('required' => 'Please include an image'));
            }
            if(empty($_FILES['thumbnails']['name'])){
                $this->form_validation->set_rules('thumbnails', 'Other images', 'trim|required', array('required' => 'Please include other images'));
            }

            if(!$this->form_validation->run()){
                return array(validation_errors());
            } 
            else if($this->product->validate_img($_FILES) !== 'valid'){
                $result = $this->product->validate_img($_FILES);
                return $result;
            }
            return 'valid';
        }
        /**
         * DOCU: This function is to validate the uploaded image from add product form
         * Owned by: Cedrick Dela Carcel
         */
        public function validate_img($files){
            $valid_ext = array('png', 'jpg', 'jpeg');
            $img_ext = pathinfo($files['main_img']['name'], PATHINFO_EXTENSION);

            if(!in_array($img_ext, $valid_ext)){
                return 'Upload valid images. Only PNG and JPEG are allowed.';
            }
            else if($files['main_img']['size'] > 5000000){
                return 'Image size exceeds 5MB';
            }
            return 'valid';
        }
    }