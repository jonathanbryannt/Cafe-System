<?php

use PHPUnit\Framework\TestCase;

class LoginControllerTest extends TestCase {

    public function testLoginWithValidCredentials() {                
        
        $loginController = new LoginController();

        // Call the login method with valid credentials
        $user = $loginController->login('staff@gmail.com', 'staff');

        $this->assertNotNull($user);
        $this->assertInstanceOf(CafeStaff::class, $user);
        
    }

    public function testLoginWithInvalidCredentials() {

        $loginController = new LoginController();

        // Call the login method with invalid credentials
        $user = $loginController->login('invalid', 'invalid');

        $this->assertNull($user);
    }    


}


?>