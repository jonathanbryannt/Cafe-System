<?php

include_once "../Controller/SystemAdminSuspendUserController.php";

$suspendUserController = new SystemAdminSuspendUserController();
$suspendUserController->suspendUser($_GET['id']);

header("Location: ViewUserPage.php");

?>