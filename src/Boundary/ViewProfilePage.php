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

include_once "../Controller/SystemAdminViewProfileController.php";

$viewProfileController = new SystemAdminViewProfileController();
$allProfiles = $viewProfileController->getProfiles();

?>

<body class="sb-nav-fixed">
    <?php require "SystemAdminNav.php";?>
    <div id="layoutSidenav_content">
        <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Profiles</h1>                                                          
                   
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Profile Entries
                </div>
                <div class="card-body">
                    <table class="cell-border stripe" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Profile ID</th>
                                <th>Name</th>
                                <th>Actions</th>                                
                            </tr>
                        </thead>                                 
                        <tbody>
                            <?php                            
                            while ($profile = $allProfiles->fetch_assoc()) {
                                echo "<tr>
                                        <td>{$profile['profile_id']}</td>
                                        <td>{$profile['profile_name']}</td>                                       
                                        <td>
                                            <a href='UpdateProfilePage.php?id={$profile['profile_id']}'><i class='fas fa-pencil-alt'></i></a>                                                                                        
                                        </td>
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
