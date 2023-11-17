<?php

include_once "../Entity/Workslot.php";

class CafeManagerUnassignStaffFromWorkslotController {

    public function unassignStaffFromWorkslot($staffWorkslotId, $workslotId, $staffRole) {
        $workslot = new Workslot();
        return $workslot->unassignStaffFromWorkslot($staffWorkslotId, $workslotId, $staffRole);
    }

}

?>