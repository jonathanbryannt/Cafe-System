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

include "../Controller/SystemAdminUpdateRoleController.php";

$roleToUpdate = SystemAdminUpdateRoleController::getRoleById($_GET['id'])->fetch_assoc();

if(isset($_POST['submit'])) {        
    $roleData = array("name"=>$_POST["name"], "id"=>$_GET['id']);    
    $status = SystemAdminUpdateROleController::updateRole($roleData);
    if($status == true) {
        $message = "Role Successfully Updated";        
    } else {
        $message = "There was a problem in updating the role";
    }
}

?>

<body class="sb-nav-fixed">
    <?php require "SystemAdminNav.php";?>
    <div id="layoutSidenav_content">
        <main>
        <div class="container-fluid px-4">
       
        <h1 class="mt-4">Update Roles</h1>                                                          
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
                    <label>Name</label>
                    <input type='text' name='name' value="<?php echo $roleToUpdate['role_name'] ?>" id='name' placeholder="Enter Role Name" class='form-control' required/>
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