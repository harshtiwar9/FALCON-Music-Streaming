<?php
    include 'db_connect.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title> SelectList </title>
        <link rel="stylesheet" href="/FINAL/falcon_music/extra/css/bootstrap.min.css">
        <script src="/FINAL/falcon_music/extra/jquery/jquery-1.11.3.min.js"></script>
        <script src="/FINAL/falcon_music/extra/js/bootstrap.js"></script>
    </head>
    <body>

        <div class="modal fade" role="dialog" id="result" >
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                       <abbr><h3 class="modal-title text-center"> Alert </h3></abbr>
                    </div>

                    <div class="modal-body bg-danger">
                        <h4><b> <center><p id="result_txt"/></center> </b></h4>
                    </div>
                </div>
            </div>
        </div>
        
        <center> <h2> -= Select Playlist =- </h2>   <br/> 

        </center>
        <?php
        // put your code here
            $sngNme = $_GET["url"];
//            echo $sngNme;
//            include 'db_connect.php';
            $sql = "SHOW TABLES FROM u392307386_user LIKE '$mob%' ";
            $res = mysqli_query($con,$sql);

            echo "<br/>";
            echo "<center>";
            while ($row = mysqli_fetch_row($res))
            {
                $plylst_nm = substr($row[0], 11);
                echo "<table border=1>";
                echo "<tr> <td height='50px'>";
                echo "<input type='button' value='$plylst_nm' id='$sngNme' name='$plylst_nm' onclick='add(this)' style='height:50px; width:500' data-toggle='modal' data-target='#result' />";
                echo "</td> </tr>";                
            }
            echo "</center>";
        ?>

        <script>
           
            function add(obj)
            {
//                alert("in1");
                var nme = obj.id;
//                alert(nme);

                var plylst_nm = obj.name;       
//                alert(plylst_nm);
                
                var xmlhttp;

                if(window.XMLHttpRequest)
                {
                    xmlhttp = new XMLHttpRequest();
                }

                 else
                 {
                     xmlhttp = new ActiveXObject("Microsoft.XMLHttp");
                 }

                 xmlhttp.onreadystatechange=function()
                    {
                        if(xmlhttp.readyState==4 && xmlhttp.status==200)
                            {
                                document.getElementById("result_txt").innerHTML=xmlhttp.responseText;
                                window.setTimeout(function(){location.href="/FINAL/Albums/index.php"},800);
                            }
                    }

                    xmlhttp.open("POST","/FINAL/falcon_music/playlist/addSng_logic.php",true);
                    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xmlhttp.send("url=" +nme+ "&LstNme=" +plylst_nm);
             }
            
        </script>
    </body>
</html>
