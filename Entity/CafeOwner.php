<?php

include_once "User.php";

class CafeOwner extends User {

    public function __construct($ID, $name, $email) {
        parent::__construct($ID, $name, $email, "CAFE OWNER");        
    }

}

?>