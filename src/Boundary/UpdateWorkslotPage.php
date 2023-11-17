<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<?php

include_once "../Controller/CafeOwnerUpdateWorkslotController.php";

$updateWorkslotController = new CafeOwnerUpdateWorkslotController();

$workslotToUpdate = ($updateWorkslotController->getWorkslotById($_GET['id']))->fetch_assoc();

$message = '';
if(isset($_POST['submit'])) {        
    $workslotData = array("workslot_name"=>$_POST["workslot_name"], "workslot_date"=>$_POST["date"], "start_time"=>$_POST["start_time"], "end_time"=>$_POST["end_time"], "workslot_id"=>$_GET['id']);            
    if($updateWorkslotController->updateWorkslot($workslotData)) {
        $message = "Workslot Successfully Updated";
    } else {
        $message = "There was a problem in updating the workslot";
    }
}

?>

<body class="sb-nav-fixed">
    <?php require "CafeOwnerNav.php";?>
    <div id="layoutSidenav_content">
        <main>
        <div class="container-fluid px-4">
       
        <h1 class="mt-4">Update Work-slot</h1>                                                          
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
                    <input type='text' name='workslot_name' value="<?php echo $workslotToUpdate['workslot_name']; ?>" id='workslot_name' placeholder="Enter Workslot Name" class='form-control' required/>
                </div>
                <br/>                
                <div class='form-group'>
                    <label>Date</label>
                    <input type='date' name='date' value="<?php echo $workslotToUpdate['workslot_date']; ?>" id='date' placeholder="Enter Date" class='form-control' required/>
                </div>    
                <br/>
                <div class='form-group'>
                    <label>Start Time</label>
                    <input type='time' name='start_time' value="<?php echo $workslotToUpdate['start_time']; ?>" id='start_time' placeholder="Enter Start Time" class='form-control' required/>
                </div>    
                <br/>
                <div class='form-group'>
                    <label>End Time</label>
                    <input type='time' name='end_time' value="<?php echo $workslotToUpdate['end_time']; ?>" id='end_time' placeholder="Enter End Time" class='form-control' required/>
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