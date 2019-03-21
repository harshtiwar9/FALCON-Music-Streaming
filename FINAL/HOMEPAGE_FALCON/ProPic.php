<?php
    if(!(isset($_SESSION['mob'])))
    {
        $_SESSION['pg'] = "page";
        header('Location: /index.php');
    }

    else
    {
        $con = mysqli_connect("localhost","root","root","Falcon_Music_Final");
        $res = mysqli_query($con,"SELECT * FROM user_info WHERE mobile='$_SESSION[mob]'");
        $row = mysqli_fetch_array($res);
        $ProPicUrl = $row['user_pic'];
    }
?>

