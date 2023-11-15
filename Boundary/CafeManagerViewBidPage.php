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

include_once "../Controller/CafeManagerViewBidController.php";

$viewBidController = new CafeManagerViewBidController();
$allBids = $viewBidController->getBids();

?>

<body class="sb-nav-fixed">
    <?php
        require "CafeManagerNav.php";
    ?>
    <div id="layoutSidenav_content">
        <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">All Bids</h1>                                                          
                   
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Bid Entries
                </div>
                <div class="card-body">
                    <table class="cell-border stripe" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Bid ID</th>
                                <th>Cafe Staff ID</th>
                                <th>Workslot ID</th>
                                <th>Workslot Name</th>
                                <th>Workslot Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>                                
                                <th>Bid Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>                                 
                        <tbody>
                            <?php                                               
                            while ($bid = $allBids->fetch_assoc()) {
                                $statusStyle = ($bid['bid_status'] === 'Open') ? 'color: green;' : 'color: red;';
                                echo "<tr>
                                        <td>{$bid['staff_bid_workslot_id']}</td>
                                        <td>{$bid['cafe_staff_id']}</td>
                                        <td>{$bid['workslot_id']}</td>
                                        <td>{$bid['workslot_name']}</td>
                                        <td>{$bid['workslot_date']}</td>
                                        <td>{$bid['start_time']}</td>
                                        <td>{$bid['end_time']}</td>
                                        <td style='{$statusStyle}'>{$bid['bid_status']}</td>
                                        <td>";
                                        if($bid['bid_status'] == 'Open') {
                                            echo "<button class='btn' style='color: green' onclick='confirmApprove({$bid['staff_bid_workslot_id']})'><i class='fas fa-check'></i></button>";
                                            echo "<button class='btn' style='color: green' onclick='confirmReject({$bid['staff_bid_workslot_id']})'><i class='fas fa-cross'></i></button>";
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

<script>
    function confirmApprove(bidId) {
        Swal.fire({
            title: "Confirm Approval",
            text: "Are you sure you want to approve this bid?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, approve bid!",
        }).then((result) => {
            if (result.isConfirmed) {                
                window.location.href = "ApproveBidPage.php?id=" + bidId;
            } 
        });
    }

    function confirmReject(bidId) {
        Swal.fire({
            title: "Confirm Rejection",
            text: "Are you sure you want to reject this bid?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, reject bid!",
        }).then((result) => {
            if (result.isConfirmed) {                
                window.location.href = "RejectBidPage.php?id=" + bidId;
            } 
        });
    }
</script>

</body>
