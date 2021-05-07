<?php

$serverhost = "localhost";
$username = "shareour_shinano";
$password = "J-13r21m11";
$dbname = "shareour_athenav1";

$con = mysqli_connect("$serverhost", "$username", "$password", "$dbname");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

