<?php
include 'db_connect.php';

if(!(isset($_SESSION['mob'])))
{
//    echo "<script> alert('Please Login...') </script>";
//    header('Location: /final/homepage_falcon/index.php?page=plyList');
}

else
{
//    echo "<div align='right'> <a href='/final/falcon_music/login_signup/signOut_logic.php' align='right' class='btn btn-danger btn-sm'> Log Out </a> </div>";
//    echo "<h4> <center> Hello... <b style='text-transform:capitalize'>" .$_SESSION['unme_first']."&nbsp;".$_SESSION['unme_last']. "</b> </center> </h4>";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title> Playlist </title>
        <link rel="stylesheet" href="/FINAL/falcon_music/extra/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/FINAL/falcon_music/extra/css/normalize.css" />
        <link rel="stylesheet" type="text/css" href="/FINAL/falcon_music/extra/css/fonts/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="/FINAL/falcon_music/extra/css/demo_txt.css" />
        <link rel="stylesheet" type="text/css" href="/FINAL/falcon_music/extra/css/set2.css" />
        <script src="/FINAL/falcon_music/extra/jquery/jquery-1.11.3.min.js"></script>
        <script src="/FINAL/falcon_music/extra/js/bootstrap.js"></script>
        <script>
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    </head>

    <body background="/FINAL/falcon_music/extra/images/music2.jpg">

        <div class="modal fade" role="dialog" id="result">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <abbr><h3 class="modal-title text-center"> Alert </h3></abbr>
                    </div>

                    <div class="modal-body bg-danger">
                        <center><h4><b> <p id="res"/> </b></h4></center>
                    </div>
                </div>
            </div>
        </div>

        <center>


            <!--       <input type="text" id="plylstNme" onkeyup="actvBtn(this)" onselect="actvBtn(this)" minlength=2 maxlength="15" pattern="[A-Za-z0-9]{2,}" data-toggle='tooltip' data-placement='auto bottom' title="Space & Symbol Characters are not Allowed" required/> <button id="mkList" onclick="createList()" data-toggle='modal' data-target='#result' tabindex="0" disabled> Create Playlist </button>  -->

    <!--       <section class="content bgcolor-1">   -->

            <h3>
                <span class="input input--nao" data-toggle='tooltip' data-placement='auto left' title="Space & Symbol Characters are not Allowed">
                    <input onkeyup="actvBtn(this)" onselect="actvBtn(this)" minlength=2 maxlength="15" pattern="[A-Za-z0-9]{2,}" class="input__field input__field--nao" type="text" id="plylstNme" required/>
                    <label class="input__label input__label--nao" for="plylstNme">
                        <span class="input__label-content input__label-content--nao">Enter Playlist Name</span>
                    </label>
                    <svg class="graphic graphic--nao" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
                        <path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
                    </svg>
                </span>
            </h3>

            <h4> <button class="btn btn-lg" id="mkList" onclick="createList()" data-toggle='modal' data-target='#result' tabindex="0" disabled> Create Playlist </button> </h4>
            <!--       </section>    -->


            <br/> <br/> <br/>
        </center>

<?php
// put your code here
//            include 'db_connect.php';
$sql = "SHOW TABLES FROM u392307386_user LIKE '$mob%' ";
$res = mysqli_query($con,$sql);

echo "<br/>";
echo "<center>";
while ($row = mysqli_fetch_row($res))
{
$plylst_nm = substr($row[0], 11);
echo "<table border=0 width='85%'>";
echo "<tr> <td height='50px' width='100%' class='btn btn-primary' onclick=location.href='/FINAL/falcon_music/playlist/viewList.php?lst_nme=$mob$desh$plylst_nm' data-toggle='tooltip' data-placement='auto' title='Click to See in List'>";
echo $plylst_nm;
echo "</td> <td> <input type='submit' class='btn btn-danger btn-lg' name='$mob$desh$plylst_nm' value='delete' onclick='lstDelete(this)' data-toggle='modal' data-target='#result'>";
echo "</td> </tr>";
}
echo "</center>";
?>

        <script>

            function actvBtn(e)
            {
//                                alert("yep");
                document.getElementById("mkList").disabled = ((e.value !== e.defaultValue) ? false : true);

                if(!document.getElementById("mkList").disabled)
                {
                    document.getElementById("mkList").style.color = "#fff";
                    document.getElementById("mkList").style.background = "#449d44";
                    document.getElementById("mkList").style.border = "#398439";
                }

                else if(document.getElementById("mkList").disabled)
                {
                    document.getElementById("mkList").style.color = "rgb(114,114,114)";
                    document.getElementById("mkList").style.background = "rgb(225,223,223)";
                }
            }

            function createList()
            {
                //            alert ('create');
                var lstNme = document.getElementById("plylstNme").value;
                //            alert(lstNme);
                if(lstNme == "")
                {
                    document.getElementById("res").innerHTML = "Please Enter Playlist Name";
                }

                else
                {
                    var xmlhttp;

                    if(window.XMLHttpRequest)
                    {
                        xmlhttp = new XMLHttpRequest();
                    }

                    else
                    {
                        xmlhttp = new ActiveXObject("Microsoft.XMLHttp");
                    }

                    xmlhttp.open("POST","/FINAL/falcon_music/playlist/crtList_logic.php",true);
                    xmlhttp.onreadystatechange=function()
                    {
                        if(xmlhttp.readyState==4 && xmlhttp.status==200)
                        {
                            //                                var a=xmlhttp.responseText;
                            //                                alert(a);
                            document.getElementById("res").innerHTML=xmlhttp.responseText;
                            window.setTimeout(function(){location.reload()},1650);
                        }
                    }

                    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xmlhttp.send("lst_nme=" +lstNme);
                }
            }

            function lstDelete(obj)
            {
                var lstNme = obj.name;
                //            alert(lstNme);

                var xmlhttp;

                if(window.XMLHttpRequest)
                {
                    xmlhttp = new XMLHttpRequest();
                }

                else
                {
                    xmlhttp = new ActiveXObject("Microsoft.XMLHttp");
                }

                xmlhttp.open("POST","/FINAL/falcon_music/playlist/deleteList_logic.php",true);
                xmlhttp.onreadystatechange=function()
                {
                    if(xmlhttp.readyState==4 && xmlhttp.status==200)
                    {
                        document.getElementById("res").innerHTML=xmlhttp.responseText;
                        window.setTimeout(function(){location.reload()},1350);
                    }
                }

                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xmlhttp.send("lst_nme=" +lstNme);
            }

        </script>

    </body>
</html>
<?php
}
?>
