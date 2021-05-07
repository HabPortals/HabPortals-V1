<?php
include("config.php");

if (isset($_POST['submit'])) {

    if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['password_confirm'])) {
        echo "Field is empty <br>";
        header('refresh: 5; url=../register.php');
        exit;
    }

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
        if($query = $con->prepare($sql)) {
            $query->bind_param('sssissssssss', $username, $password_hash, $registered_since, $agencyid, $gender, $hotel, $timezone, $avatar, $about_me, $youtube_embed, $twitter, $discord);
            $query->execute();
            echo "Your account is created successfully";
            header('refresh: 5; url=../login.php');
        } else {
            $error = $con->errno . ' ' . $con->error;
            echo $error; // 1054 Unknown column 'foo' in 'field list'
        }
    } else {
        echo "The filled in passwords don't match";
        header('refresh: 5; url=../register.php');
        exit;
    }
} else {
    echo "Er is niets gepost";
}