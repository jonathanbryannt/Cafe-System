<?php
    include "../DAO/DAO.php";
    
    class Role {
        
        private $name;

        public function __construct($name) {
            $this->$name = $name;
        }

        public static function createRole($roleData){            
            $DAO = new DAO();
            $connection = $DAO->get_connection();

            $stmt = $connection->prepare("INSERT INTO `roles` (`role_id`, `role_name`) VALUES (NULL, (?));");
            $stmt->bind_param("s", $roleData['name']);
            if($stmt->execute()) {
                return true;
            }
            return false;
        }

        public static function getRoles() {
            $DAO = new DAO();
            $connection = $DAO->get_connection();

            $sql = "SELECT `role_id`, `role_name` FROM `roles`";
            return $connection->query($sql);
        }

        public static function getRoleById($id) {
            $DAO = new DAO();
            $connection = $DAO->get_connection();

            $sql = "SELECT `role_id`, `role_name` FROM `roles` WHERE `role_id` = $id;";
            return $connection->query($sql);
        }

        public static function updateRole($roleData) {
            $DAO = new DAO();
            $connection = $DAO->get_connection();
        
            $stmt = $connection->prepare("UPDATE `roles` SET `role_name` = (?) WHERE `roles`.`role_id` = (?)");
            $stmt->bind_param("ss", $roleData['name'], $roleData['id']);
                        
            if ($stmt->execute()) {
                return true; 
            } else {
                return false;
            }
        }

        public static function deleteRoleById($id) {
            $DAO = new DAO();
            $connection = $DAO->get_connection();

            $sql  = "DELETE FROM `roles` WHERE `roles`.`role_id` = '$id'";
            if($connection->query($sql)) {
                return true;
            }else {
                return false;
            }
        }
        
    }

?>