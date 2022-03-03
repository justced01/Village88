<?php 
    Class User {
        // Properties and Methods defined

        // public properties that can access on each instance 
        // public $username = 'newbie';
        // public $email = 'jced.delacarcel@gmail.com';
        // This is not hardcoded
        public $username;
        private $email; // can access internally
        // Access modifiers {public, private, protected}
        // Use private if we want to restrict access and intend to use internally in class
        // Use protected 

        // Methods
        // constructor function -> We can use constructors to set up custom property values for every class instance that we create.
        public function __construct($username, $email){
            $this->username = $username;
            $this->email = $email;
        }

        // $this => refer to the instance/whatever instance is calling to
        public function addFriend(){
            // $this->username 
            return "$this->username added new friend with email $this->email";
        }

        // getters => will get and return properties
        public function getEmail(){
            return $this->email;
        }

        // setters => set/change the properties
        public function setEmail($email){
            if(strpos($email, '@') > -1){
                $this->email = $email;
            }
            else {
                return "Denied.";
            }
        }
    }

    // instances
    $userOne = new User('luigi', 'luigi@gmail.com'); // create a new object from the User class, and store in $userOne
    $userTwo = new User('mario', 'mario@gmail.com');  
    // echo get_class($userOne); // Output: User

    // The object operator, ->, is used in object scope to access methods and properties of an object.
    // here $userOne accessed the username properties.

    echo $userOne->username . "<br>"; // Output: luigi
    // echo $userOne->email . "<br>"; // Output: luigi@gmail.com
    echo $userOne->addFriend() . "<br>"; // Output: luigi added new friend with email luigi@gmail.com
    $userOne->setEmail('jced.delacarcel@gmail.com');
    echo $userOne->getEmail() . "<br>"; // Output: luigi@gmail.com

    // Changing the values to the Class
    echo $userTwo->username . "<br>"; // Output: mario
    // echo $userTwo->email . "<br>"; // Output: mario@gmail.com
    echo $userTwo->addFriend() . "<br>"; // Output: mario added new friend with email mario@gmail.com

    // built-in functions to get the properties/variables and methods in a Class
    // print_r(get_class_vars('User'));
    // echo "<br>";
    // print_r(get_class_methods('User'));

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