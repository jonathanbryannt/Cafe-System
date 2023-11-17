<?php

session_start();

include_once "../Controller/CafeStaffViewWorkslotController.php";
include_once "../Controller/CafeStaffCreateBidController.php";

$viewWorkslotController = new CafeStaffViewWorkslotController();

$allWorkslots = $viewWorkslotController->getWorkslots();

$events = [];

while($workslot = $allWorkslots->fetch_assoc()) {
    $events[] = [
        'groupId' => $workslot['workslot_id'],
        'title' => $workslot['workslot_name'],
        'start' => $workslot['workslot_date'],
        'chef_qty' => $workslot['chef_qty'],
        'cashier_qty' => $workslot['cashier_qty'],
        'waiter_qty' => $workslot['waiter_qty'],
        'start_time' => $workslot['start_time'],
        'end_time' => $workslot['end_time']
    ];
}

if(isset($_GET['id'])) {
    if(isset($_SESSION['cafe_staff_role'])) {
        $workslotBidData = array("cafe_staff_id"=>$_SESSION['cafe_staff_id'], "workslot_id"=>$_GET['id'], "cafe_staff_role"=>$_SESSION['cafe_staff_role']);
        $createBidController = new CafeStaffCreateBidController();
        if($createBidController->createWorkslotBid($workslotBidData)){
            $message = "Successfully bid for the workslot";
        } else {
            $message = "Failed to bid on the workslot";
        }        
    } else {
        $message = "Choose a role first!";
    }    
}

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">        
  
    <link href='assets/fullcalendar/packages/core/main.css' rel='stylesheet' />
    <link href='assets/fullcalendar/packages/daygrid/main.css' rel='stylesheet' />
    
    <link rel="stylesheet" href="assets/css/calendar.css">    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  </head>

  <body class="sb-nav-fixed">
    <?php require "CafeStaffNav.php";?>
    <div id="layoutSidenav_content">
        <main>
        <div class="content">
        <?php 
                if ($message){
                    echo "<div class='alert alert-info'>".$message."</div>";
                }
        ?>
        <div id='calendar'></div>
    </div>

        <script src='assets/fullcalendar/packages/core/main.js'></script>
        <script src='assets/fullcalendar/packages/interaction/main.js'></script>
        <script src='assets/fullcalendar/packages/daygrid/main.js'></script>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var events = <?php echo json_encode($events); ?>;

            var today = new Date();

            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: [ 'interaction', 'dayGrid' ],
                defaultDate: today,
                editable: true,
                eventLimit: true, // allow "more" link when too many work-slots
                events: events,
                eventClick: function(info) {
                    // Handle workslot click event
                    showWorkslotDetails(info.event);
                }
            });

            calendar.render();

            function showWorkslotDetails(event) {                        
                Swal.fire({
                    title: 'Workslot Details',                    
                    showCancelButton: true,
                    confirmButtonText: `Bid this workslot`,                    
                    cancelButtonText: 'Close',
                    html: `
                        <p><strong>Workslot Name:</strong> ${event.title}</p>
                        <p><strong>Date:</strong> ${event.start.toLocaleDateString()}</p>
                        <p><strong>Chef(s):</strong> ${event.extendedProps.chef_qty}</p>
                        <p><strong>Cashier(s):</strong> ${event.extendedProps.cashier_qty}</p>
                        <p><strong>Waiter(s):</strong> ${event.extendedProps.waiter_qty}</p>
                        <p><strong>Start:</strong> ${event.extendedProps.start_time}</p>
                        <p><strong>End:</strong> ${event.extendedProps.end_time}</p>
                    `,                
                }).then((result) => {
                    if(result.isConfirmed) {
                        confirmBidWorkslot(event.groupId);
                    }
                });
            };

            function confirmBidWorkslot(workslotId) {
                Swal.fire({
                title: "Confirm Bid",
                text: "Are you sure you want to bid this workslot?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, bid workslot!",
                }).then((result) => {
                    if (result.isConfirmed) {                
                        window.location.href = "BidWorkslotPage.php?id=" + workslotId;
                    } 
                });
            }
        });
        
        </script>
           
        </main>                
    </div>
    </div>
    </body>

</html>