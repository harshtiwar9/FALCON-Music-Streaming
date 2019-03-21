<?php
    include 'db_connect.php';
    if(!(isset($_SESSION['mob'])))
    {
        header("Location: /final/falcon_music/home.php");
    }

        // put your code here
            $desh = "_";
            $lstNme = $_POST["lst_nme"];

//         include 'db_connect.php';

            $sql = "CREATE TABLE $mob$desh$lstNme(id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY, sng_name VARCHAR(200) NOT NULL, sng_album VARCHAR(200) NOT NULL, url VARCHAR(200) NOT NULL)";

             if (!mysqli_query($con,$sql))
             {
                 if(mysqli_num_rows(mysqli_query($con, "SHOW TABLES LIKE '$mob$desh$lstNme' "))==1)
                 {
                     echo ("Playlist '".$lstNme."' Already Exists");
                 }

                 else
                 {
                     echo ( 'Error....' /*. mysqli_error($con)*/);
                 }
             }             

             else
             {
                  echo " ♠ Playlist ";
                  echo "'".$lstNme."'";
                  echo " Created ◘ ";
             }

?>

