<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<!-- Include DataTables JavaScript -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js" defer></script>

<!-- Include SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- Include SweetAlert JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

<script>    	
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>

<?php

include_once "../Controller/SystemAdminViewUserController.php";

$viewUserController = new SystemAdminViewUserController();
$allUsers = $viewUserController->getUsers();

?>

<body class="sb-nav-fixed">
    <?php
        session_start();
        if($_SESSION['currentProfile'] == "SYSTEM ADMIN") {
            require "SystemAdminNav.php";
        } else if($_SESSION['currentProfile'] == "CAFE OWNER") {
            require "CafeOwnerNav.php";
        }
        
    ?>
    <div id="layoutSidenav_content">
        <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Users</h1>                                                          
                   
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    User Entries
                </div>
                <div class="card-body">
                    <table class="cell-border stripe" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Email</th>
                                <th>Name</th>
                                <th>Profile</th>
                                <th>Status</th>
                                <th>Actions</th>                                
                            </tr>
                        </thead>                                 
                        <tbody>
                            <?php                                               
                            while ($user = $allUsers->fetch_assoc()) {
                                //if logged in as cafe owner, only display system admins
                                if($_SESSION['currentProfile'] == "CAFE OWNER") {
                                    if(!($user['profile_name'] == "SYSTEM ADMIN")) {
                                        continue;
                                    }
                                }
                                echo "<tr>
                                        <td>{$user['user_id']}</td>
                                        <td>{$user['email']}</td>
                                        <td>{$user['name']}</td>
                                        <td>{$user['profile_name']}</td>
                                        <td>{$user['status']}</td>
                                        <td>
                                            <a href='UpdateUserPage.php?id={$user['user_id']}'><i class='fas fa-pencil-alt'></i></a>";                                            
                                            if (!($_SESSION['currentProfile'] == "SYSTEM ADMIN" && $user['profile_name'] == "SYSTEM ADMIN")) {
                                                if ($user['status'] == 'ACTIVE') {
                                                    echo "<button class='btn' style='color: red' onclick='confirmSuspend({$user['user_id']})'><i class='fas fa-lock'></i></button>";
                                                } else {
                                                    echo "<button class='btn' style='color: green' onclick='confirmReactivate({$user['user_id']})'><i class='fas fa-lock-open'></i></button>";
                                                }  
                                            }                                                                                                                                                                                   
                                        echo "</td>";
                                    echo "</tr>";
                            }
                            ?>                                                               
                        </tbody>
                    </table>                            
                </div>      
            </div>
        </div>                   
        </main>                
    </div>
</div>
</body>

<script>    
    function confirmSuspend(userId) {
        Swal.fire({
            title: "Confirm Suspension",
            text: "Are you sure you want to suspend this user?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, suspend user!",
        }).then((result) => {
            if (result.isConfirmed) {                
                window.location.href = "SuspendUserPage.php?id=" + userId;
            } 
        });
    }

    function confirmReactivate(userId) {
        Swal.fire({
            title: "Confirm Reactivation",
            text: "Are you sure you want to reactivate this user?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, reactivate user!",
        }).then((result) => {
            if (result.isConfirmed) {                
                window.location.href = "ReactivateUserPage.php?id=" + userId;
            } 
        });
    }
</script>
