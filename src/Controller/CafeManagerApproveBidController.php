<?php

include_once "../Entity/Bid.php";

class CafeManagerApproveBidController {

    public function approveBid($bidId) {
        $bid = new Bid();
        return $bid->approveBid($bidId);
    }

}

?>