<?php
session_start();
//print_r($_SESSION);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html class="no-js">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Falcon</title>
        <link rel="shortcut icon" type="image/x-icon" href="/FINAL/favicon.ico">
        <link rel="stylesheet" href="/FINAL/falcon_music/extra/css/bootstrap.min.css">
        <script src="/FINAL/falcon_music/extra/jquery/jquery-1.11.3.min.js"></script>
        <script src="/FINAL/falcon_music/extra/js/bootstrap.js"></script>

        <script>
            /* function for input type='file' styling */
            (function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);
        </script>
        <script>
            function counter()
            {
                document.getElementById('counter').innerHTML = "<a href='http://www.hitwebcounter.com' target='_blank'><img src='http://hitwebcounter.com/counter/counter.php?page=6271777&style=0038&nbdigits=5&type=page&initCount=0' title='http://www.hitwebcounter.com/' Alt='http://www.hitwebcounter.com/'   border='0' ></a><br/><a href='http://www.hitwebcounter.com' title='Counter For Wordpress' target='_blank' style='font-family: Geneva, Arial, Helvetica;font-size: 8px; color: #9F9F97; text-decoration: underline ;'><font color='Red'>No. Of Users Visited</font></a>";
            }

        setInterval(counter(), 1000);
    </script>
        <style>
            a:hover
            {
                cursor:pointer;
            }
            /* .modal-transparent */
                        .modal-transparent {
              background: transparent;
            }
            .modal-transparent .modal-content {
              background: transparent;
            }
            .modal-backdrop.modal-backdrop-transparent {
              background: #ffffff;
            }
            .modal-backdrop.modal-backdrop-transparent.in {
              opacity: .9;
              filter: alpha(opacity=90);
            }

            /* .modal-fullscreen */

            .modal-fullscreen {
              background: transparent;
            }
            .modal-fullscreen .modal-content {
              background: transparent;
              border: 0;
              -webkit-box-shadow: none;
              box-shadow: none;
            }
            .modal-backdrop.modal-backdrop-fullscreen {
              background: #ffffff;
            }
            .modal-backdrop.modal-backdrop-fullscreen.in {
              opacity: .97;
              filter: alpha(opacity=97);
            }

            /* proPic */
            .no-js .inputfile + label {
                display: none;
            }

        </style>
    </head>
    <body onload="counter()">

        <div class="modal modal-transparent modal-fullscreen fade" role="dialog" id="result" >
            <div class="modal-dialog modal-md">
                <div class="modal-content ">
            <!--        <div class="modal-header bg-primary">
                       <abbr><h3 class="modal-title text-center"> Alert </h3></abbr>
                    </div>

                    <div class="modal-body bg-danger">
                        <h4><b> <p id="result_txt"/> </b></h4>
                    </div>  -->
                </div>
            </div>
        </div>
        <style>
        .circle
        {
          display: block;
          width: 150px;
          height: 150px;
          margin: 1em auto;
          background-size: cover;
          background-repeat: no-repeat;
          background-position: center center;
          -webkit-border-radius: 99em;
          -moz-border-radius: 99em;
          border-radius: 99em;
          border: 5px solid #eee;
          box-shadow: 0 3px 2px rgba(0, 0, 0, 0.3);
        }
</style>
        
    </head>
    <body>
    <!--<embed src="Flash_back.swf" quality="high" type="application/x-shockwave-flash" width="480" height="125" wmode="transparent" />-->
        <?php
        // put your code here
        ?>
        <center>
            <table border="0" width="100%">
                <tr>
                    <td width="25%" height="740px"><object id="v1" data="/FINAL/HOMEPAGE_FALCON/v1.swf" height="730px" width="374px" wmode="transparent" id="v1"></object>
                    <div id="counter" />
                    </td>
                    <td width="75%" height="740px" valign="top">
                        <table border="0">
                            <tr>
                            <?php
                                if(isset ($_SESSION['mob']))
                                {
                                    $login = "true";
                                    include 'FINAL/HOMEPAGE_FALCON/ProPic.php';
//                                    echo "<img align='right' src='PROFILE.png' height='80px' width='80px' />";
//                                    echo "<div align='right'> <a href='/FINAL/falcon_music/login_signup/signOut_logic.php' align='right'> Log Out </a> </div>";
//                                    echo "<h4> <center style='padding: '> Hello... <b style='text-transform:capitalize;'>" .$_SESSION['unme_first']."&nbsp;".$_SESSION['unme_last']. "</b> </center> </h4>";
                                    ?>
                                    <td>
                                        <img align='right' class="img-circle" style="border:3px solid #B0B0B0; padding:px" src='<?php echo "$ProPicUrl" ?>' height='89px' width='105px' />
                                        <?php
                                            echo "<h4> <center style='padding:25px'> Welcome... <b style='text-transform:capitalize;'>" .$_SESSION['unme_first']."&nbsp;".$_SESSION['unme_last']. "</b> </center> </h4>";
                                        ?>
                                        <div align='right' style='padding:0px 23px;'> <a href='/FINAL/falcon_music/login_signup/signOut_logic.php' align='right' style="color:red"> Log Out </a> </div>
                                    </td>
                                    <?php
                                }

                                elseif(isset ($_SESSION['pg']))
                                {
                                    echo "<script> alert('Please Login...'); </script>";
                                    $login = "false";
                                    unset ($_SESSION['pg']);
//                                    echo "<div align='right'> <a href='login_signup/login_signup.html' class='btn btn-link btn-lg' data-toggle='modal' data-target='#result'> Login/Sign Up </a> </div>";
//                                    echo "<script> window.open('/FINAL/HOMEPAGE_FALCON/index.php','_self'); </script>";
                                    ?>
                                    <td height="107px"> <div style="padding:0px 0px 15 850;"><a href="/FINAL/falcon_music/login_signup/login_signup.html" class="btn btn-default btn-lg" data-toggle="modal" data-target="#result"> Login/Sign Up </a></div> </td>
                                    <?php
                                }

                                else
                            //    else if(!isset ($_SESSION['mob']))
                                {
                                    $login = "false";
//                                    echo "<div align='right'> <a href='/FINAL/falcon_music/login_signup/login_signup.html' class='btn btn-link btn-lg' data-toggle='modal' data-target='#result'> Login/Sign Up </a> </div>";
                                   ?>
                                   <td height="107px"> <div style="padding:0px 0px 15 850;"><a href='/FINAL/falcon_music/login_signup/login_signup.html' class='btn btn-default btn-lg' data-toggle='modal' data-target='#result'> Login/Sign Up </a></div> </td>
                                   <?php
                                }
                            ?>
