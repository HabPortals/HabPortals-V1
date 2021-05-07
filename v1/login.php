<?php
session_start();
include("includes/portaldb.php");

if (isset($_SESSION['valid'])) {

    header('Location: index.php?page=dashboard');

} else {

    ?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }
    </style>
</head>

<body>
<div class="splash-container">
    <div class="card">
        <div class="card-header text-center">
            <a href="../index.html"><img class="logo-img" src="../assets/images/athena_logo.png" alt="logo"></a>
            <span class="splash-description">The portal that brings agencies together</span>
            <span class="splash-description"><small>Version 1.0.0</small></span>
        </div>
        <div class="card-body">
                <?php
                if(isset($_POST["submit"]))
                {
                    if(empty($_POST["username"]) || empty($_POST["password"]))
                    {
                        echo '<meta http-equiv="refresh" content="1; url=http://localhost/v1/login.php" />';
                        echo '<div class="alert alert-danger" role="alert">Fields are empty</div>';
                    }
                    else
                    {
                        $user = mysqli_real_escape_string($con, $_POST["username"]);
                        $pass = mysqli_real_escape_string($con, $_POST["password"]);
                        $query = "SELECT * FROM users WHERE username = '$user'";
                        $result = mysqli_query($con, $query);
                        if(mysqli_num_rows($result) > 0)
                        {
                            while($row = mysqli_fetch_array($result))
                            {
                                if(password_verify($pass, $row["password"]))
                                {
                                    $_SESSION["valid"] = $user;
                                    $_SESSION['username'] = $row['username'];
                                    $_SESSION['userid'] = $row['userid'];
                                    $_SESSION['agencyid'] = $row['agencyid'];
                                    
                                    echo '<meta http-equiv="refresh" content="1; url=https://habportals.com/v1/index.php?page=dashboard"/>';
                                    echo '<div class="alert alert-success" role="alert">Logged in successfully</div>';
                                }
                                else
                                {
                                    echo '<meta http-equiv="refresh" content="1; url=https://habportals.com/v1/login.php" />';
                                    echo '<div class="alert alert-danger" role="alert">Incorrect username and/or password</div>';
                                }
                            }
                        }
                        else
                        {
                            echo '<meta http-equiv="refresh" content="1; url=https://habportals.com/v1/login.php" />';
                            echo '<div class="alert alert-danger" role="alert">Incorrect username and/or password</div>';
                        }
                    }
                }
                ?>
            <form name="form1" method="POST" action="">
                <div class="form-group">
                    <input class="form-control form-control-lg" id="username" name="username" type="text" placeholder="Username" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" id="password" name="password" type="password" placeholder="Password">
                </div>
                <input type="submit" name="submit" class="btn btn-primary btn-lg btn-block" value="Sign in">
            </form>
        </div>
        <div class="card-footer bg-white p-0 ">
            <div class="card-footer-item card-footer-item-bordered">
                <a href="register.php" class="footer-link">Create An Account</a>
            </div>
            <div class="card-footer-item card-footer-item-bordered">
                <a href="#" class="footer-link">Forgot Password</a>
            </div>
        </div>
    </div>
</div>
</body>

</html>
<?php
}
?>