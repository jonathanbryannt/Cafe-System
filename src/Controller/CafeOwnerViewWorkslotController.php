<?php

include_once "../Entity/Workslot.php";

class CafeOwnerViewWorkslotController {
    
    public function getWorkslots() {
        $workslot = new Workslot();
        return $workslot->getWorkslots();
    }

}

?>