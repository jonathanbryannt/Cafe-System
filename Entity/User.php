<?php

include "../DAO/DAO.php";

class User {

    private $id;
    private $name;
    private $email;    
    
    public function __construct($id, $name, $email) {
        $this->$id = $id;
        $this->$name = $name;
        $this->$email = $email;
    }  

    public static function createUser($userData) {
        $DAO = new DAO();
        $connection = $DAO->get_connection();

        $stmt = $connection->prepare("INSERT INTO `user` (`user_id`, `email`, `password`, `name`, `role_id`, `status`) VALUES (NULL, (?), (?), (?), (?), INACTIVE);");
        $stmt->bind_param("ssss", $userData['email'], $userData['password'], $userData['name'], $userData['role_id']);
        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public static function getUsers() {
        $DAO = new DAO();
        $connection = $DAO->get_connection();

        $sql = "SELECT `user_id`, `email`, `name`, `role_name`, `status` FROM `user` LEFT JOIN `roles` ON `user`.`role_id` = `roles`.`role_id`";
        return $connection->query($sql);
    }
}

?>