<?php 
    Class HTML_Generator {
        public $array = array();

        public function __construct($array){
            $this->array = $array;
        }

        public function render_input(){
           foreach($this->array as $input => $value){
               echo "<label>$input: &nbsp</label>";
               echo "<input type='text' name='$input' value='$value'>&nbsp";
           }
        }
        public function render_list(){
            echo "<ul>";
            foreach($this->array as $list){
                echo "<li>$list</li>";
            }
            echo "</ul>";
        }
    }
    
    $html = new HTML_Generator(array("name" => "Bag", "price" => "250", "stocks" => "10"));
    echo $html->render_input();

    $html = new HTML_Generator(array("Apple", "Banana", "Cherry"));
    echo $html->render_list();
?>