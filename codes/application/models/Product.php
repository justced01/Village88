<?php 
    if(!defined('BASEPATH')) exit('No direct script access allowed');
    class Product extends CI_Model {
        /**
         * DOCU: This function is to fetch all categories in product_categories table 
         * Owned by: Cedrick Dela Carcel
         */
        public function fetch_categories(){
            return $this->db->query("SELECT * FROM product_categories")->result_array();;
        }
        /**
         * DOCU: This function is to fetch all products in products table with join of product_images table 
         * Owned by: Cedrick Dela Carcel
         */
        public function fetch_all_products(){
            return $this->db->query("SELECT products.id, products.name, products.price, products.inventory_stock, products.stock_sold, product_images.filepath 
                    FROM products 
                    LEFT JOIN product_images ON product_images.product_id = products.id
                    WHERE filepath LIKE '%main%'"
                )->result_array();
        }
        /**
         * DOCU: This function is to fetch limit products in products table with join of product_images table 
         * Owned by: Cedrick Dela Carcel
         */
        public function fetch_products_catalog($offset, $limit_records){
            return $this->db->query("SELECT products.id, products.name, products.price, products.inventory_stock, products.stock_sold, product_images.filepath 
                    FROM products 
                    LEFT JOIN product_images ON product_images.product_id = products.id
                    WHERE filepath LIKE '%main%'
                    LIMIT $offset, $limit_records"   
                )->result_array();
        }
        /**
         * DOCU: This function is to fetch similar products depends on the show page
         * Owned by: Cedrick Dela Carcel
         */
        public function fetch_similar_products($id, $product){
            return $this->db->query("SELECT products.id, products.product_category_id, products.name, products.price, products.inventory_stock, products.stock_sold, product_images.filepath 
                    FROM products 
                    LEFT JOIN product_images ON product_images.product_id = products.id
                    WHERE filepath LIKE '%main%' AND products.product_category_id = '{$product['product_category_id']}' AND products.id != $id
                    LIMIT 5"   
                )->result_array();
        }
        /**
         * DOCU: This function is to fetch limit products in products table with join of product_images table 
         * Owned by: Cedrick Dela Carcel
         */
        public function fetch_products($offset, $limit_records){
            return $this->db->query("SELECT products.id, products.name, products.price, products.inventory_stock, products.stock_sold, product_images.filepath 
                    FROM products 
                    LEFT JOIN product_images ON product_images.product_id = products.id
                    WHERE filepath LIKE '%main%'
                    LIMIT $offset, $limit_records"   
                )->result_array();
        }
        /**
         * DOCU: This function is to fetch all products in products table 
         * Owned by: Cedrick Dela Carcel
         */
        public function fetch_product($id){
            return $this->db->query("SELECT * FROM products WHERE id = ?", array($id))->row_array();
        }
        /**
         * DOCU: This function is to fetch all products images in product_images table 
         * Owned by: Cedrick Dela Carcel
         */
        public function fetch_img_product($id){
            return $this->db->query("SELECT * FROM product_images WHERE product_id = ?", array($id))->result_array();
        }
        /**
         * DOCU: This function is to insert new category in product_categories table 
         * Owned by: Cedrick Dela Carcel
         */
        public function new_category($category){
            $id = $this->db->insert_id($this->db->query("INSERT INTO product_categories(category, created_at, updated_at) VALUES (?,NOW(),NOW())", array($category)));
            return $id;
        }
        /**
         * DOCU: This function is to insert uploaded images in product_images table 
         * Owned by: Cedrick Dela Carcel
         */
        public function upload_imgs($product_id, $category_id, $files){
            $categories = $this->product->fetch_categories();

            if(!empty($files['main_img'])){
                foreach($categories as $category){
                    if($category['id'] === $category_id){
                        $folder['category'] = strtolower(str_replace(' ', '', $category['category']));
                        $upload_dir = 'uploads/' . $folder['category'];

                        $file_name = "main_" . $files['main_img']['name'];
                        move_uploaded_file($files['main_img']['tmp_name'], $upload_dir . "/" . $file_name);

                        $filepath = $upload_dir . "/" . $file_name;
                        $query = "INSERT INTO product_images (product_id, filepath, created_at, updated_at) VALUES(?,?,NOW(),NOW())";
                        $values = array($product_id, $filepath);
                        $this->db->query($query, $values);
                    }
                }
            }

            if(!empty($files['thumbnails'])){
                foreach($categories as $category){
                    if($category['id'] === $category_id){
                        $folder['category'] = strtolower(str_replace(' ', '', $category['category']));
                        $upload_dir = 'uploads/' . $folder['category'];

                        foreach($files['thumbnails']['tmp_name'] as $key => $tmp_name){
                            $file_name = $files['thumbnails']['name'][$key];
                            move_uploaded_file($files['thumbnails']['tmp_name'][$key], $upload_dir . "/" . $file_name);

                            $filepath = $upload_dir . "/" . $file_name;
                            $query = "INSERT INTO product_images (product_id, filepath, created_at, updated_at) VALUES(?,?,NOW(),NOW())";
                            $values = array($product_id, $filepath);
                            $this->db->query($query, $values);
                        } 
                    }
                }
            }
            return 'success';
        }
        /**
         * DOCU: This function is to insert the post data and uploaded images in database after validation
         * Owned by: Cedrick Dela Carcel
         */
        public function insert_product($post){
            if(!empty($post['new_category'])){
                $category_id = $this->product->new_category($this->security->xss_clean($post['new_category']));
                $categories = $this->product->fetch_categories();
                foreach($categories as $category){
                    $folder['category'] = strtolower(str_replace(' ', '', $category['category']));
                    if(!is_dir("uploads/" . $folder['category'] . "/")){
                        mkdir("uploads/" . $folder['category'] . "/", 0777, TRUE);
                    }
                }
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
            $this->product->upload_imgs($id, $category_id, $_FILES);
            return $id;
        }
        /**
         * DOCU: This function is to update the product from the post data of editproduct form
         * Owned by: Cedrick Dela Carcel
         */
        public function edit_product($post, $id){
            $categories = $this->product->fetch_categories();
            foreach($categories as $value){
                if($value['category'] === $post['category']){
                    $category_id = $value['id'];
                }
                else if(isset($post['category_id'])){
                    if($value['id'] === $post['category_id'] && $value['category'] !== $post['category']){
                        $this->db->query("UPDATE product_categories SET category = ?, updated_at = NOW() WHERE id = ?", array($this->security->xss_clean($post['category']), $value['id']));
                        $category_id = $value['id'];
                    }
                }
            }
        
            $product_imgs = $this->product->fetch_img_product($id);
            foreach($product_imgs as $image){
                if($post['main_img'] === $image['id'] && !strpos($image['filepath'], 'main')){
                    $this->product->rename_main_img($id);
                    $new_filepath = $this->product->new_main_img($image);
                    $query = "UPDATE product_images SET filepath = ?, updated_at = NOW() WHERE id = ?";
                    $values = array($new_filepath, $this->security->xss_clean($post['main_img']));
                    $this->db->query($query, $values);
                }
            }
            $this->product->upload_imgs($id, $category_id, $_FILES);
            $query = "UPDATE products SET products.product_category_id = ?, products.name = ?, products.description = ?, products.updated_at = NOW() WHERE products.id = ?";
            $values = array(
                $category_id,
                $this->security->xss_clean($post['name']), 
                $this->security->xss_clean($post['description']), $id
            );
            return $this->db->query($query, $values);
        }
        /**
         * DOCU: This function is to delete a product from products table if product exist;
         * Owned by: Cedrick Dela Carcel
         */
        public function delete_product($id){
            return $this->db->query("DELETE FROM products WHERE id = $id");
        }
        /**
         * DOCU: This function is to delete a product from product_categories table if product exist;
         * Owned by: Cedrick Dela Carcel
         */
        public function delete_category($id){
            return $this->db->query("DELETE FROM product_categories WHERE id = $id");
        }
        /**
         * DOCU: This function is to delete a product image from product_image table if product exist;
         * Owned by: Cedrick Dela Carcel
         */
        public function delete_image($id){
            return $this->db->query("DELETE FROM product_images WHERE id = $id");
        }
        /**
         * DoCU: This function will trigger if main image is updated, it will replace the main image with the new selected image
         * Owned by: Cedrick Dela Carcel
         */
        public function rename_main_img($product_id){
            $product_imgs = $this->product->fetch_img_product($product_id);
            foreach($product_imgs as $image){
                if(strpos($image['filepath'], 'main')){
                    $new_name = str_replace('main_', '' , $image['filepath']);
                    rename($image['filepath'], $new_name);
                    $query = "UPDATE product_images SET filepath = ?, updated_at = NOW() WHERE id = ?";
                    $values = array($new_name, $image['id']);
                    return $this->db->query($query, $values);
                }
            }
        }
        /**
         * DoCU: This function will rename the existing image into a new main image if the user wants to change the main image of product.
         * Owned by: Cedrick Dela Carcel
         */
        public function new_main_img($image){
            $pos1 = strpos($image['filepath'], '/');
            $pos2 = strpos($image['filepath'], '/', $pos1 + 1);
            $filepath = substr($image['filepath'], $pos2);
            $img_filename = substr_replace($filepath, 'main_', 1, 0);
            $new_filepath = str_replace($filepath, $img_filename, $image['filepath']);
            rename($image['filepath'], $new_filepath);
            return $new_filepath;
        }
        /**
         * DOCU: This function is to find a product depends on the user input in search product form
         * Owned by: Cedrick Dela Carcel
         */
        public function find_product($post){
            $name = $this->security->xss_clean($post['filter']);
            $conditions = array();
            $query = "SELECT products.id, products.name, products.price, products.inventory_stock, products.stock_sold, product_images.filepath 
                    FROM products 
                    LEFT JOIN product_images ON product_images.product_id = products.id"
                ;   
            if(!empty($name)){
                $conditions[] = "products.name LIKE '%$name%'";
            }
            $sql = $query;
            if(!empty($conditions)){
                $sql .= " WHERE filepath LIKE '%main%' AND " . implode(' AND ', $conditions);
            }
            return $this->db->query($sql)->result_array();
        } 
        /**
         * DOCU: This function is to count products based on their category
         * Owned by: Cedrick Dela Carcel
         */
        public function count_products_by_category(){
            $categories = $this->product->fetch_categories();
            $array = array();
            foreach($categories as $category){
                $array[$category['category']] = $this->db->query("SELECT COUNT(*) AS total_category, product_category_id FROM products WHERE product_category_id = '{$category['id']}'")->row_array();
            }
            return $array;
        }
        /**
         * DOCU: This function is to filter the products by category
         * Owned by: Cedrick Dela Carcel
         */
        public function filter_category($id){
            return $this->db->query("SELECT products.id, products.name, products.price, products.inventory_stock, products.stock_sold, product_images.filepath 
                FROM products 
                LEFT JOIN product_images ON product_images.product_id = products.id
                WHERE product_images.filepath LIKE '%main%' AND products.product_category_id = $id")
                ->result_array();
        }
        /**
         * DOCU: This function is to filter the products by category
         * Owned by: Cedrick Dela Carcel
         */
        public function sort_product($post){
            $sort = $this->security->xss_clean($post['sort']);
            $conditions = array();
            $query = "SELECT products.id, products.name, products.price, products.inventory_stock, products.stock_sold, product_images.filepath 
                    FROM products 
                    LEFT JOIN product_images ON product_images.product_id = products.id"
                ;   
            if(!empty($sort)){
                $sort = strtoupper($sort);
                $conditions[] = "ORDER BY products.price $sort";
            }
            $sql = $query;
            if(!empty($conditions)){
                $sql .= " WHERE filepath LIKE '%main%' " . implode(' ', $conditions);
            }
            return $this->db->query($sql)->result_array();

        }
        /**
         * DOCU: This function is to validate the post data from add product form
         * Owned by: Cedrick Dela Carcel
         */
        public function validate_add($post){
            $this->form_validation->set_error_delimiters('<div class="my-1 text-sm text-red-500 font-semibold", </div>');
            $this->form_validation->set_rules('name', 'Product name', 'trim|required');
            $this->form_validation->set_rules('description', 'Description', 'trim|required');
            $this->form_validation->set_rules('price', 'Price', 'trim|required|integer|max_length[8]|is_natural');
            $this->form_validation->set_rules('inventory_stock', 'Inventory stock', 'trim|required|integer|max_length[8]|is_natural');
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
            else if($this->product->validate_main_img($_FILES) !== 'valid'){
                $result = $this->product->validate_main_img($_FILES);
                return $result;
            }
            else if($this->product->validate_thumbnails($_FILES) !== 'valid'){
                $result = $this->product->validate_thumbnails($_FILES);
                return $result;
            }
            return 'valid';
        }
        /**
         * DOCU: This function is to validate the post data from editproduct form
         * Owned by: Cedrick Dela Carcel
         */
        public function validate_update($post){
            $this->form_validation->set_error_delimiters('<div class="my-1 text-sm text-red-500 font-semibold", </div>');
            $this->form_validation->set_rules('name', 'Product name', 'trim|required');
            $this->form_validation->set_rules('description', 'Description', 'trim|required');
            if(empty($post['new_category'])){
                $this->form_validation->set_rules('category', 'Category', 'trim|required', array('required' => 'Please specify a category'));
            }
            else {
                $this->form_validation->set_rules('new_category', 'Category', 'trim|required|is_unique[product_categories.category]', array('required' => 'Please specify a new category'));
            }
            $this->form_validation->set_rules('main_img', 'Main Image', 'trim|required', array('required' => 'Please specify a main image'));

            if(!empty($_FILES['thumbnails']['name'][0])){
                if($this->product->validate_thumbnails($_FILES) !== 'valid'){
                    $result = $this->product->validate_thumbnails($_FILES);
                    return $result;
                }
            }  

            if(!$this->form_validation->run()){
                return array(validation_errors());
            } 
            return 'valid';
        }
        /**
         * DOCU: This function is to validate the uploaded image from add product form
         * Owned by: Cedrick Dela Carcel
         */
        public function validate_main_img($files){
            $valid_ext = array('png', 'jpg', 'jpeg');
            $img_ext = pathinfo($files['main_img']['name'], PATHINFO_EXTENSION);

            if(!in_array($img_ext, $valid_ext)){
                return 'Upload valid images. Only PNG, JPG and JPEG are allowed.';
            }
            else if($files['main_img']['size'] > 5000000){
                return 'Image size exceeds 5MB';
            }
            return 'valid';
        }
        /**
         * DOCU: This function is to validate the uploaded thumbnails from add product form
         * Owned by: Cedrick Dela Carcel
         */
        public function validate_thumbnails($files){
            $valid_ext = array('png', 'jpg', 'jpeg');
            foreach($files['thumbnails']['tmp_name'] as $key => $tmp_name){
                $file_name = $files['thumbnails']['name'][$key];
                $thumbnail_ext = pathinfo($file_name, PATHINFO_EXTENSION);

                if(!in_array($thumbnail_ext, $valid_ext)){
                    return 'Upload valid thumbnails. Only PNG, JPG and JPEG are allowed. File name: ' . $files['thumbnails']['name'][$key];
                }
                else if($files['thumbnails']['size'][$key] > 5000000){
                    return 'Thumbnails (' . $files['thumbnails']['name'][$key] . ') size exceeds 5MB';
                }
            }
            return 'valid';
        }
        /**
         * DOCU: This function is to validate the search input from search product form
         * Owned by: Cedrick Dela Carcel
         */
        public function validate_search(){
            $this->form_validation->set_error_delimiters('<div class="my-1 text-sm text-red-500 font-semibold", </div>');
            $this->form_validation->set_rules('filter', 'Search box', 'trim|required', array('required' => 'Search field cannot be empty'));
            if(!$this->form_validation->run()){
                return array(validation_errors());
            } 
            return 'valid';
        }
        /**
         * DOCU: This function is to validate the sort input from sort product form
         * Owned by: Cedrick Dela Carcel
         */
        public function validate_sort(){
            $this->form_validation->set_rules('sort', 'Sort', 'trim|alpha');
            if(!$this->form_validation->run()){
                return array(validation_errors());
            } 
            return 'valid';
        }
    }