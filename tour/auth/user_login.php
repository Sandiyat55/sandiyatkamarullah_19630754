<?php

include '../include/config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['users'])) {
    header("Location: ../dashboard/index.php");
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_array($result);
        $role = $row['role'];
        if ($role == 'admin') {
            $_SESSION['id_user'] = $row['id_user'];
            $_SESSION['users'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['no_hp'] = $row['no_hp'];
            $_SESSION['no_ktp'] = $row['no_ktp'];
            header("Location: ../dashboard/index.php");
        } else {
            $_SESSION['id_user'] = $row['id_user'];
            $_SESSION['users'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['no_hp'] = $row['no_hp'];
            $_SESSION['no_ktp'] = $row['no_ktp'];
            header("Location: ../cust/index_u.php");
        }
    } else {

        echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Login | Travel & Tour </title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/users/login-2.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
</head>

<body class="login">

    <form action="" method="POST" class="form-login">
        <div class="row">

            <div class="col-md-12 text-center mb-4">
                <img alt="logo" src="../assets/img/2.png" class="theme-logo">
            </div>

            <div class="col-md-12">

                <label for="inputEmail" class="sr-only">Email address</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="icon-inputEmail"><i class="flaticon-user-7"></i> </span>
                    </div>
                    <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
                </div>

                <label for="inputPassword" class="sr-only">Password</label>
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="icon-inputPassword"><i class="flaticon-key-2"></i> </span>
                    </div>

                    <input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
                </div>

                <div class="checkbox d-flex justify-content-center mt-3">

                </div>

                <button name="submit" class="btn btn-lg btn-gradient-warning btn-block btn-rounded mb-4 mt-5" type="submit">Login</button>


            </div>

            <div class="col-md-12">
                <div class="login-text text-center">
                    <p class="mt-3 text-white">New Here? <a href="user_register.php" class="">Register </a> a new user !</p>
                </div>
            </div>

        </div>
    </form>
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="../assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="../assets/js/loader.js"></script>
    <script src="../bootstrap/js/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>

    <!-- END GLOBAL MANDATORY SCRIPTS -->
</body>

</html>