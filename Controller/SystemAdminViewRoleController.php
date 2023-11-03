<?php

include "../Entity/Role.php";

class SystemAdminViewRoleController {

    public static function getRoles() {
        return Role::getRoles();
    }

}

?>