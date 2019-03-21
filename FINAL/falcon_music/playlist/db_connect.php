<?php
        session_start();
        if(!(isset($_SESSION['mob'])))
        {
              $_SESSION['pg'] = "page";
        }

        else
        {
            $mob = $_SESSION['mob'];
            $txt = "_plyLst";
            $desh = "_";
            // put your code here
            $con = mysqli_connect("localhost","root","root","Falcon_Music_Final");

            if(!$con)
            {
                die("Database is not Connected :" .mysqli_error($con));
            }
        }
?>
