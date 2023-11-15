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

include_once "../Controller/CafeManagerViewStaffController.php";

$viewStaffController = new CafeManagerViewStaffController();
$assignedStaffs = $viewStaffController->getAssignedCafeStaffs();

?>

<body class="sb-nav-fixed">
    <?php
        require "CafeManagerNav.php";
    ?>
    <div id="layoutSidenav_content">
        <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Assigned Cafe Staffs</h1> 
                   
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Assigned Cafe Staff Entries
                </div>
                <div class="card-body">
                    <table class="cell-border stripe" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Assign ID</th>
                                <th>Staff ID</th>
                                <th>Staff Name</th>
                                <th>Staff Role</th>
                                <th>Workslot ID</th>
                                <th>Workslot Name</th>
                                <th>Workslot Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Actions</th>                                
                            </tr>
                        </thead>                                 
                        <tbody>
                            <?php                                               
                            while ($staff = $assignedStaffs->fetch_assoc()) {
                                
                                echo "<tr>
                                        <td>{$staff['staff_workslots_id']}</td>
                                        <td>{$staff['cafe_staff_id']}</td>
                                        <td>{$staff['name']}</td>
                                        <td>{$staff['role']}</td>
                                        <td>{$staff['workslot_id']}</td>
                                        <td>{$staff['workslot_name']}</td>
                                        <td>{$staff['workslot_date']}</td>
                                        <td>{$staff['start_time']}</td>
                                        <td>{$staff['end_time']}</td>
                                        <td>                                            
                                            <button class='btn' style='color: red' onclick='confirmUnassign({$staff['staff_workslots_id']}, {$staff['workslot_id']}, {$staff['role']})'><i class='fas fa-minus'></i></button>                                            
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
    function confirmUnassign(staffId, workslotId, staffRole) {
        Swal.fire({
            title: "Confirm Unassignment",
            text: "Are you sure you want to unassign this staff from this workslot?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, unassign staff!",
        }).then((result) => {
            if (result.isConfirmed) {                
                window.location.href = "UnassignStaffFromWorkslotPage.php?id=" + staffId + "&workslotid=" + workslotId + "&staffRole=" + staffRole;
            } 
        });
    }
</script>
