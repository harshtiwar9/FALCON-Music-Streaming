        <?php
            session_start();
            $con = mysqli_connect("localhost","root","root","Falcon_Music_Final");
            mysqli_query($con,"update user_info set Login_Status='0' where mobile='{$_SESSION['mob']}'");
            session_unset();
            session_destroy();
            header('Location: /index.php');
            
        ?>
