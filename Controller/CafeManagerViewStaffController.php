<?php

include_once "../Entity/CafeStaff.php";

class CafeManagerViewStaffController {

    public function getCafeStaffs() {
        $cafeStaff = new CafeStaff();
        return $cafeStaff->getCafeStaffs();
    }

}

?>