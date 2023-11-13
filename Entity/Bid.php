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

    public function getBidsById($cafeStaffId) {
        $DAO = new DAO();
        $connection = $DAO->get_connection();

        $sql = "SELECT `staff_bid_workslot_id`, `staff_bid_workslot`.`workslot_id`, `workslot_name`, `workslot_date`, `start_time`, `end_time`, `bid_status` FROM `staff_bid_workslot` LEFT JOIN `workslot` ON `staff_bid_workslot`.`workslot_id` = `workslot`.`workslot_id`";
        return $connection->query($sql);
    }

}

?>