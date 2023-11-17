<?php

include_once "../Entity/Profile.php";

class SystemAdminCreateProfileController {

    public function createProfile($profileData) {
        $profile = new Profile();        

        return $profile->createProfile($profileData);
    }

}

?>