<?php

include_once "../Entity/Workslot.php";

class CafeOwnerUpdateWorkslotController {

    public function updateWorkslot($workslotData) {
        $workslot = new Workslot();
        return $workslot->updateWorkslot($workslotData);
    }

    public function getWorkslotById($workslotId) {
        $workslot = new Workslot();
        return $workslot->getWorkslotById($workslotId);
    }

}

?>