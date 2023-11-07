<?php

include_once "../Entity/User.php";
include_once "../Entity/Profile.php";

class SystemAdminUpdateUserController {

    public function getUserById($id) {
        $user = new User();
        return $user->getUserById($id);
    }

    public function updateUser($userData) {  
        $user = new User();      
        return $user->updateUser($userData);
    }

    public function getProfiles() {
        $profile = new Profile();
        return $profile->getProfiles();
    }

}

?>