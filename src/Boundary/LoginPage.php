<?php

session_start();

include_once "../Controller/LoginController.php";

if (isset($_POST["login"])) {
    $email = $_POST['email'];
    $password = $_POST['password'];    

    $login = new LoginController();
    $user = $login->login($email, $password);
    
    if($user != null) {
        if($_SESSION['currentProfile'] == "SYSTEM ADMIN") {
            header("Location: SystemAdminDashboardPage.php");
        } else if($_SESSION['currentProfile'] == "CAFE OWNER") {
            header("Location: CafeOwnerDashboardPage.php");
        } else if($_SESSION['currentProfile'] == "CAFE MANAGER") {
            header("Location: CafeManagerDashboardPage.php");
        } else if($_SESSION['currentProfile'] == "CAFE STAFF") {
            $staff_id = (($user->getStaffById($user->getId()))->fetch_assoc())['cafe_staff_id'];
            $staff_role = (($user->getStaffById($user->getId()))->fetch_assoc())['role'];
            $_SESSION['cafe_staff_id'] = $staff_id;
            $_SESSION['cafe_staff_role'] = $staff_role;
            header("Location: CafeStaffDashboardPage.php");
        }
    } else {
        $message = "wrong username or password!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login</title>
    <link href="assets/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                <div class="card-body">
                                    <form method="POST">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" name="email" type="email" placeholder="name@example.com" required />
                                            <label for="inputEmail">Email address</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Password" required />
                                            <label for="inputPassword">Password</label>
                                        </div>                                       
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">                                            
                                            <button class="btn btn-primary" type="submit" name="login">Login</button>
                                        </div>
                                    </form>
                                    <?php if (isset($message)): ?>
                                        <div class="alert alert-danger mt-3" role="alert">
                                            <?php echo $message; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>                                  
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>            
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>
</html>