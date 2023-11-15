<?php
    include_once "../DAO/DAO.php";
    
    class Profile {
        
        private $name;

        public function __construct($name = null) {
            $this->name = $name;
        }

        public function createProfile($profileData){            
            $DAO = new DAO();
            $connection = $DAO->get_connection();

            $stmt = $connection->prepare("INSERT INTO `profile` (`profile_id`, `profile_name`) VALUES (NULL, (?));");
            $stmt->bind_param("s", $profileData['name']);
            if($stmt->execute()) {
                return true;
            }
            return false;
        }

        public function getProfiles() {
            $DAO = new DAO();
            $connection = $DAO->get_connection();

            $sql = "SELECT `profile_id`, `profile_name` FROM `profile`";
            return $connection->query($sql);
        }

        public function getProfileById($id) {
            $DAO = new DAO();
            $connection = $DAO->get_connection();

            $sql = "SELECT `profile_id`, `profile_name` FROM `profile` WHERE `profile_id` = $id;";
            return $connection->query($sql);
        }

        public function updateProfile($profileData) {
            $DAO = new DAO();
            $connection = $DAO->get_connection();
        
            $stmt = $connection->prepare("UPDATE `profile` SET `profile_name` = (?) WHERE `profile`.`profile_id` = (?)");
            $stmt->bind_param("ss", $profileData['name'], $profileData['id']);
                        
            if ($stmt->execute()) {
                return true; 
            } else {
                return false;
            }
        }
        
    }

?>