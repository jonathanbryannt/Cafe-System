<?php

include_once "../Entity/Workslot.php";

$workslot = new Workslot();
$workslot->unassignWorkslot($_GET['id'], $_GET['workslotid'], $_GET['staffRole']);

header("Location: ViewAssignedStaffPage.php");

?>