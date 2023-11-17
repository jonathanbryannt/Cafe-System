<?php 

include_once "../Controller/CafeManagerApproveBidController.php";
include_once "../Controller/CafeManagerViewAssignWorkslotController.php";

$approveBidController = new CafeManagerApproveBidController();
$status = $approveBidController->approveBid($_GET['id']);

if($status) {
    $assignWorkslotController = new CafeManagerViewAssignWorkslotController();
    $assignWorkslotController->assignWorkslotByBidID($_GET['id']);
}

header("Location: CafeManagerViewBidPage.php");

?>