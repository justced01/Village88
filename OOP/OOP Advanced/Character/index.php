<?php
    Class Character {
        public $name;
        public $health = 100;
        public $stamina = 100;
        public $manna = 100;

        public function __construct($name){
            $this->name = $name;
        }

        public function walk(){
            $this->stamina -= 1;
            echo "$this->name walked..." . "<br>";
            return $this;
        }
        public function run(){
            $this->stamina -= 3;
            echo "$this->name ran..." . "<br>";
            return $this;
        }
        public function showStats(){
            echo "<br>" . "Name: $this->name" . "<br>" . "Health: $this->health" . "<br>" . "Stamina: $this->stamina" . "<br>" . "Manna: $this->manna. <br><br>";
        }
    }

    Class Shaman extends Character {
        public $health = 150;

        public function heal(){
            $this->health += 5;
            $this->stamina += 5;
            $this->manna += 5;
            echo "$this->name healed..." . "<br>";
            return $this;
        }
    }

    Class Swordsman extends Character {
        public $health = 170;

        public function slash(){
            $this->manna -= 10;
            echo "$this->name slashed..." . "<br>";
            return $this;
        }

        public function showStats(){
            echo "I am powerful!!!<br>";
            parent::showStats();
        }
    }

    $character1 = new Character('Peasant');
    $character1->walk()->walk()->walk()->run()->run()->showStats();

    $character2 = new Shaman('Shaman');
    $character2->walk()->walk()->walk()->run()->run()->heal()->showStats();

    $character3 = new Swordsman('Swordsman');
    $character3->walk()->walk()->walk()->run()->run()->slash()->slash()->showStats();
?>