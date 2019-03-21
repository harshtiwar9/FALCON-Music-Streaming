<?php
//session_start();

    $fnm = $_GET['fnm'];
    $lnm = $_GET['lnm'];
    $gen = $_GET['gen'];
    $mob = $_GET['mob'];
    //$unm = $_POST['unm'];
    $pwd = $_GET['pwd'];

    $con = mysqli_connect("localhost","root","root","Falcon_Music_Final");

    if(!$con)
    {
        echo "<script> alert('Not Connected..!!') </script>";
        header("refresh:0; url= /index.php");
    }
    
    else
    {
        if($_GET['pp']==FALSE)
        {
            echo "<script>alert('pic NOT here');</script>";
                if(!mysqli_query($con,"insert into user_info(firstname, lastname, gender, mobile, password) values ('$fnm','$lnm','$gen','$mob','$pwd')"))
                {
                    echo "<scirpt> alert('Cant Sign-Up ... Error : ";
                    $error = mysqli_error($con);
                    echo $error;
                    echo " Re Sign-Up'); </script>";
                }

                session_start();
                $_SESSION['mob'] = $mob;
                $_SESSION['unme_first'] = $fnm;
                $_SESSION['unme_last'] = $lnm;
                mysqli_query($con,"update user_info set Login_Status='1' where mobile='$mob'");
                echo "<script> alert('..Successful..'); </script>";
                header("refresh:0; url= /index.php");
        }

        else
        {
            echo "<script>alert('pic here');</script>";
            $uploadDir = '/FINAL/falcon_music/login_signup/ProfilePic/';
            $fileName = $_FILES['propic']['name'];
            $ext = pathinfo($fileName, PATHINFO_EXTENSION);
//            print_r($ext);
            //print_r($fileName);
            $tmpName  = $_FILES['propic']['tmp_name'];
            //print_r($tmpName);
            $fileSize = $_FILES['propic']['size'];
            //print_r($fileSize);
            $fileType = $_FILES['propic']['type'];
            //print_r($fileType);
            $filePath = $uploadDir ."$mob.".$ext;
//            print_r($filePath);
            $result = move_uploaded_file($tmpName, $filePath);

            if (!$result)
            {
                echo "<script> alert('Error Uploading Profile Pic : Re Sign-Up'); </script>";
                header("refresh:0; url= /index.php");
            }
            else
            {
                if(!mysqli_query($con,"insert into user_info(user_pic,firstname, lastname, gender, mobile, password) values ('$filePath','$fnm','$lnm','$gen','$mob','$pwd')"))
                {
                    echo "<scirpt> alert('Cant Sign-Up ... Error : ";
                    $error = mysqli_error($con);
                    echo $error;
                    echo " Re Sign-Up'); </script>";
                }

                session_start();
                $_SESSION['mob'] = $mob;
                $_SESSION['unme_first'] = $fnm;
                $_SESSION['unme_last'] = $lnm;
                mysqli_query($con,"update user_info set Login_Status='1' where mobile='$mob'");
                echo "<script> alert('..Successful..'); </script>";
                header("refresh:0; url= /index.php");
            }
        }
    }
    mysqli_close($con);

?>
		