<?php
// put your code here

    include 'db_connect.php';
    if(!(isset($_SESSION['mob'])))
    {
        header("Location: /final/falcon_music/home.php");
    }

    else
    {
        $lstNme = $_POST["lst_nme"];
//            include 'db_connect.php';

        $sql = mysqli_query($con, "DROP TABLE $lstNme");

        if(!$sql)
        {
            die('Error.....: ' . mysqli_error($con));
        }

        else
        {
            echo " ♠ Playlist ";
            echo "'".substr($lstNme, 11)."'";
            echo " Deleted ◘ ";
        }
    }
?>
