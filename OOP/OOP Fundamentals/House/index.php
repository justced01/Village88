<?php
    Class House {
        public $location;
        public $price;
        public $lot;
        public $type;
        private $discount;
        private $totalPrice;

        public function __construct($location, $price, $lot, $type){
            $this->location = $location;
            $this->price = $price;
            $this->lot = $lot;
            $this->type = $type;
            $this->totalPrice = 0;

            if($this->type == 'Pre-selling'){
                $this->discount = .20;
                $this->totalPrice = $this->price - ($this->price * ($this->discount / 100));
            }
            else {
                $this->discount = .05;
                $this->totalPrice = $this->price - ($this->price * ($this->discount / 100));
            }

            echo $this->showAll($this->location, $this->price, $this->lot, $this->type , $this->discount * 100, $this->totalPrice);
        }

        public function showAll($location, $price, $lot, $type, $discount, $totalPrice){
            return "Location: $location <br>" . "Price: $price <br>" . "Lot: $lot <br>" . "Type: $type <br>" . "Discount: $discount% <br>" . "Total: $totalPrice <br><br>"; 
        }
    }
    $house1 = new House('La Union', 1500000, '100sqm', 'Pre-selling');
    $house2 = new House('Metro Manila', 1000000, '150sqm', 'Ready for Occupancy');
    $house3 = new House('Aklan', 2500000, '200sqm', 'Pre-selling');
    $house4 = new House('Pampanga', 50000, '80sqm', 'Ready for Occupancy');
    $house5 = new House('Cebu', 1900000, '340sqm', 'Pre-selling');
?>