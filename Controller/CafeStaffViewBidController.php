<?php

include_once "../Entity/Bid.php";

class CafeStaffViewBidController {

    public function getBidsById($cafeStaffId) {
        $bid = new Bid();
        return $bid->getBidsById($cafeStaffId);
    }

}

?>