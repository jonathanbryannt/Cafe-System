<?php

include_once "../Controller/CafeOwnerDeleteWorkslotController.php";

$deleteWorkslotController = new CafeOwnerDeleteWorkslotController();
$deleteWorkslotController->deleteWorkslotById($_GET['id']);

header("Location: ViewWorkslotPage.php");    

?>