<!--                                <td width="946px" height="70px"><img style="padding:5px;" align="right" src="PROFILE.png" height="80px" width="80px" /></td> -->
                            </tr>
                            <tr align="center">
                                <td valign="top" width="946px" height="55px"><a name="new_release" onclick="setdiv(this)" ><img src="/FINAL/HOMEPAGE_FALCON/Navigation/images/Navigation-title-bar_01.gif" width="185" height="55" alt=""/></a><a name="albums" onclick="setdiv(this)"><img src="/FINAL/HOMEPAGE_FALCON/Navigation/images/Navigation-title-bar_02.png" width="110" height="55" alt=""/></a><a name="top10" onclick="setdiv(this)"><img src="/FINAL/HOMEPAGE_FALCON/Navigation/images/Navigation-title-bar_03.gif" width="90" height="55" alt=""/></a><a><img src="/FINAL/HOMEPAGE_FALCON/Navigation/images/Navigation-title-bar_04.gif" id="playlist" name="playlist" onclick="setdiv(this)" name="playlist" width="90" height="55" alt=""/></a><img src="/FINAL/HOMEPAGE_FALCON/Navigation/images/Navigation-title-bar_05.gif" width="400" height="55" alt=""/></td>
                            </tr>
                            <tr>
                                <td align="left" valign="left" width="946px" height="430px">
                                    <!--<div id="page" style="border:2px solid red;height:425px;"></div>-->
                                    <iframe id="page" seamless scrolling="no" src="/FINAL/HOMEPAGE_FALCON/Intro.swf" wmode="transparent" style="border:0px solid red;padding-top: 0px;height:425px;width:100%" ></iframe>
                                </td>
                            </tr>
                            <tr>
                                <td height="150px" align="center"><center><object id="flashObject" wmode="transparent" data="/FINAL/HOMEPAGE_FALCON/Pbar_Player.swf" height="148px" width="900px" /></center></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </center>

        <script type="text/javascript">

            window.onbeforeunload = function() {
  return "Data will be lost if you leave the page, are you sure?";
};

            function play(a)
            {
                //alert(a);
            flashObject.earase();
            flashObject.LoadFile(a);
            }

            function disc_play()
            {
                v1.disc_play();
            }

            function disc_stop()
            {
                v1.disc_stop();
            }

            function Navigator_musicPlayer()
            {
                document.getElementById('page').src="Intro.swf";
            }

            function Navigator_Profile()
            {
                alert("Profile");
            }

            function load()
            {
                //document.getElementById('page').innerHTML="<object type='text/html' data='http://localhost/Interface/index.php' height='420px' width='946px' />";
                document.getElementById('page').src="<object id='flashObject' width='825' height='425' data='Intro.swf'>";
            }

        function setdiv(obj)
        {
            var page = obj.name;    //alert(page);
            if(page=="new_release")
                {
                    document.getElementById('page').src="/FINAL/Poster_Slide/index.php";
                }
                else if(page=="albums")
                {
                    //document.getElementById('page').src="http://localhost/GRID_ALBUM_FINAL/index.php";
                    document.getElementById('page').src="/FINAL/Albums/index.php";
                    document.getElementById('page').scrolling="auto";
                }
                else if(page=="top10")
                {
                    document.getElementById('page').src="/FINAL/Top10/index.php";
                }
                
                else if(page == "playlist")
                {
//                    alert('working');
                    var login = "<?php echo $login  ?>";
                    if(login == "false")
                        {
                            alert("Please Login...");
                        }

                        else
                            {
                                document.getElementById("page").src = "/FINAL/falcon_music/playlist/plyList.php";
                            }
                }
        }
    </script>
    <!--<script language="JavaScript">
VIH_BackColor = "palegreen";
VIH_ForeColor = "navy";
VIH_FontPix = "16";
VIH_DisplayFormat = "You are visiting from:<br>IP Address: %%IP%%<br>Host: %%HOST%%";
VIH_DisplayOnPage = "yes";
</script>
<script language="JavaScript" src="http://scripts.hashemian.com/js/visitorIPHOST.js.php"></script>-->
    </body>
</html>	