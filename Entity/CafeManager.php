<?php

include_once "User.php";

class CafeManager extends User {
    
    public function __construct($ID, $name, $email) {
        parent::__construct($ID, $name, $email, "CAFE MANAGER");        
    }

}

?>