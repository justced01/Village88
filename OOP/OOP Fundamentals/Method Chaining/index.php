<?php
    Class Item {
        public $name;
        public $price;
        public $stock;
        public $sold;
        public $total_sales;

        public function __construct($name, $price, $stock){
            $this->name = $name;
            $this->price = $price;
            $this->stock = $stock;
            $this->sold = 0;
        }

        public function buy(){
            if($this->stock > 0){
                $this->sold += 1;
                $this->stock -= 1;
                echo "Buying<br>";
                return $this;
            }
            else {
                $this->stock = 0;
                return $this;
            }
        }

        public function return(){
            if($this->sold > 0){
                $this->sold -= 1;
                $this->stock += 1;
                echo "Returning<br>";
                return $this;
            }
            else {
                echo "Returning<br>";
                $this->stock += 1;
                $this->sold = 0;
                return $this;
            }
        }
        public function logDetails(){
            return "Name: $this->name" . "<br>" . "Price: $this->price" . "<br>" . "Stock: $this->stock" . "<br>" . "Sold: $this->sold" . "<br>";
        }
    }

    $item1 = new Item("Apple", 50, 20);
    echo $item1->buy()->buy()->buy()->return()->logDetails() . "<br><br>";

    $item2 = new Item("Orange", 35, 15);
    echo $item2->buy()->buy()->return()->return()->logDetails() . "<br><br>";

    $item3 = new Item("Mango", 60, 10);
    echo $item3->buy()->return()->return()->return()->logDetails();

?>