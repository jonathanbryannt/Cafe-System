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

session_start();

include_once "../Controller/CafeStaffViewBidController.php";

$viewBidController = new CafeStaffViewBidController();
$myBids = $viewBidController->getBidsByStaffId($_SESSION['cafe_staff_id']);

?>

<body class="sb-nav-fixed">
    <?php
        require "CafeStaffNav.php";
    ?>
    <div id="layoutSidenav_content">
        <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">My Bids</h1>                                                          
                   
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
                                <th>Workslot ID</th>
                                <th>Workslot Name</th>
                                <th>Workslot Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>                                
                                <th>Bid Status</th>
                            </tr>
                        </thead>                                 
                        <tbody>
                            <?php                                               
                            while ($bid = $myBids->fetch_assoc()) {
                                $statusStyle = ($bid['bid_status'] === 'Open') ? 'color: green;' : 'color: red;';
                                echo "<tr>
                                        <td>{$bid['staff_bid_workslot_id']}</td>
                                        <td>{$bid['workslot_id']}</td>
                                        <td>{$bid['workslot_name']}</td>
                                        <td>{$bid['workslot_date']}</td>
                                        <td>{$bid['start_time']}</td>
                                        <td>{$bid['end_time']}</td>
                                        <td style='{$statusStyle}'>{$bid['bid_status']}</td>
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
