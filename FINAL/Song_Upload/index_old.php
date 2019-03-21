<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body bgcolor="yellow" style="color:red;">
    <script type="text/javascript" src="jquery_min.js"></script>
    <script type="text/javascript" src="ID3Reader.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                window.reader = new ID3Reader($("#file")[0]);
                reader.onload = function(tag) {
                    console.log(tag);
                    if(!tag) {
                        console.log("Unable to read ID3 Tag of file");
                        return false;
                    }
                    $("#songArtist").val(tag.artist);
                    $("#songTitle").val(tag.title);
                    $("#songAlbum").val(tag.album);
                };
            });

            function edit(obj)
            {
//                alert(obj.id);
                  document.getElementById(obj.id).readOnly = false;
            }
        </script>
        <?php
        // put your code here
        ?>
        <center>
            <form enctype="multipart/form-data" action="Upload_old.php" method="POST">
        <table align="center" style="font-size:30px;" width="1000px" height="452px" border="0">
            <tr align="center">
                <td>File Path :</td><td><input type="text" style="color:red;" name="path" /></td>
            </tr>
            <tr align="center">
                <td>Select File :</td><td><input type="file" style="color:red;" id="file" name="file" /></td>
            </tr>
            <tr align="center">
                <td>Song Title :</td><td><input id="songTitle" style="color:red;" readonly name="songTitle" type="text" />&nbsp;&nbsp;<a style='cursor:pointer;font-size:10px;' id="songTitle" onclick="edit(this)" >Edit</a></td>
            </tr>
            <tr align="center">
                <td>Song Album :</td><td><input id="songAlbum" style="color:red;" readonly name="songAlbum" type="text" /></td>
            </tr>
            <tr align="center">
                <td>Song Artist :</td><td><input id="songArtist" style="color:red;" readonly name="songArtist" type="text" />&nbsp;&nbsp;<a style='cursor:pointer;font-size:10px;' id="songArtist" onclick="edit(this)" >Edit</a></td>
            </tr>
            <tr align="center">
                <td colspan="2"><input type="submit" style="cursor:pointer;color:red;border-radius:10px;background-color:yellow;" value="Upload File" name="submit" /></td>
            </tr>
        </table>
        </form>
        </center>
    </body>
</html>
