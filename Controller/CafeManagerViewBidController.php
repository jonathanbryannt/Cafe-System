<?php

include_once "../Entity/Bid.php";

class CafeManagerViewBidController {

    public function getBids() {
        $bid = new Bid();
        return $bid->getBids();
    }

}

?>