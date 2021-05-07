<?php
include("portaldb.php");

session_start();
if(isset($_POST["submit"]))
{
    if(empty($_POST["username"]) || empty($_POST["password"]))
    {
        echo 'Fields are empty';
        header('refresh: 3; url=../login.php');
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
                    header("location:../index.php");
                }
                else
                {
                    echo 'Incorrect username and/or password';
                    header('refresh: 3; url=../login.php');
                }
            }
        }
        else
        {
            echo 'Incorrect username and/or password';
            header('refresh: 3; url=../login.php');

        }
    }
}