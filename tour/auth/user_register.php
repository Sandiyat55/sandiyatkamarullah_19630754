<?php
include '../include/config.php';
error_reporting(0);
session_start();

if (isset($_SESSION['users'])) {
    header("Location: user_login.php");
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    $role = "cust";

    if ($password == $cpassword) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO users (username, email, password, role)
					VALUES ('$username', '$email', '$password', '$role')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Wow! User Registration Completed.');
                document.location.href = 'user_login.php';</script>";
                $username = "";
                $email = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else {
                echo "<script>alert('Woops! Something Wrong Went.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Email Already Exists.')</script>";
        }
    } else {
        echo "<script>alert('Password Not Matched.')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Register-2 | Equation - Multipurpose Bootstrap Dashboard Template </title>
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.ico" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/users/register-2.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
</head>

<body class="register">

    <form action="" method="POST" class="form-register">
        <div class="row">
            <div class="col-md-12 text-center mb-4">
                <img alt="logo" src="../assets/img/logo-3.png" class="theme-logo">
            </div>

            <div class="col-md-12">

                <label for="username" class="sr-only">Username</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="icon-username"><i class="flaticon-user-7"></i> </span>
                    </div>
                    <input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" class="form-control" required>
                </div>

                <label for="email" class="sr-only">Email address</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="icon-inputEmail"><i class="flaticon-email-fill-2"></i> </span>
                    </div>
                    <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" class="form-control" required>
                </div>

                <label for="password" class="sr-only">Password</label>

                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="icon-inputPassword"><i class="flaticon-key-2"></i> </span>
                    </div>
                    <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" class="form-control" aria-describedby="inputPassword" required>

                </div>
                <label for="cpassword" class="sr-only">Password Lagi</label>
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="icon-inputPassword"><i class="flaticon-key-2"></i> </span>
                    </div>
                    <input type="password" placeholder="Password Lagi" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" aria-describedby="inputPasswordlagi" class="form-control" required>
                </div>

                <div class="col-md-12">
                    <div class="login-text text-center">
                        <p class="mt-3 ">Sudah Punya Akun? <a href="user_login.php" class="mt-3 text-white">Klik sini </a> </p>
                    </div>
                </div>

                <button name="submit" class="btn btn-lg btn-gradient-warning btn-block btn-rounded mb-4 mt-5" type="submit">Register</button>


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