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

include "../Controller/SystemAdminViewUserController.php";

$allUsers = SystemAdminViewUserController::getUsers();

?>

<body class="sb-nav-fixed">
    <?php require "SystemAdminNav.php";?>
    <div id="layoutSidenav_content">
        <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Users</h1>                                                          
                   
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Role Entries
                </div>
                <div class="card-body">
                    <table class="cell-border stripe" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Email</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Actions</th>                                
                            </tr>
                        </thead>                                 
                        <tbody>
                            <?php                            
                            while ($user = $allUsers->fetch_assoc()) {
                                echo "<tr>
                                        <td>{$user['user_id']}</td>
                                        <td>{$user['email']}</td>
                                        <td>{$user['name']}</td>
                                        <td>{$user['role_name']}</td>
                                        <td>{$user['status']}</td>
                                        <td>
                                            <a href='UpdateRolePage.php?id={$user['user_id']}'><i class='fas fa-pencil-alt'></i></a>                                            
                                            <button class='btn' style='color:blue' onclick='confirmDelete({$user['user_id']})'><i class='fas fa-trash'></i></button>
                                        </td>
                                    </tr>";
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
    function confirmDelete(userId) {
        Swal.fire({
            title: "Confirm Deletion",
            text: "Are you sure you want to delete this offer?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {                
                window.location.href = "SuspendUserPage.php?id=" + userId;
            } 
        });
    }
</script>
