<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <style>
          /*  td:hover
            {
                border-bottom: 2px solid Red;
            } */
            a:hover {
                font-size:30px;
                border-bottom:2px red solid;
            }
        </style>
        <script>
            function set_top10()
            {
                var xmlhttp =  new XMLHttpRequest();
                xmlhttp.open("GET","top10.php",true);
                xmlhttp.onreadystatechange = function()
                {
                    var content = "<br/><table border='0'>";
                    for(i=0;i<10;i++)
                        {
                    if(xmlhttp.readyState==4 && xmlhttp.status==200)
                    {
                        var a=xmlhttp.responseText.split("<br/>");//alert(a);
                        var temp = a[i];
                        out =a[i]+"<br/>";//alert(out);
                        out = out.split("-").pop();
                        out = out.split(".");
                        out = out[0];
                        out = out.replace("[DJMaza","");//alert(out);
                        var c = i+1;
                        content += "<tr><td align='left'>"+ c +"</td><td style='font-family:Ebrima;padding-left:5px;'><a style='cursor:pointer;' name='/FINAL/Song_Upload/" + temp +"' onmouseover='setalbum(this)' onclick='parent.play(this.name)' >"+ out +"</a></td></tr>";
                    }
                    }
                    document.getElementById('top10').innerHTML = content;
                }
                xmlhttp.send();
            }

            function setalbum(obj)
            {
                //alert(obj.name
                var a = obj.name;
                var link = a.lastIndexOf("/");
                var result = a.substring(0,link);//alert(result);
                var lin = result.substring(result.lastIndexOf("/"));//alert(lin);
                document.getElementById('album').innerHTML = "<br/><img src='"+result+lin+".jpg' height='250px' width='250px' />";
            }
    </script>
    </head>
    <body onload="set_top10()">
        <?php
        // put your code here
        ?>
        <center>
            <table border="0" height="100%" width="100%">
                <tr>
                    <td width="405px" align="center" valign="top" style="padding-right:0px;"><div id="top10"></div></td><td align="center" valign="top" width="405px"><div id="album"></div></td>
                </tr>
            </table>
        </center>
    </body>
</html>
