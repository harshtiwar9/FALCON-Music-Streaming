<?php
        // put your code here
    include 'db_connect.php';
    if(!(isset($_SESSION['mob'])))
    {
        header("Location: /final/falcon_music/home.php");
    }

    else
    {

        $plylstNm = $_POST['plylst_nme'];
        $del_id = $_POST['del_id'];
//        include 'db_connect.php';
        $sql = "DELETE FROM $plylstNm WHERE id='$del_id'";

        if (!mysqli_query($con,$sql))
        {
            die('Error.....: ' . mysqli_error($con));
        }

        else
        {
             echo "<center id='txt'> ♠ Deleted ◘ </center>";
//                 header('Location : viewList.php');
        }
    }
?>
