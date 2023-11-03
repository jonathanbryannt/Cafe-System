<?php

include "../Entity/User.php";

class SystemAdminViewUserController {

    public static function getUsers() {
        return User::getUsers();
    }

}

?>