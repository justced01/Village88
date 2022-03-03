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
            $this->total_sales = 0;
        }

        public function logDetails(){
            return "Name: $this->name" . "<br>" . "Price: $this->price" . "<br>" . "Stock: $this->stock" . "<br>" . "Sold: $this->sold" . "<br>" . "Sales: $this->total_sales";
        }

        public function buy($sold){
            if($this->stock > 0){
                $this->total_sales = $this->price * $sold;
                for($index = 0; $index < $sold; $index++){
                    $this->stock -= 1;
                    $this->sold += 1;
                    echo "Buying ";
                }
                echo "<br>";
            }
            else {
                $this->stock = "No stock available";
            }
        }

        public function return($return){
            if($this->stock > 0){
                $this->total_sales = $this->total_sales - ($this->price * $return);
                for($index = 0; $index < $return; $index++){
                    $this->stock += 1;
                    if($this->sold > 0){
                        $this->sold -= 1;
                    }
                    echo "Return <br>";
                }
                echo "<br>";
            }
            else {
                $this->stock = "No stock available";
            }
        }
    }

    // Instances
    $item1 = new Item("Apple", 50, 20);
    $item1->buy(3);
    $item1->return(1);
    echo $item1->logDetails() . "<br><br>";

    $item2 = new Item("Orange", 35, 15);
    $item2->buy(2);
    $item2->return(2);
    echo $item2->logDetails() . "<br><br>";

    $item3 = new Item("Mango", 60, 10);
    $item3->buy(0);
    $item3->return(3);
    echo $item3->logDetails() . "<br>";
?>