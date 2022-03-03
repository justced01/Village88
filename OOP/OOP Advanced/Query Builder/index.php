<?php
    require('Database.php');
    Class Sites extends Database {
        private $select;
        private $group_by;
        private $having;
        public $count = 'COUNT(*)'; 

        public function __construct($dbName){
            parent::connect($dbName);
        }

        public function select($column){
            $this->select = "SELECT " . implode(", ", $column) . " FROM sites";
        }

        public function group_by($column){
            $this->group_by = "GROUP BY $column"; 
        }

        public function having($condition, $operator, $value){
            $this->having = "HAVING $condition $operator $value";
        }

        public function get(){
            return $this->fetch_all("$this->select $this->group_by $this->having;");
        }
        
    }

    Class Clients extends Database {
        private $query;
        private $result;
        
        public function __construct($dbName){
            parent::connect($dbName);
        }

        public function where($columns){
            foreach($columns as $column => $value){
                $this->query = "SELECT * FROM clients WHERE $column = '$value' ";
            }
            return $this;
        }
        public function get(){
            $this->result = $this->fetch_all($this->query);
            return $this->result;
        }
    }
    $database = new Database();
    $sites = new Sites('lead_gen_business');
    $sites->select(array("client_id", $sites->count));
    $sites->group_by('client_id');
    $sites->having($sites->count, ">", 5);
    $site_results = $sites->get();

    // Done
    $clients = new Clients('lead_gen_business');
    $client_results = $clients->where(array("last_name" => "Owen"))->get();  //chaining methods
?>

<table width="50%" border="1">
    <tr>
        <td>client_id</td>
        <td>COUNT(*)</td>
    </tr>
<?php foreach ($site_results as $result){ ?>
    <tr>
        <td><?= $result['client_id'] ?></td>
        <td><?= $result['COUNT(*)'] ?></td>
    </tr>
<?php } ?>
</table>
<br>
<br>
<table width="50%" border="1">
    <tr>
        <td>client_id</td>
        <td>first_name</td>
        <td>last_name</td>
        <td>email</td>
        <td>joined_datetime</td>
    </tr>
<?php foreach ($client_results as $result){ ?>
    <tr>
        <td><?= $result['client_id'] ?></td>
        <td><?= $result['first_name'] ?></td>
        <td><?= $result['last_name'] ?></td>
        <td><?= $result['email'] ?></td>
        <td><?= $result['joined_datetime'] ?></td>
    </tr>
<?php } ?>
</table>