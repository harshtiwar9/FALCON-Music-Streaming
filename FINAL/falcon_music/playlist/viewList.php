<?php
    include 'db_connect.php';
    if(!(isset($_SESSION['mob'])))
    {
        header("Location: /FINAL/falcon_music/home.php");
    }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta charset="UTF-8" content="width=device-width, initial-scale=1">                
        <title> ViewList </title>
        <link rel="stylesheet" href="/FINAL/falcon_music/extra/css/bootstrap.min.css">        
        <script src="/FINAL/falcon_music/extra/jquery/jquery-1.11.3.min.js"></script>
        <script src="/FINAL/falcon_music/extra/js/bootstrap.js"></script>        
    </head>
    <body>

        <div class="modal fade" role="dialog" id="result" >
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                       <abbr><h3 class="modal-title text-center"> Alert </h3></abbr>
                    </div>

                    <div class="modal-body bg-danger">
                        <h4><b> <p id="result_txt"/> </b></h4>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <center>
        <h2>  Songs in the Playlist </h2>

        <br> 
        
        <?php
        // put your code here
//            include 'db_connect.php';
            $plylst_nm = $_GET["lst_nme"];
            $result = mysqli_query($con,"SELECT * FROM $plylst_nm");
            
            while($row = mysqli_fetch_array($result))
              {
                  $sngId = $row['id'];
                  $sngNm = $row['sng_name'];//print_r($sngNm);
                  $sngAlbum = $row['sng_album'];
                  $sngUrl = $row['url'];
//                  echo "<center>";
                  echo "<table border=1>";
                  echo "<tr align=center> <td width=320><a name='/FINAL/Song_Upload/$sngUrl' style='cursor:pointer' onclick='parent.play(this.name)'>";
                  echo $sngNm;
                  echo "</a> </td> <td width='100'>";
                  echo $sngAlbum;
                  echo "</td> <td> <a class='btn btn-primary btn-lg' href='/FINAL/Song_Upload/$sngUrl' download> download </a>";
                  echo "</td> <td>";
                  echo "</td> <td> <button class='btn btn-info btn-lg' data-toggle='modal' data-target='#result' id='$sngId' name='$plylst_nm' onclick='sngDelete(this)'> Delete </button>";
                  echo "</td> </tr>";
                  echo "<br>";
              } 
                  echo "</table> </center>"
        ?>

        <br/>  <br/>  <br/>
                              
    <script>
        function sngDelete(obj)
        {
//            alert ('delete');
            var plylst_nm = obj.name;
//            alert(plylst_nm);

            var del_id = obj.id;
//            alert(del_id);
            
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
                                 window.setTimeout(function(){location.reload()},1000);
                            }
                    }

                    xmlhttp.open("POST","/FINAL/falcon_music/playlist/deleteSng_logic.php",true);
                    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xmlhttp.send("del_id=" +del_id+ "&plylst_nme=" +plylst_nm);
        }

//        function dwnlod(obj)
//                {
//    //                alert("yup");
//                    var login = "  ";
//    //                alert(login);
//
//                    if(login == "false")
//                    {
//                        alert('Please Login...');
//                    }
//
//                    else
//                    {
//                        var dwnlodId = obj.id;
//
//                        var xmlhttp;
//
//                        if(window.XMLHttpRequest)
//                        {
//                            xmlhttp = new XMLHttpRequest();
//                        }
//
//                        else
//                        {
//                            xmlhttp = new ActiveXObject("Microsoft.XMLHttp");
//                        }
//
//                        xmlhttp.open("POST","download_logic.php",true);
//
//                        xmlhttp.onreadystatechange=function()
//                        {
//                            if(xmlhttp.readyState==4 && xmlhttp.status==200)
//                                {
//                                    document.getElementById(dwnlodId).href = xmlhttp.responseText;
//                                }
//                        }
//
//                        xmlhttp.send("dwnlodSng="+dwnlodId);
//                    }
//                }
    </script>        
        
    </body>
</html>
