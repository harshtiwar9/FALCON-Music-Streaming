<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
//            echo "afasf";
        if (isset($_POST['submit'])) {
            if ($_FILES['propic']['name'] == FALSE) {
                //            $propic = ;
                $mob = $_POST['mob'];
                $fnm = $_POST['fnm'];
                //            echo $mob;
                $lstnm = $_POST['lstnm'];
                $gender = $_POST['gender'];
                $pwd = $_POST['txtpassword'];

                $con = mysqli_connect("localhost","root","root","Falcon_Music_Final");

                $res = mysqli_query($con, "UPDATE `user_info` SET `firstname`=$fnm,`lastname`=$lstnm,`gender`=$gender,`password`=$pwd WHERE 'mobile'='$mob'");

                if (!$res) {
                    echo "mysqli_error";
                    header("refresh:5; url= /final/HOMEPAGE_FALCON/index.php");
                } else {
                    echo "<script> alert('..Success..') </script>";
                    header("refresh:0; url= /final/HOMEPAGE_FALCON/index.php");
                }
            } else {
                $mob = $_POST['mob'];
                $fnm = $_POST['fnm'];
                //            echo $mob;
                $lstnm = $_POST['lstnm'];
                $gender = $_POST['gender'];
                $pwd = $_POST['txtpassword'];
                $uploadDir = 'ProfilePic/';
                $fileName = $_FILES['propic']['name'];
                $ext = pathinfo($fileName, PATHINFO_EXTENSION);
//            print_r($ext);
                //print_r($fileName);
                $tmpName = $_FILES['propic']['tmp_name'];
                //print_r($tmpName);
                $fileSize = $_FILES['propic']['size'];
                //print_r($fileSize);
                $fileType = $_FILES['propic']['type'];
                //print_r($fileType);
                $filePath = $uploadDir . "$mob." . $ext;
//            print_r($filePath);
                $result = move_uploaded_file($tmpName, $filePath);

                if (!$result) {
                    echo "<script> alert('Error Uploading Profile Pic : Re Sign-Up'); </script>";
                    header("refresh:0; url= /final/HOMEPAGE_FALCON/index.php");
                } elseif (!get_magic_quotes_gpc()) {
                    $fileName = addslashes($fileName);
                    $filePath = addslashes($filePath);

                    $con = mysqli_connect("localhost","root","root","Falcon_Music_Final");

                    if (!mysqli_query($con, "UPDATE `user_info` SET `user_pic`='/final/falcon_music/login_signup/$filePath',`firstname`=$fnm,`lastname`=$lstnm,`gender`=$gender,`password`=$pwd WHERE 'mobile'='$mob'")) {
                        echo "mysqli_error";
                        header("refresh:5; url= /final/HOMEPAGE_FALCON/index.php");
                    } else {
                        echo "<script> alert('..Success..') </script>";
                        header("refresh:0; url= /final/HOMEPAGE_FALCON/index.php");
                    }
                } else {
                    echo "<script> alert('..Error..') </script>";
                    header("refresh:0; url= /final/HOMEPAGE_FALCON/index.php");
                }
            }
        }
        ?>
    </body>
</html>
