<?php 
    Class User {
        public $username;
        protected $email; // Can only be use internally classes and use directly out of class which inherits from this class
        public $role = 'Member';

        public function __construct($username, $email){
            $this->username = $username;
            $this->email = $email;
        }

        public function addFriend(){
            return "$this->username added new friend with email $this->email";
        }

        public function message(){ 
            return "$this->email has sent a new message to $this->username";
        }

        public function getEmail(){
            return $this->email;
        }

        public function setEmail($email){
            if(strpos($email, '@') > -1){
                $this->email = $email;
            }
        }

        // Clone & Destruct
        // https://www.php.net/manual/en/language.oop5.magic.php
        public function __destruct(){ // used to perform cleanup or run any final code
            echo "This user $this->email has been removed <br>";
        }

        public function __clone(){ // An object copy is created by using the clone keyword (which calls the object's __clone() method if possible).
        }
    }

    // Inheritance
    Class AdminUser extends User{
        public $level;
        // override properties
        public $role = 'Admin';

        public function __construct($username, $email, $level){
            $this->level = $level;
            // Preserving
            parent::__construct($username, $email); // inherited from parent class which is the User class
        }

        // Override methods
        public function message(){ 
            return "$this->email, an admin has sent a new message to $this->username"; // Email is private
            // echo parent::message();
        }
    }

    // instances
    $userOne = new User('luigi', 'luigi@gmail.com');
    $userTwo = new User('mario', 'mario@gmail.com');  

    // Inheritance
    $userThree = new AdminUser('newbie', 'newbie@gmail.com', 5);  
    echo $userThree->username . "<br>";
    echo $userThree->level . "<br>";
    echo $userThree->getEmail() . "<br>";

    // Overriding properties
    echo $userOne->role . "<br>";
    echo $userThree->role . "<br>";

    // Overriding methods 
    echo $userOne->message(). "<br>";
    echo $userThree->message(). "<br>";

    // Clone & Destruct
    // unset($userOne);

    $userFour = clone $userOne;
    // When an object is cloned, PHP will perform a shallow copy of all of the object's properties. Any properties that are references to other variables will remain references.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOP PHP</title>
</head>
<body>
    
</body>
</html>