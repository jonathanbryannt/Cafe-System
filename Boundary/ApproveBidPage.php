<?php 

ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

include_once "../Controller/CafeManagerApproveBidController.php";
include_once "../Controller/CafeManagerAssignWorkslotController.php";

$approveBidController = new CafeManagerApproveBidController();
$status = $approveBidController->approveBid($_GET['id']);

if($status) {
    $assignWorkslotController = new CafeManagerAssignWorkslotController();
    $assignWorkslotController->assignWorkslotByBidID($_GET['id']);
}

header("Location: CafeManagerViewBidPage.php");

?>