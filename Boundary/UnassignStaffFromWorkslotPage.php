<?php

include_once "../Entity/Workslot.php";

$workslot = new Workslot();
return $workslot->unassignWorkslot($_GET['id'], $_GET['workslotid'], $_GET['staffRole']);

header("Location: ViewAssignedStaffPage.php");

?>