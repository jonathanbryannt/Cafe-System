<?php

include_once "../Entity/User.php";
include_once "../DAO/UserDAO.php";

class LoginController {

    public function login($email, $password) {     
        session_start();
        
        $userDAO = new UserDAO();        
        $user = $userDAO->validateLogin($email, $password);        

        if($user) {
            $userProfile = $user->getProfile();           
            $userName = $user->getName();                         
            $_SESSION['currentProfile'] = $userProfile;            
            $_SESSION['currentName'] = $userName;
    
            return $user;            
        }    
        
        return null;
    }

}

?>