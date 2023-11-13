<?php

include_once "../Entity/User.php";
include_once "../DAO/UserDAO.php";

class LoginController {

    public function login($email, $password) {     
        session_start();
        
        $userDAO = new UserDAO();        
        $user = $userDAO->validateLogin($email, $password);        

        if($user) {
            $userProfile = $user->getProfile();           
            $userName = $user->getName();                         
            $_SESSION['currentProfile'] = $userProfile;            
            $_SESSION['currentName'] = $userName;
    
            if($_SESSION['currentProfile'] == "SYSTEM ADMIN") {
                header("Location: SystemAdminDashboardPage.php");
            } else if($_SESSION['currentProfile'] == "CAFE OWNER") {
                header("Location: CafeOwnerDashboardPage.php");
            } else if($_SESSION['currentProfile'] == "CAFE MANAGER") {
                header("Location: CafeManagerDashboardPage.php");
            } else if($_SESSION['currentProfile'] == "CAFE STAFF") {
                $staff_id = (($user->getStaffById($user->getId()))->fetch_assoc())['cafe_staff_id'];
                $staff_role = (($user->getStaffById($user->getId()))->fetch_assoc())['role'];
                $_SESSION['cafe_staff_id'] = $staff_id;
                $_SESSION['cafe_staff_role'] = $staff_role;
                header("Location: CafeStaffDashboardPage.php");
            }
        }        
    }

}

?>