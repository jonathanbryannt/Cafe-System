<?php

include_once "../Entity/User.php";

class SystemAdminSuspendUserController {

    public function suspendUser($userId) {
        $user = new User();

        return $user->suspendUser($userId);
    }
    
}

?>