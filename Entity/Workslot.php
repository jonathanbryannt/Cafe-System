<?php

include_once "../DAO/DAO.php";

class Workslot {

    public function __construct() {

    }

    public function getWorkslots() {
        $DAO = new DAO();
        $connection = $DAO->get_connection();

        $sql = "SELECT `workslot_id`, `workslot_name`, `chef_qty`, `cashier_qty`, `waiter_qty`, `workslot_date`, `start_time`, `end_time` FROM `workslot`";
        return $connection->query($sql);
    }

    public function getWorkslotById($id) {
        $DAO = new DAO();
        $connection = $DAO->get_connection();

        $sql = "SELECT `workslot_id`, `workslot_name`, `chef_qty`, `cashier_qty`, `waiter_qty`, `workslot_date`, `start_time`, `end_time`
                FROM `workslot` WHERE `workslot`.`workslot_id` = $id";

        return $connection->query($sql);
        
    }

    public function getAssignedWorkslots($cafeStaffId) {
        $DAO = new DAO();
        $connection = $DAO->get_connection();

        $sql = "SELECT `staff_workslots`.`workslot_id`, `workslot_name`, `chef_qty`, `cashier_qty`, `waiter_qty`, `workslot_date`, `start_time`, `end_time` 
                FROM `staff_workslots` LEFT JOIN `workslot` ON `staff_workslots`.`workslot_id` = `workslot`.`workslot_id` WHERE `staff_id` = '$cafeStaffId'";

        return $connection->query($sql);
    }

    public function createWorkslot($workslotData) {
        $DAO = new DAO();
        $connection = $DAO->get_connection();

        $stmt = $connection->prepare("INSERT INTO `workslot` (`workslot_id`, `workslot_name`, `chef_qty`, `cashier_qty`, `waiter_qty`, `workslot_date`, `start_time`, `end_time`) VALUES (NULL, (?), '0', '0', '0', (?), (?), (?));");
        $stmt->bind_param("ssss", $workslotData['workslot_name'], $workslotData['workslot_date'], $workslotData['start_time'], $workslotData['end_time']);
        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function updateWorkslot($workslotData) {
        $DAO = new DAO();
        $connection = $DAO->get_connection();

        $stmt = $connection->prepare("UPDATE `workslot` SET `workslot_name` = (?), `workslot_date` = (?), `start_time` = (?), `end_time` = (?) WHERE `workslot`.`workslot_id` = (?)");
        $stmt->bind_param("sssss", $workslotData['workslot_name'], $workslotData['workslot_date'], $workslotData['start_time'], $workslotData['end_time'], $workslotData['workslot_id']);
        if($stmt->execute()) {
            return true;
        } 
        return false;
    }

    public function deleteWorkslotById($id) {
        $DAO = new DAO();
        $connection = $DAO->get_connection();

        $sql  = "DELETE FROM `workslot` WHERE `workslot`.`workslot_id` = '$id'";
        if($connection->query($sql)) {
            return true;
        }else {
            return false;
        }
    }
}

?>