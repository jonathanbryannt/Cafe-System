<?php

include_once "../Entity/Bid.php";
include_once "../Entity/Workslot.php";

class CafeManagerAssignWorkslotController {

    public function getWorkslots() {
        $workslot = new Workslot();
        return $workslot->getWorkslots();
    }

    public function assignWorkslotByBidID($bidID) {
        $bid = new Bid();
        $workslot = new Workslot();
        
        $assignData = ($bid->getBidByID($bidID))->fetch_assoc();

        return $workslot->assignWorkslot($assignData);
    }

    public function assignWorkslot($assignData) {
        $workslot = new Workslot();
        return $workslot->assignWorkslot($assignData);
    }

}

?>