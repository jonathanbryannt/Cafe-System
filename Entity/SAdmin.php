<?php

include 'User.php';

class SAdmin extends User {
    
    public function __construct($ID, $name, $email) {
        parent::__construct($ID, $name, $email);
    }
}

?>