<?php 

include_once "../Controller/CafeManagerRejectBidController.php";

$rejectBidController = new CafeManagerRejectBidController();
$rejectBidController->rejectBid($_GET['id']);

header("Location: CafeManagerViewBidPage.php");

?>