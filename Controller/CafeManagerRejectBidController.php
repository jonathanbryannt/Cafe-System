<?php

include_once "../Entity/Bid.php";

class CafeManagerRejectBidController {

    public function rejectBid($bidId) {
        $bid = new Bid();
        return $bid->rejectBid($bidId);
    }

}

?>