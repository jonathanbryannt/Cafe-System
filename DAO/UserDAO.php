<?php

include '../Entity/SAdmin.php';
include 'DAO.php';

class UserDAO extends DAO {    
    
    public function validateLogin($email, $password) {
        
        $connection = parent::get_connection();                

        $stmt = $connection->prepare("SELECT `user_id`, `email`, `password`, `name`, `role_id`, `status` FROM user WHERE email = (?)");
        $stmt->bind_param("s", $email);
        if($stmt->execute()) {            
            $stmt->bind_result($ID, $name, $verifyPassword, $type);
            $stmt->fetch();                                          
            if($password == $verifyPassword) {                
                switch($type) { 
                    case 'SYSTEM ADMIN':
                        return new SAdmin($ID, $name, $email);
                }
            }
        }
        
        return null;
    }  

    // Other methods for updating, deleting, and managing user data in the database
}


?>