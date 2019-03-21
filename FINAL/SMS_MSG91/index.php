<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <script type="text/javascript">
            var jsonResponse = "";
            function verify()
            {
                var a = document.getElementById("no").value;
                alert(a);
                var xmlhttp =  new XMLHttpRequest();
                //xmlhttp.open("GET","https://www.cognalys.com/api/v1/otp/?app_id=05b84dbe7ff546d6a913c63&access_token=cd4b3b1d2bfada9571ac6a03acae09b83c232690&mobile=+91"+a,true);
                xmlhttp.open("GET","TRY.php?id="+a,true);
                xmlhttp.onreadystatechange = function()
                {
                if(xmlhttp.readyState==4 && xmlhttp.status==200)
                    {
                        var response = xmlhttp.responseText;
                        jsonResponse = JSON.parse(response); alert(jsonResponse);
                        //var otp = jsonResponse.otp;alert(otp);
                        var box = "Enter OTP : <input type='text' name='box1' id='box1' style='-moz-appearance: textfield' />";
                        //document.getElementById("div1").innerHTML=response;
                        document.getElementById("div1").innerHTML=box;
                        document.getElementById("div2").innerHTML="<input type='Submit' value='Confirm' onclick='Confirm();' id='no' />";
                    }
                }
                xmlhttp.send();
            }

            function Confirm()
            {
                var b = document.getElementById("box1").value;alert(b);
                if(jsonResponse==b)
                    {
                        alert("Mobile_Number_Verfied");
                    }
                    else
                        {
                            alert("Enter_Correct_Otp");
                        }
            }
            </script>
    <body>
        <?php
        // put your code here
        ?>
        <center>
        <br/>
        <br/>
            <table align="center" border="2">
                <tr align="center">
                    <th colspan="2">Mobile No. Verification</th>
                </tr>
                <tr></tr>
                <tr align="center">
                    <td>Mobile No. :</td>
                    <td><input type="number" name="no" id="no" style="-moz-appearance: textfield"/></td>
                </tr>
                <tr></tr>
                <tr align="center">
                    <td colspan="2"><input type="button" onclick="verify()" value="Verify"></td>
                </tr>
            </table>
            <div id="div1" style="background-color:red;">

            </div>
            <div id="div2" style="background-color:red;">

            </div>
        </center>
    </body>
</html>
