<?php

include_once "../Entity/Workslot.php";

class CafeOwnerCreateWorkslotController {

    public function createWorkslot($workslotData) {
        $workslot = new Workslot();
        return $workslot->createWorkslot($workslotData);
    }
}

?>