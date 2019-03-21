<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <script>
        function set(obj)
        {
            var name = obj.name;
            if(name=="upload")
                {
                    document.getElementById('Page').src="/FINAL/Song_Upload/index_old.php";
                }
        }
    </script>
        <style>
            .grayscaleimg
            {
                filter: grayscale(2);
                -webkit-filter: grayscale(1);
                -moz-filter: grayscale(1);
                -o-filter: grayscale(1);
                -ms-filter: grayscale(1);
            }

            .grayscaleimg:hover
            {
                filter: grayscale(0);
                -webkit-filter: grayscale(0);
                -moz-filter: grayscale(0);
                -o-filter: grayscale(0);
                -ms-filter: grayscale(0);
            }
        </style>
    </head>
    <body style="background-color:rgb(119,39,7)">
        <?php
        // put your code here
        ?>
        <a align='right'>Logout</a>
        <center>
            <img src="Images/Top.png" />
            <br/>
            <table align="center" border="0">
                <tr width="1325px" align="center">
                    <td width="200px" align="center"><img name="upload" onclick="set(this)" class="grayscaleimg" src="Images/upload.png" align="center"></img></td>
                    <td height="452px" width="1000px" rowspan="2"><iframe scrolling="no" align="center" id="Page" width="1000px" height="452px"></iframe></td>
                </tr>
            </table>
        </center>
    </body>
</html>
