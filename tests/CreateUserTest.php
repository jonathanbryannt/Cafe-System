<?php

use PHPUnit\Framework\TestCase;

class CreateUserTest extends TestCase {

    public function testCreateUserWithValidData() {
        $input = array("email"=>"aa@test.com", "password"=>"test", "name"=>"test", "profile_id"=>'1');

        $createUserController = new SystemAdmincreateUserController();

        $status = $createUserController->createProfile($input);

        $this->assertTrue($status);
    }

    public function testCreateUserWithDuplicateData() {
        $input = array("email"=>"aa@test.com", "password"=>"test", "name"=>"test", "profile_id"=>'1'); //duplicate email, won't work.

        $createUserController = new SystemAdminCreateUserController();

        $status = $createUserController->createProfile($input);

        $this->assertTrue($status);
    }


}


?>