<?php
session_start();
                                if(isset ($_SESSION['mob']))
                                {
                                    $login = "true";
//                                    include 'ProPic.php';
//                                    echo "<img align='right' src='PROFILE.png' height='80px' width='80px' />";
//                                    echo "<div align='right'> <a href='/final/falcon_music/login_signup/signOut_logic.php' align='right'> Log Out </a> </div>";
//                                    echo "<h4> <center style='padding: '> Hello... <b style='text-transform:capitalize;'>" .$_SESSION['unme_first']."&nbsp;".$_SESSION['unme_last']. "</b> </center> </h4>";
                                    
                                }

                                else
                            //    else if(!isset ($_SESSION['mob']))
                                {
                                    $login = "false";
//                                    echo "<div align='right'> <a href='/final/falcon_music/login_signup/login_signup.html' class='btn btn-link btn-lg' data-toggle='modal' data-target='#result'> Login/Sign Up </a> </div>";
                                }
                            ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <style>
       /*     img:hover
            {
                width:300px;
                height:300px;
            } */
            a:hover
            {
                border-color:Red;
                text-transform:uppercase;
            }
        </style>
        <script>
            var out = "";
            var p = "";
            function set_album_art()
            {
                var xmlhttp =  new XMLHttpRequest();
                xmlhttp.open("GET","Try2.php",true);
                xmlhttp.onreadystatechange = function()
                {
                    if(xmlhttp.readyState==4 && xmlhttp.status==200)
                    {
                        var response = xmlhttp.responseText.split("<br/>");//alert(response);
                        var outt="";
                        var url=[];
                        var j=1,k=1;
                        do{
                            if(url.indexOf(response[j]) === -1){
                                url[k]=response[j];
                                k++;
                                }
                                j++;
                        }
                        while(j < (response.length-1));
                        var tb = "<table border='0px' style='border-spacing: 1px;' ><tr>";  //<marquee scrollamount='10' onmouseover='this.stop()' onmouseout='this.start()'>
                        for(i=1;i <= url.length-1; i++)
                        {
                            p = url[i];
                            //outt =p+"<br/>";
                            m = p.split("/");//alert(m);
                            //alert("src='/FINAL/Song_Upload/"+p);
                            tb += "<td><img style='cursor:pointer;' src='/FINAL/Song_Upload/"+p+"' height='135px' width='140px'  name='"+m[1]+"' onclick='setalbum(this)' title='"+m[1]+"' /></td>";//alert(tb);
                            if(i%6==0)
                            { //alert("in");
                                  //console.log(i);
                                  tb += "</tr>";
                            }
                            document.getElementById('Grid').innerHTML = tb;
                        }
                        tb = "</tr></table>";  //</marquee>
                    }
                }
                xmlhttp.send();
            }

            function setalbum(obj)
            {
                //alert(obj.name);
                var nm = obj.name;//alert(nm);
                var dstFrame = parent.document.getElementById('page');
                var dstDoc = dstFrame.contentDocument || dstFrame.contentWindow.document;
                dstDoc.write( 
                                "<table valign='middle' border='0' height='400px' width='925px' ><tr height=''><td width='150px' height='80px' valign='middle'><img valign='top' style='font-family:Ebrima;display: block;width: 150px;height: 150px;margin: 1em auto;background-size: cover;background-repeat: no-repeat;background-position: center center;-webkit-border-radius: 99em;-moz-border-radius: 99em;border-radius: 99em;border: 5px solid #eee;box-shadow: 0 3px 2px rgba(0, 0, 0, 0.3);' src='/FINAL/Song_Upload/uploads/"+nm+"/"+nm+".jpg' align='center' /></td><td rowspan='2' valign='top'><table align='center'><tr><td valign='top' align='left'><hr width='700px'/><div id='Songs'></div><br/><hr width='700px'/></td></tr></table></td></tr><tr><td align='center' valign='top'><font style='font-family: Ebrima;font-size:.9em;text-align: center;color: #495a62;'>Movie Name : "+nm+"</font></td></tr></table>"
                            );
                //parent.document.getElementById('page').innerHTML="<img src='/last/"+p+"'/>";
                set_song_name(obj);
            }

            function set_song_name(obj)
            {
               //alert("Set_Song_Name");
                var a = obj.name;//alert(a);
                var xmlhttp =  new XMLHttpRequest();
                //alert("Try.php?mn="+a);
                xmlhttp.open("GET","Try.php?mn="+a,true);
                xmlhttp.onreadystatechange = function()
                {
                    if(xmlhttp.readyState==4 && xmlhttp.status==200)
                    {
                        //alert("wow " + xmlhttp.readyState);
                        var response = xmlhttp.responseText.split("<br/>");//alert(response);
                        var content = "<table border='0' width='700px'><tr>";
                        for(i=0;i < (response.length-1);i++)
                        {
                            var p = response[i];//alert(p);
                            out =p+"<br/>";
                            out = out.split("-").pop();
                            out = out.split(".");
                            out = out[0];
                            out = out.replace("[DJMaza","");
                            //alert("<a onclick='dwn(this)' id='downloadlnk' name='/FINAL/Song_Upload/"+ p +"'  download >");
                            content += "<td width='500px' height='40px' >♫ &nbsp;<a onmouseover=(this.style.fontSize='xx-large') onmouseout=(this.style.fontSize='medium') style='cursor:pointer;font-family:Ebrima;' name='/FINAL/Song_Upload/" + response[i] +"' onclick='parent.play(this.name)' >" + out + "</a></li></td><td><img style='cursor:pointer;' src='/FINAL/HOMEPAGE_FALCON/button_new/playlist.png' id='/FINAL/Song_Upload/" + response[i] +"'' onclick='selectlist(this)' /></td><td><a onclick='dwn(this)' id='downloadlnk' name='/FINAL/Song_Upload/"+ p +"' download ><img id='"+ p +"' src='/FINAL/HOMEPAGE_FALCON/button_new/download.png' /></a></td></tr>"; //href='/FINAL/Song_Upload/"+ p +"'
                            //alert(content);
                        }
                        document.getElementById("Songs").innerHTML = content;
                    }
                }
                xmlhttp.send();
            }

            function get_id(obj)
            {
                //alert(obj);
                var a = obj;
                var xmlhttp =  new XMLHttpRequest();
                //alert("Get_ID.php?ab="+a);
                xmlhttp.open("get","Get_ID.php?ab="+a,true);
                xmlhttp.onreadystatechange = function()
                {
                    if(xmlhttp.readyState==4 && xmlhttp.status==200)
                    {
                        var response=xmlhttp.responseText;console.log(response);
                        alert(response);
                    }
                }
                xmlhttp.send();
            }

            function download_count(obj)
            {
               //alert("Set_Song_Name");
                var a = obj.name;//alert(a);
                var xmlhttp =  new XMLHttpRequest();
                xmlhttp.open("GET","ID.php?ab="+a,true);
                xmlhttp.onreadystatechange = function()
                {
                    if(xmlhttp.readyState==4 && xmlhttp.status==200)
                    {
                        var a=xmlhttp.responseText;
                        //alert(a);
                    }
                }
                xmlhttp.send();
            }

            function dwn(obj)
            {
                var id = obj.name;//alert(id);
        var login = "<?php echo $login  ?>";//alert(login);
                    if(login == "false")
                        {
                            alert("Please Login...");
                        }

                        else
                            {
//                                document.getElementById("page").src = "/final/falcon_music/playlist/plyList.php";
                                    download_count(obj);
                                    //alert(id);
                                    document.getElementById("downloadlnk").href = id;
                                    //alert("Inn");
                            }
            }

            function selectlist(obj)
            {
                var id = obj.id

//                alert(id);
                var login = "<?php echo $login  ?>";//alert(login);
                    if(login == "false")
                        {
                            alert("Please Login...");
                        }
                        else{
                location.href='/final/falcon_music/playlist/selectLst.php?url='+id;
                        }
            }
    </script>
    </head>
    <body onload="set_album_art()" style="font-family:Ebrima;">
        <?php
        // put your code here
        ?>
        <center>
            <table width="928px" border="0" height="400px">
                <tr>
                    <td>
                        <div style="border:0px red solid;vertical-align: top;" align="center" id="Grid"></div>
                    </td>
                </tr>
            </table>
        </center>
    </body>
</html>