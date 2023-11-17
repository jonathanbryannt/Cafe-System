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

include_once "../Controller/SystemAdminUpdateUserController.php";

$updateUserController = new SystemAdminUpdateUserController();

$userToUpdate = ($updateUserController->getUserById($_GET['id']))->fetch_assoc();
$allProfiles = $updateUserController->getProfiles();

$message = '';
if(isset($_POST['submit'])) {        
    $userData = array("email"=>$_POST["email"], "name"=>$_POST["name"], "profile_id"=>$_POST["profile_id"], "user_id"=>$_GET['id']);            
    if($updateUserController->updateUser($userData)) {
        $message = "User Successfully Updated";
    } else {
        $message = "There was a problem in updating the user";
    }
}

?>

<body class="sb-nav-fixed">
    <?php
        session_start();
        if($_SESSION['currentProfile'] == "SYSTEM ADMIN") {
            require "SystemAdminNav.php";
        } else if($_SESSION['currentProfile'] == "CAFE OWNER") {
            require "CafeOwnerNav.php";
        }
    ?>
    <div id="layoutSidenav_content">
        <main>
        <div class="container-fluid px-4">
       
        <h1 class="mt-4">Update User</h1>                                                          
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
                    <input type='text' name='email' value="<?php echo $userToUpdate['email'] ?>" id='email' placeholder="Enter Email" class='form-control' required/>
                </div>
                <div class='form-group'>
                    <label>Name</label>
                    <input type='text' name='name' value="<?php echo $userToUpdate['name'] ?>" id='name' placeholder="Enter Name" class='form-control' required/>
                </div>
                <br/>                      
                <div class='form-group'>
                    <label for="profile_id">Select Profile : </label>
                    <select name="profile_id" id="profile_id" class="select2" required>                                           
                        <?php                        
                        while($profile = $allProfiles->fetch_assoc()) { ?>                                                                                                
                            <option value="<?php echo $profile['profile_id'];?>"
                                    data-name="<?php echo $profile['profile_name'];?>">
                                <?php echo $profile['profile_id']?> - <?php echo $profile['profile_name'];?>
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