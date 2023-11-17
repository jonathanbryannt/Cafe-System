<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Include Select2 JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>

<script>
    $(document).ready(function() {
        $('.select2').select2();      
        // Add event listener for Offer selection
        $('#profile_id').on('change', function() {
            // Get the selected option
            var selectedOption = $(this).find('option:selected');
            
            // Populate the disabled text areas with the selected Offer details
            $('#profile_id_details').val(selectedOption.val());
            $('#profile_name_details').val(selectedOption.data('name'));            
        });        
    });
</script>

<?php

include_once "../Controller/CafeOwnerCreateWorkslotController.php";

$createWorkslotController = new CafeOwnerCreateWorkslotController();

if(isset($_POST['submit'])) {            
    $workslotData = array("workslot_name"=>$_POST["workslot_name"], "workslot_date"=>$_POST["date"], "start_time"=>$_POST["start_time"], "end_time"=>$_POST["end_time"]);
    if($createWorkslotController->createWorkslot($workslotData)) {
        $message = "Work-slot Successfully Created";        
    } else {
        $message = "There was a problem in creating a new work-slot";
    }         
}

?>

<body class="sb-nav-fixed">
    <?php require "CafeOwnerNav.php";?>
    <div id="layoutSidenav_content">
        <main>
        <div class="container-fluid px-4">
       
        <h1 class="mt-4">Create New Workslot</h1>                                                          
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <?php 
                if ($message){
                    echo "<div class='alert alert-info'>".$message."</div>";
                }
            ?>
            <form action="" method="post" enctype="multipart/form-data" >                                          
                <div class='form-group'>
                    <label>Workslot Name</label>
                    <input type='text' name='workslot_name' value="" id='workslot_name' placeholder="Enter Workslot Name" class='form-control' required/>
                </div>
                <br/>
                <div class='form-group'>
                    <label>Date</label>
                    <input type='date' name='date' value="" id='date' placeholder="Enter Date" class='form-control' required/>
                </div>    
                <br/>
                <div class='form-group'>
                    <label>Start Time</label>
                    <input type='time' name='start_time' value="" id='start_time' placeholder="Enter Start Time" class='form-control' required/>
                </div>    
                <br/>
                <div class='form-group'>
                    <label>End Time</label>
                    <input type='time' name='end_time' value="" id='end_time' placeholder="Enter End Time" class='form-control' required/>
                </div>    
                <br/>
                <input type='submit' name='submit' class='btn btn-primary' value=' Submit ' />
            </form>  
        </div>
    </div>
    </div>                   
        </main>                
    </div>
</div>
</body>