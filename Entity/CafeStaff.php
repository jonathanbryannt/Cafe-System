<?php

include_once "User.php";

class CafeStaff extends User{

    private $role;

    public function __construct($ID=null, $name=null, $email=null, $role=null) {
        parent::__construct($ID, $name, $email, "CAFE STAFF");        
    }

    public function getRole() {
        return $this->role;
    }

    public function createCafeStaff($cafeStaffData) {

        if(parent::createUser($cafeStaffData)) {
            $user_id = ((parent::getIdByEmail($cafeStaffData['email']))->fetch_assoc())['user_id'];            

            $DAO = new DAO();
            $connection = $DAO->get_connection();

            $stmt = $connection->prepare("INSERT INTO `cafe_staff` (`cafe_staff_id`, `user_id`, `role`) VALUES (NULL, (?), NULL);");
            $stmt->bind_param("s", $user_id);
            if($stmt->execute()) {
                return true;
            }
            return false;
        }
    }

    public function getCafeStaffs() {
        $DAO = new DAO();
        $connection = $DAO->get_connection();

        $sql = "SELECT `cafe_staff_id`, `user`.`name`, `role` FROM `cafe_staff` LEFT JOIN `user` ON `cafe_staff`.`user_id` = `user`.`user_id` WHERE `user`.`status` = 'ACTIVE'";

        return $connection->query($sql);
    }

    public function getAssignedCafeStaffs() {
        $DAO = new DAO();
        $connection = $DAO->get_connection();

        $sql = "SELECT `staff_workslots_id`, `staff_workslots`.`cafe_staff_id`, `user`.`name`, `cafe_staff`.`role`, `staff_workslots`.`workslot_id`, `workslot`.`workslot_name`, `workslot`.`workslot_date`, `workslot`.`start_time`, `workslot`.`end_time`         
        FROM `staff_workslots`
        LEFT JOIN `cafe_staff` ON `staff_workslots`.`cafe_staff_id` = `cafe_staff`.`cafe_staff_id`
        LEFT JOIN `workslot` ON `staff_workslots`.`workslot_id` = `workslot`.`workslot_id`
        LEFT JOIN `user` ON `cafe_staff`.`user_id` = `user`.`user_id`;";

        return $connection->query($sql);
    }

    public function getStaffById($userId) {
        $DAO = new DAO();
        $connection = $DAO->get_connection();

        $sql = "SELECT `cafe_staff_id`, `role` FROM `cafe_staff` WHERE `user_id` = $userId";
        return $connection->query($sql);
    }

    public function chooseRole($roleData) {
        $this->role = $roleData['role'];
        $DAO = new DAO();
        $connection = $DAO->get_connection();

        $stmt = $connection->prepare("UPDATE `cafe_staff` SET `role` = (?) WHERE `cafe_staff`.`cafe_staff_id` = (?)");
        $stmt->bind_param("ss", $roleData['role'], $roleData['cafe_staff_id']);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

}

?>