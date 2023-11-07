<?php

include_once "../Controller/SystemAdminDeleteProfileController.php";

$deleteProfileController = new SystemAdminDeleteProfileController();
$deleteProfileController->deleteProfileById($_GET['id']);

header("Location: ViewProfilePage.php");    

?>