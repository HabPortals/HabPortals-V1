<?php
include("includes/config.php");

session_start();
if (isset($_SESSION['valid'])) {

    header('Location: index.php?page=dashboard');

} else {

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Concept - Bootstrap 4 Admin Dashboard Template</title>
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

<form class="splash-container" name="form1" method="POST" action="">
    <?php
    if (isset($_POST['submit'])) {
        if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['password_confirm'])) {
            echo '<meta http-equiv="refresh" content="1; url=https://habportals.com/v1/register.php"/>';
            echo '<div class="alert alert-danger" role="alert">Fields are empty</div>';
        } else {
            if ($_POST['password'] == $_POST['password_confirm']) {
                $username = $_POST['username'];
                $password_hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $registered_since = date("Y-m-d");
                $agencyid = 0;
                $gender = "I rather not say";
                $hotel = "COM";
                $timezone = "UTC";
                $avatar = "$avatarurl/no-avatar.jpg";
                $about_me = "Tell us about yourself";
                $youtube_embed = "e0T0rI-GiR4";
                $twitter = "habbofests";
                $discord = "Username#0000";


                $sql = "INSERT INTO users (username, password, registered_since, agencyid, gender, hotel, timezone, avatar, about_me, youtube_embed, twitter, discord) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                if ($query = $con->prepare($sql)) {
                    $query->bind_param(
                        'sssissssssss',
                        $username,
                        $password_hash,
                        $registered_since,
                        $agencyid,
                        $gender,
                        $hotel,
                        $timezone,
                        $avatar,
                        $about_me,
                        $youtube_embed,
                        $twitter,
                        $discord
                    );
                    $query->execute();
                    echo '<meta http-equiv="refresh" content="1; url=https://habportals.com/v1/login.php"/>';
                    echo '<div class="alert alert-success" role="alert">Your account is created successfully</div>';
                } else {
                    $error = $con->errno . ' ' . $con->error;
                    echo $error; // 1054 Unknown column 'foo' in 'field list'
                }
            } else {
                echo '<meta http-equiv="refresh" content="1; url=https://habportals.com/v1/register.php"/>';
                echo '<div class="alert alert-danger" role="alert">The filled in passwords dont match</div>';
            }
        }
    }
    ?>
    <div class="card">
        <div class="card-header">
            <h3 class="mb-1">Register on HF Portal</h3>
            <p>Fill in the form to register your account.</p>
        </div>
        <div class="card-body">
            <div class="form-group">
                <input class="form-control form-control-lg" type="text" name="username" placeholder="Username" autocomplete="off">
            </div>
            <div class="form-group">
                <input class="form-control form-control-lg" id="pass1" type="password" name="password" placeholder="Password">
            </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" id="pass1" type="password" name="password_confirm" placeholder="Confirm Password">
                </div>

            <div class="form-group pt-2">
                <input type="submit" name="submit" value="Register my account" class="btn btn-block btn-primary">

                <span>By creating an account, you agree the <a href="#">terms and conditions</a></span>
            </div>
            <div class="form-group">
            </div>
        </div>
        <div class="card-footer bg-white">
            <p>Already member? <a href="login.php" class="text-secondary">Login Here.</a></p>
        </div>
    </div>
</form>
</body>


</html>
    <?php
}
?>