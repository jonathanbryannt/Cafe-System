<?php

include_once "../Entity/CafeStaff.php";

class CafeStaffChooseRoleController {

    public function chooseRole($roleData) {
        $cafeStaff = new CafeStaff();
        return $cafeStaff->chooseRole($roleData);
    }

}

?>