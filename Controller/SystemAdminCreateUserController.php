<?php

include_once "../Entity/User.php";
include_once "../Entity/Profile.php";


class SystemAdminCreateUserController {

    public function getProfiles() {
        $profile = new Profile();
        return $profile->getProfiles();
    }

    public function createUser($userData) {
        $user = new User();
        return $user->createUser($userData);        
    }
}

?>