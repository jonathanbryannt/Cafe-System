<?php

include "../Entity/Role.php";

class SystemAdminCreateRoleController {

    public static function createRole($roleData) {
        if(Role::createRole($roleData)) {
            return true;
        }
    }

}

?>