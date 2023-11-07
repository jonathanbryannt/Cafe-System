<?php

include_once "../Entity/Profile.php";

class SystemAdminDeleteProfileController {

    public function deleteProfileById($id) {        
        $profile = new Profile();
        return $profile->deleteProfileById($id);
    }

}

?>