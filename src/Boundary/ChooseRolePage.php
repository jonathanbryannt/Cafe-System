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
        $('#role').on('change', function() {
            // Get the selected option
            var selectedOption = $(this).find('option:selected');
            
            // Populate the disabled text areas with the selected Offer details
            $('#role_details').val(selectedOption.val());
            $('#role_name_details').val(selectedOption.data('name'));            
        });        
    });
</script>

<?php

session_start();

include_once "../Controller/CafeStaffChooseRoleController.php";

$chooseRoleController = new CafeStaffChooseRoleController();

if(isset($_POST['submit'])) {        
    $roleData = array("role"=>$_POST['role'], "cafe_staff_id"=>$_SESSION['cafe_staff_id']);
    if($chooseRoleController->chooseRole($roleData)) {
        $_SESSION['cafe_staff_role'] = $_POST['role'];
        $message = "Role Successfully Chosen";        
    } else {
        $message = "There was a problem in chossing a role";
    }
}

$disableSubmit = false;

if(isset($_SESSION['cafe_staff_role'])) {
    $disableSubmit = true;
}

?>

<body class="sb-nav-fixed">
    <?php require "CafeStaffNav.php";?>
    <div id="layoutSidenav_content">
        <main>
        <div class="container-fluid px-4">
       
        <h1 class="mt-4">Choose Role</h1>                                                          
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
                    <label for="role">Select Role : </label>
                    <select name="role" id="role" class="select2" required>                                                                   
                        <option value="Chef">Chef</option>
                        <option value="Cashier">Cashier</option>
                        <option value="Waiter">Waiter</option>
                    </select>
                </div>            
                <br/>            
                <input type='submit' name='submit' class='btn btn-primary' value=' Submit '  <?php echo $disableSubmit ? 'disabled' : ''; ?>/>
            </form>  
        </div>
    </div>
    </div>                   
        </main>                
    </div>
</div>
</body>