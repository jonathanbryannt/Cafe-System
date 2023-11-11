<?php

include_once "../Entity/Workslot.php";

class CafeOwnerDeleteWorkslotController {

    public function deleteWorkslotById($id) {
        $workslot = new Workslot();
        return $workslot->deleteWorkslotById($id);
    }

}

?>