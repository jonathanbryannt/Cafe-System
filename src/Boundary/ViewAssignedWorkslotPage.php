<?php

session_start();

include_once "../Controller/CafeStaffViewAssignedWorkslotController.php";

$viewAssignedWorkslotController = new CafeStaffViewAssignedWorkslotController();

$assignedWorkslots = $viewAssignedWorkslotController->getAssignedWorkslots($_SESSION['cafe_staff_id']);

$events = [];

while($workslot = $assignedWorkslots->fetch_assoc()) {
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
                    showConfirmButton: false,                   
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
                });
            };

        });
        
        </script>
           
        </main>                
    </div>
    </div>
    </body>

</html>