<?php
    session_start();
    $mob = $_POST['mob'];
    $pwd = $_POST['pwd'];

$con = mysqli_connect("localhost","root","root","Falcon_Music_Final");

    if(!$con)
    {
        echo "Not Connected..!!";
    }

    else
    {
        $res = mysqli_query($con,"select * from user_info where mobile='$mob' and password='$pwd'");
        $row = mysqli_fetch_array($res);

        if($row['mobile']==$mob && $row['password']==$pwd)
        {
            $_SESSION['mob']=$mob;
            $_SESSION['unme_first']=$row['firstname'];
            $_SESSION['unme_last']=$row['lastname'];
            header('Location: /index.php');
            mysqli_query($con,"update user_info set Login_Status='1' where mobile='$mob'");
        }

        elseif ($mob=='9876543210' && $pwd=='werfalcons')
        {
            $_SESSION['mob']=$mob;
            echo "<script> alert('☻ !...Welcome Admin...! ☺') </script>";
            header('refresh:0; url= /FINAL/Final-Admin-Panel/index.php');
        }

        else
        {
            echo "<script> alert('Mobile or Password Not Match...!!') </script>";
            header('Location: /index.php');
        }
    }
?>
