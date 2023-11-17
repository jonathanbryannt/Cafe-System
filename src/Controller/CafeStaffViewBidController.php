<?php

include_once "../Entity/Bid.php";

class CafeStaffViewBidController {

    public function getBidsByStaffId($cafeStaffId) {
        $bid = new Bid();
        return $bid->getBidsByStaffId($cafeStaffId);
    }

}

?>