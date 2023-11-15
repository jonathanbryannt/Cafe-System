<?php

include_once "../Entity/CafeStaff.php";

class CafeManagerViewStaffController {

    public function getCafeStaffs() {
        $cafeStaff = new CafeStaff();
        return $cafeStaff->getCafeStaffs();
    }

    public function getAssignedCafeStaffs() {
        $cafeStaff = new CafeStaff();
        return $cafeStaff->getAssignedCafeStaffs();
    }

}

?>