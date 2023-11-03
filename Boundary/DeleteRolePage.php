<?php

include "../Controller/SystemAdminDeleteRoleController.php";

$status = SystemAdminDeleteRoleController::deleteRoleById($_GET['id']);

header("Location: ViewRolesPage.php");    

?>