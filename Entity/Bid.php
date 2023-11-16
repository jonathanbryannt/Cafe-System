<?php

include_once "../DAO/DAO.php";

class Bid {

    public function createWorkslotBid($workslotBidData) {
        $DAO = new DAO();
        $connection = $DAO->get_connection();

        $stmt = $connection->prepare("INSERT INTO `staff_bid_workslot` (`staff_bid_workslot_id`, `cafe_staff_id`, `workslot_id`, `bid_role`, `bid_status`) VALUES (NULL, (?), (?), (?), 'Open');");
        $stmt->bind_param("sss", $workslotBidData['cafe_staff_id'], $workslotBidData['workslot_id'], $workslotBidData['cafe_staff_role']);
        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function getBids() {
        $DAO = new DAO();
        $connection = $DAO->get_connection();

        $sql = "SELECT `staff_bid_workslot_id`, `cafe_staff_id`, `staff_bid_workslot`.`workslot_id`, `workslot_name`, `workslot_date`, `start_time`, `end_time`, `bid_status` FROM `staff_bid_workslot` LEFT JOIN `workslot` ON `staff_bid_workslot`.`workslot_id` = `workslot`.`workslot_id`";
        return $connection->query($sql);
    }

    public function getBidsByStaffId($cafeStaffId) {
        $DAO = new DAO();
        $connection = $DAO->get_connection();

        $sql = "SELECT `staff_bid_workslot_id`, `staff_bid_workslot`.`workslot_id`, `workslot_name`, `workslot_date`, `start_time`, `end_time`, `bid_status` FROM `staff_bid_workslot` LEFT JOIN `workslot` ON `staff_bid_workslot`.`workslot_id` = `workslot`.`workslot_id` WHERE `cafe_staff_id` = '$cafeStaffId'";
        return $connection->query($sql);
    }

    public function getBidById($bidId) {
        $DAO = new DAO();
        $connection = $DAO->get_connection();

        $sql = "SELECT `staff_bid_workslot_id`, `cafe_staff_id`, `workslot_id`, `bid_role` FROM `staff_bid_workslot` WHERE `staff_bid_workslot_id` = '$bidId'";

        return $connection->query($sql);
    }

    public function approveBid($bidId) {
        $DAO = new DAO();
        $connection = $DAO->get_connection();

        $stmt = $connection->prepare("UPDATE `staff_bid_workslot` SET `bid_status` = 'Approved' WHERE `staff_bid_workslot`.`staff_bid_workslot_id` = (?)");
        $stmt->bind_param("s", $bidId);
                    
        if ($stmt->execute()) {
            return true; 
        } else {
            return false;
        }
    }

    public function rejectBid($bidId) {
        $DAO = new DAO();
        $connection = $DAO->get_connection();

        $stmt = $connection->prepare("UPDATE `staff_bid_workslot` SET `bid_status` = 'Rejected' WHERE `staff_bid_workslot`.`staff_bid_workslot_id` = (?)");
        $stmt->bind_param("s", $bidId);
                    
        if ($stmt->execute()) {
            return true; 
        } else {
            return false;
        }
    }

}

?>