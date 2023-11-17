<?php

include_once "../Controller/CafeManagerUnassignStaffFromWorkslotController.php";

$UnassignStaffController = new CafeManagerUnassignStaffFromWorkslotController();
$UnassignStaffController->unassignStaffFromWorkslot($_GET['id'], $_GET['workslotid'], $_GET['staffRole']);

header("Location: ViewAssignedStaffPage.php");

?>