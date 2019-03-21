<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <script>
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
                        var j=0,k=0;
                        do{
                            if(url.indexOf(response[j]) === -1){
                                url[k]=response[j];
                                k++;
                                }
                                j++;
                        }
                        while(j < (response.length-1));
                        var tb = "<table style='border-spacing: 1px;' ><tr>";
                        for(i=0;i <= url.length-1; i++)
                        {
                            p = url[i];
                            //outt =p+"<br/>";
                            m = p.split("/");//alert(m);
                            tb += "<td><img src='http://localhost/FINAL/Song_Upload/"+p+"' height='175px' width='180px'  name='"+m[1]+"' onclick='setalbum(this)' title='"+m[1]+"' /></td>";//alert(tb);
                            if(i==4)
                                {
                                  tb += "</tr>";
                                }
                            document.getElementById('Grid').innerHTML = tb;
                        }
                        tb = "</tr></table>";
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
                                "<table valign='middle' border='0' height='400px' width='925px' ><tr height=''><td width='150px' height='80px' valign='top'><img valign='top' style='display: block;width: 150px;height: 150px;margin: 1em auto;background-size: cover;background-repeat: no-repeat;background-position: center center;-webkit-border-radius: 99em;-moz-border-radius: 99em;border-radius: 99em;border: 5px solid #eee;box-shadow: 0 3px 2px rgba(0, 0, 0, 0.3);' src='http://localhost/FINAL/Song_Upload/uploads/"+nm+"/"+nm+" - Front.jpg' align='center' /></td><td rowspan='2' valign='top'><table align='center'><tr><td valign='top'><center><h1>"+nm+"</h1></center><hr width='700px'/><br/><div id='Songs'></div></td></tr></table></td></tr><tr><td align='center' valign='top'><font style='font-family: 'Droid Sans', sans-serif;font-size:.9em;text-align: center;color: #495a62;'>Movie Name : "+nm+"</font></td></tr></table>"
                            );
                //parent.document.getElementById('page').innerHTML="<img src='http://localhost/last/"+p+"'/>";
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
                        var content = "<table border='2' width='700px'><tr><ul>";
                        for(i=0;i < (response.length-1);i++)
                        {
                            var p = response[i];
                            out =p+"<br/>";
                            out = out.split("-").pop();
                            out = out.split(".");
                            out = out[0];
                            out = out.replace("[DJMaza","");//alert(out);
                            content += "<td width='500px'><li><a style='cursor:pointer;' name='http://localhost/FINAL/Song_Upload/" + response[i] +"' onclick='parent.play(this.name)' >" + out + "</a></li></td><td id='" + response[i] +"' onclick='selectlist(this)'><img src='' /></td><td><img src='' /></td></tr>";
                            //alert(content);
                        }
                        document.getElementById("Songs").innerHTML = content;
                    }
                }
                xmlhttp.send();
            }
    </script>
    </head>
    <body onload="set_album_art()">
        <?php
        // put your code here
        ?>
        <center>
            <table width="928px" border="0" height="400px">
                <tr>
                    <td>
                        <div style="border:0px red solid;" id="Grid"></div>
                    </td>
                </tr>
            </table>
        </center>

        <script>
            function selectlist(obj)
            {
                var id = obj.id
//                alert(id);
                location.href='/final/falcon_music/playlist/selectLst.php?url='+id;
            }
        </script>
    </body>
</html>
