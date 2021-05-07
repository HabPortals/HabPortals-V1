<?php

require_once('includes/config.php');

session_start();
if (isset($_SESSION['valid'])) {
?>
<!doctype html>
<html lang="en">


<head><?php include ('includes/head.php'); ?></head>

<body>
<div class="dashboard-main-wrapper">
<?php include ('includes/header.php'); ?>
<?php include ('includes/nav.php'); ?>
    <div class="dashboard-wrapper">

<?php
if (isset($_GET['page']))
    $page = $_GET['page'];
else
    $page = 'dashboard';
if (preg_match('/^[a-z0-9\-]+$/', $page))
{
    $inserted = include('pages/' . $page . '.php');
    if (!$inserted)
        echo('Requested page was not found.');
}
else
    echo('Invalid parameter.');
?>

<?php include('includes/footer.php'); ?>

    </div>
</div>

<script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<!-- bootstap bundle js -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<!-- slimscroll js -->
<script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
<!-- main js -->
<script src="assets/libs/js/main-js.js"></script>
<!-- morris-chart js -->
<script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
<script src="assets/vendor/charts/morris-bundle/morris.js"></script>
<script src="assets/vendor/charts/morris-bundle/morrisjs.html"></script>
<!-- chart js -->
<script src="assets/vendor/charts/charts-bundle/Chart.bundle.js"></script>
<script src="assets/vendor/charts/charts-bundle/chartjs.js"></script>
<!-- dashboard js -->
<script src="assets/libs/js/dashboard-influencer.js"></script>
</body>

</html>
    <?php
} else {
    header("Location:login.php");
}
    ?>