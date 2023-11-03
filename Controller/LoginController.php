<?php

include "./Entity/User.php";
include "../DAO/UserDAO.php";

class LoginController {

    public function __construct() {

    }

    // public function oldVer() {
    //     session_start();                

    //     LoginUI::display();

    //     if(isset($_POST["login"])) {                                                            
    //         $loginAccess = User::validateLogin($_POST["email"], $_POST["password"]);
    //         if($loginAccess) {
    //             echo "success";   
    //             DashboardUI::display();
    //         } else {
    //             echo "false";
    //         }
    //     }                    

    // }

    public function login($email, $password) {     
        session_start();
        
        $userDAO = new UserDAO();        
        $user = $userDAO->validateLogin($email, $password);        

        if($user) {
            header("Location: SystemAdminDashboardPage.php");
        }
    }

}

?>