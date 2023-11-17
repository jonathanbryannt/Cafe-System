<?php

include_once "../Controller/SystemAdminReactivateUserController.php";

$reactivateUserController = new SystemAdminReactivateUserController();
$reactivateUserController->reactivateUser($_GET['id']);

header("Location: ViewUserPage.php");

?>