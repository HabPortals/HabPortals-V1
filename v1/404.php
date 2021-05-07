<?php
session_start();
if (isset($_SESSION['valid'])) {
    ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Concept - Bootstrap 4 Admin Dashboard Template</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="http://localhost/v1/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="http://localhost/v1/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="http://localhost/v1/assets/libs/css/style.css">
    <link rel="stylesheet" href="http://localhost/v1/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="http://localhost/v1/assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="http://localhost/v1/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
</head>

<body>
<div class="dashboard-main-wrapper p-0">
    <div class="bg-white text-center">
        <div class="container">
            <div class="row" style="height:100vh;">
                <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="error-section">
                        <img src="https://i.skyrock.net/7861/30287861/pics/1054452770.gif" alt="" class="img-fluid">
                        <div class="error-section-content">
                            <h1 class="display-3">Page Not Found</h1>
                            <p>Oh bobba! That page wasn't found. Maybe this is a mistake on our end?</p>
                            <a href="login.php" class="btn btn-secondary btn-lg">Back to homepage</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>
<?php
}
?>