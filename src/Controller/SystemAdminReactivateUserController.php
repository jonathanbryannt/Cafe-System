<?php

include_once "../Entity/User.php";

class SystemAdminReactivateUserController {

    public function reactivateUser($userId) {
        $user = new User();
        return $user->reactivateUser($userId);
    }

}

?>