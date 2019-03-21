<?php

    $v=false;
    $m="..Error..";

    if(isset($_GET["txtMob"]))
    {
        $mob = $_GET["txtMob"];
        $con = mysqli_connect("localhost","root","root","Falcon_Music_Final");
        $res = mysqli_query($con,"SELECT * FROM user_info WHERE mobile='$mob'");
        $row = mysqli_fetch_array($res);
        $db_mob = $row['mobile'];
                        
        if(!$mob == null)
        {
            if($db_mob == $mob)
            {
                $v=false;
                $m="Mobile No. is already Registerd";
            }

            else
            {
                $v=true;
                $m=" ";
            }
        }        

        else
        {
            $v=true;
            $m=" ";
        }

        echo $v."||".$m;        
    }

    else
    {
        header('Location: /FINAL/falcon_music/home.php');
    }
    
?>
