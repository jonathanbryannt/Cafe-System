<?php

session_start();

if (isset($_POST["logout"])) {    

    header("Location: LoginPage.php");

    session_destroy();
}

?>

<!DOCTYPE html>
<html lang="en">   
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - Cafe Staff</title>        
    <link href="assets/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>     
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="CafeStaffDashboardPage.php">Dashboard</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">        
    </form>
    <!-- Navbar-->
    <form method="post" class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4"> 
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user fa-fw"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">                    
                    <li><button class="dropdown-item" type="submit" name="logout">Logout</button></li>
                </ul>
            </li>
        </ul>
    </form>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">View</div>
                    <a class="nav-link" href="CafeStaffViewBidPage.php" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-check"></i></div>
                        My Bids                        
                    </a>
                    <a class="nav-link" href="ViewAssignedWorkslotPage.php" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-check"></i></div>
                        Assigned Work-slots                        
                    </a>
                    <div class="sb-sidenav-menu-heading">Bid</div>                    
                    <a class="nav-link" href="BidWorkslotPage.php" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-calendar"></i></div>
                        Work-Slots                        
                    </a>                                                    
                    <div class="sb-sidenav-menu-heading">Choose</div>           
                    <a class="nav-link" href="ChooseRolePage.php" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                        Roles                        
                    </a>                    
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                <?php echo $_SESSION['currentName']; ?>
            </div>
        </nav>
    </div>  
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="assets/js/scripts.js"></script>        
</html>
