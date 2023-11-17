<?php

include_once "../Entity/User.php";
include_once "../Entity/CafeStaff.php";
include_once "../Entity/Profile.php";

class SystemAdminCreateUserController {

    public function getProfiles() {
        $profile = new Profile();
        return $profile->getProfiles();
    }

    public function createUser($userData) {        
        if($userData['profile_name'] == "CAFE STAFF") {            
            $cafeStaff = new CafeStaff();
            return $cafeStaff->createCafeStaff($userData);
        }
        $user = new User();
        return $user->createUser($userData);        
    }
}

?>