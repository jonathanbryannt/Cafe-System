<?php

include "./Entity/User.php";
include "../DAO/UserDAO.php";

class LogoutController {

    public static function logout() {
        session_start();

        header("Location: LoginPage.php");

        session_destroy();
    }

}

?>