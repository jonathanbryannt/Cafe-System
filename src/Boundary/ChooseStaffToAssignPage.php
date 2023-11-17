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
        $('#cafestaff').on('change', function() {
            // Get the selected option
            var selectedOption = $(this).find('option:selected');
            
            // Populate the disabled text areas with the selected Offer details
            $('#cafestaff_id_details').val(selectedOption.val());
            $('#cafestaff_name_details').val(selectedOption.data('name'));            
        });        
    });
</script>

<?php

include_once "../Controller/CafeManagerViewStaffController.php";
include_once "../Controller/CafeManagerViewAssignWorkslotController.php";

$viewStaffController = new CafeManagerViewStaffController();
$assignWorkslotController = new CafeManagerViewAssignWorkslotController();
$allCafeStaffs = $viewStaffController->getCafeStaffs();

if(isset($_POST['submit'])) {   
    
    $selectedStaff = explode(',', $_POST['cafe_staff']);

    $staffId = $selectedStaff[0];
    $staffRole = $selectedStaff[1];

    $assignData = array("workslot_id"=>$_GET['id'], "cafe_staff_id"=>$staffId, "bid_role"=>$staffRole);
    
    if($assignWorkslotController->assignWorkslot($assignData)) {
        header("Location: ViewAssignWorkslotPage.php");
    } else {
        $message = "Failed to assign workslot to staff";
    }

}

?>

<body class="sb-nav-fixed">
    <?php require "CafeManagerNav.php";?>
    <div id="layoutSidenav_content">
        <main>
        <div class="container-fluid px-4">
       
        <h1 class="mt-4">Choose Staff to Assign</h1>                                                          
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
                    <label for="cafestaff">Select Cafe Staff : </label>
                    <select name="cafe_staff" id="cafestaff" class="select2" required>                                           
                        <?php                        
                        while($cafeStaff = $allCafeStaffs->fetch_assoc()) { ?>                                                                                                
                            <option value="<?php echo $cafeStaff['cafe_staff_id'].",".$cafeStaff['role'];?>"
                                    data-name="<?php echo $cafeStaff['name'];?>">
                                <?php echo $cafeStaff['cafe_staff_id']?> - <?php echo $cafeStaff['name'];?>, <?php echo $cafeStaff['role']?>
                            </option>
                        <?php 
                        }
                        ?>
                    </select>
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