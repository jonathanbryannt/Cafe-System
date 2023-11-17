<?php

include_once "../Entity/Bid.php";

class CafeStaffCreateBidController {

    public function createWorkslotBid($workslotBidData) {
        $bid = new Bid();
        return $bid->createWorkslotBid($workslotBidData);
    }

}

?>