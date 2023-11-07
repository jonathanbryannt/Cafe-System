<?php

include_once "../Entity/SAdmin.php";
include_once "DAO.php";

class UserDAO extends DAO {    
    
    public function validateLogin($email, $password) {
        
        $connection = parent::get_connection();                

        $stmt = $connection->prepare("SELECT `user_id`, `email`, `password`, `name`, `profile_id`, `status` FROM `user` WHERE `email` = (?)");
        $stmt->bind_param("s", $email);
        if($stmt->execute()) {            
            $stmt->bind_result($user_id, $email, $verifyPassword, $name, $profile_id, $status);
            $stmt->fetch();                                          
            if($password == $verifyPassword && $status == "ACTIVE") {                
                switch($profile_id) { 
                    case 1:
                        return new SAdmin($ID, $name, $email);
                }
            }
        }
        
        return null;
    }  

    // Other methods for updating, deleting, and managing user data in the database
}


?>