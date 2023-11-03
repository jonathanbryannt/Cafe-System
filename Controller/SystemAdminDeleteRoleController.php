<?php

include "../Entity/Role.php";

class SystemAdminDeleteRoleController {

    public static function deleteRoleById($id) {
        return Role::deleteRoleById($id);
    }

}

?>