<?php

include_once "../Entity/Workslot.php";

class CafeStaffViewWorkslotController {

    public function getWorkslots() {
        $workslot = new Workslot();
        return $workslot->getWorkslots();
    }

}

?>