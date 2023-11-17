<?php

include_once "../Entity/Profile.php";

class SystemAdminUpdateProfileController {

    public function getProfileById($id) {        
        $profile = new Profile();
        return $profile->getProfileById($id);
    }

    public function updateProfile($profileData) {        
        $profile = new Profile();
        return $profile->updateProfile($profileData);
    }

}

?>