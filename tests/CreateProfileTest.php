<?php

use PHPUnit\Framework\TestCase;

class CreateProfileTest extends TestCase {

    public function testCreateProfileWithValidData() {
        $input = array("name"=>"profileTest");

        $createProfileController = new SystemAdminCreateProfileController();

        $status = $createProfileController->createProfile($input);

        $this->assertTrue($status);
    }

    public function testCreateProfileWithDuplicateData() {
        $input = array("name"=>"profileTest"); //duplicate entry, won't work.

        $createProfileController = new SystemAdminCreateProfileController();

        $status = $createProfileController->createProfile($input);

        $this->assertFalse($status);
    }


}


?>