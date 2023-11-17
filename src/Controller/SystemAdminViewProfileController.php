<?php

include_once "../Entity/Profile.php";

class SystemAdminViewProfileController {

    public function getProfiles() {        
        $profile = new Profile();
        return $profile->getProfiles();
    }

}

?>