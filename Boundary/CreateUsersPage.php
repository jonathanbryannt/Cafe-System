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
        $('#role_id').on('change', function() {
            // Get the selected option
            var selectedOption = $(this).find('option:selected');
            
            // Populate the disabled text areas with the selected Offer details
            $('#role_id_details').val(selectedOption.val());
            $('#offer_date_details').val(selectedOption.data('name'));            
        });        
    });
</script>

<?php

require "../Controller/SystemAdminCreateUserController.php";

//$allRoles = SystemAdminCreateUserController::getRoles();
// $allRoles = SystemAdminViewRoleController::getRoles();

// if(isset($_POST['submit'])) {        
//     if($_POST["password"] == $_POST["confirm-password"]) {
//         $userData = array("email"=>$_POST["email"], "name"=>$_POST["name"], "password"=>$_POST["password"], "role_id"=>$_POST["role_id"]);
//         $status = SystemAdminCreateUserController::createUser($userData);
//         if($status == true) {
//             $message = "User Successfully Created";        
//         } else {
//             $message = "There was a problem in creating a new user";
//         }
//     } else {
//         $message = "There was a problem in creating a new user";
//     }
    
// }

?>

<body class="sb-nav-fixed">
    <?php require "SystemAdminNav.php";?>
    <div id="layoutSidenav_content">
        <main>
        <div class="container-fluid px-4">
       
        <h1 class="mt-4">Create New User</h1>                                                          
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
                    <label>Email</label>
                    <input type='text' name='email' value="" id='email' placeholder="Enter Email" class='form-control' required/>
                </div>
                <div class='form-group'>
                    <label>Name</label>
                    <input type='text' name='name' value="" id='name' placeholder="Enter Name" class='form-control' required/>
                </div>
                <br/>
                <div class='form-group'>
                    <label>Password</label>
                    <input type='password' name='password' value="" id='password' placeholder="Enter Password" class='form-control' required/>
                </div>
                <br/>
                <div class='form-group'>
                    <label>Confirm Password</label>
                    <input type='password' name='confirm-password' value="" id='confirm-password' placeholder="Confirm Password" class='form-control' required/>
                </div>                       
                <br/>        
                <div class='form-group'>
                    <label for="role_id">Select Role : </label>
                    <select name="role_id" id="role_id" class="select2" required>                                           
                        <?php                        
                        while($role = $allRoles->fetch_assoc()) { ?>                                                                                                
                            <option value="<?php echo $role['role_id'];?>"
                                    data-name="<?php echo $role['role_name'];?>">
                                <?php echo $role['role_id']?> - <?php echo $role['role_name'];?>
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