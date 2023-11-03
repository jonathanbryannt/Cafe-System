<?php

include "../Entity/Role.php";

class SystemAdminUpdateRoleController {

    public static function getRoleById($id) {
        return Role::getRoleById($id);
    }

    public static function updateRole($roleData) {
        return Role::updateRole($roleData);
    }

}

?>