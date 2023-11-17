<?php

include_once "../DAO/DAO.php";

class User {

    private $id;
    private $name;
    private $email;    
    private $profile;
       
    public function __construct($id = null, $name = null, $email = null, $profile = null) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->profile = $profile;
    }  

    public function getId() {
        return $this->id;
    }

    public function getProfile() {
        return $this->profile;
    }

    public function getName() {
        return $this->name;
    }

    public function getIdByEmail($email) {
        $DAO = new DAO();
        $connection = $DAO->get_connection();

        $sql = "SELECT `user_id` FROM `user` WHERE `email` = '$email';";
        return $connection->query($sql);
    }

    public function createUser($userData) {
        $DAO = new DAO();
        $connection = $DAO->get_connection();

        $stmt = $connection->prepare("INSERT INTO `user` (`user_id`, `email`, `password`, `name`, `profile_id`, `status`) VALUES (NULL, (?), (?), (?), (?), 'ACTIVE');");
        $stmt->bind_param("ssss", $userData['email'], $userData['password'], $userData['name'], $userData['profile_id']);
        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function getUserById($id) {
        $DAO = new DAO();
        $connection = $DAO->get_connection();

        $sql = "SELECT `user_id`, `email`, `name`, `profile_id`, `status` FROM `user` WHERE `user_id` = $id;";
        return $connection->query($sql);
    }

    public function getUsers() {
        $DAO = new DAO();
        $connection = $DAO->get_connection();

        $sql = "SELECT `user_id`, `email`, `name`, `profile_name`, `status` FROM `user` LEFT JOIN `profile` ON `user`.`profile_id` = `profile`.`profile_id`";
        return $connection->query($sql);
    }    

    public function updateUser($userData) {
        $DAO = new DAO();
        $connection = $DAO->get_connection();

        $stmt = $connection->prepare("UPDATE `user` SET `email` = (?), `name` = (?), `profile_id` = (?) WHERE `user`.`user_id` = (?)");
        $stmt->bind_param("ssss", $userData['email'], $userData['name'], $userData['profile_id'], $userData['user_id']);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function suspendUser($userId) {
        $DAO = new DAO();
        $connection = $DAO->get_connection();

        $sql = "UPDATE `user` SET `status` = 'INACTIVE' WHERE `user`.`user_id` = $userId";
        if($connection->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function reactivateUser($userId) {
        $DAO = new DAO();
        $connection = $DAO->get_connection();

        $sql = "UPDATE `user` SET `status` = 'ACTIVE' WHERE `user`.`user_id` = $userId";
        if($connection->query($sql)) {
            return true;
        } else {
            return false;
        }
    }
}

?>