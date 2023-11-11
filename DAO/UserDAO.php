<?php

include_once "../Entity/SAdmin.php";
include_once "../Entity/CafeOwner.php";
include_once "DAO.php";

class UserDAO extends DAO {    
    
    public function validateLogin($email, $password) {
        
        $connection = parent::get_connection();                

        $stmt = $connection->prepare("SELECT `user_id`, `email`, `password`, `name`, `user`.`profile_id`, `profile_name`, `status` FROM `user` LEFT JOIN `profile` ON `user`.`profile_id` = `profile`.`profile_id` WHERE `user`.`email` = (?)");
        $stmt->bind_param("s", $email);
        if($stmt->execute()) {            
            $stmt->bind_result($user_id, $email, $verifyPassword, $name, $profile_id, $profile_name, $status);
            $stmt->fetch();                                          
            if($password == $verifyPassword && $status == "ACTIVE") {                
                switch($profile_name) { 
                    case "SYSTEM ADMIN":
                        return new SAdmin($user_id, $name, $email);
                    case "CAFE OWNER":
                        return new CafeOwner($user_id, $name, $email);
                }
            }
        }
        
        return null;
    }  

    // Other methods for updating, deleting, and managing user data in the database
}


?>