<?php

include_once "../Entity/User.php";

class SystemAdminViewUserController {

    public function getUsers() {
        $user = new User();
        return $user->getUsers();        
    }

}

?>