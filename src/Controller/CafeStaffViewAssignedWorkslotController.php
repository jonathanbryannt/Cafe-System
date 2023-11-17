<?php

include_once "../Entity/Workslot.php";

class CafeStaffViewAssignedWorkslotController {

    public function getAssignedWorkslots($cafeStaffId) {
        $workslot = new Workslot();
        return $workslot->getAssignedWorkslots($cafeStaffId);
    }

}

?>