<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
    <script type="text/javascript">
            var jsonResponse = "";
            
            function verify()
            {
                var a = document.getElementById("no").value;
                //alert(a);
                var xmlhttp =  new XMLHttpRequest();
                //xmlhttp.open("GET","https://www.cognalys.com/api/v1/otp/?app_id=05b84dbe7ff546d6a913c63&access_token=cd4b3b1d2bfada9571ac6a03acae09b83c232690&mobile=+91"+a,true);
                xmlhttp.open("GET","TRY.php?id="+a,true);
                xmlhttp.onreadystatechange = function()
                {
                if(xmlhttp.readyState==4 && xmlhttp.status==200)
                    {
                        var response = xmlhttp.responseText;
                        jsonResponse = JSON.parse(response);
                        alert(jsonResponse.otp_start);
                        var j = jsonResponse.otp_start;//alert(j);
                        //var key = jsonResponse.keymatch;
                        var box = "Enter Last 5 Digit of No. : <input type='text' name='box1' id='box1' style='-moz-appearance: textfield' />";
                        document.getElementById("div1").innerHTML=response;
                        document.getElementById("div2").innerHTML=box;
                        document.getElementById("box1").value=jsonResponse.otp_start;
                        document.getElementById("div3").innerHTML="<input type='Submit' value='Confirm' id='cnf' onclick='confirm()' >";
                    }
                }
                xmlhttp.send();
            }

            function confirm()
            {
                var js = jsonResponse.keymatch;alert(js+"01");
                var b = document.getElementById("box1").value;
                alert(b+"123");
                var xmlhttp =  new XMLHttpRequest();
                xmlhttp.open("GET","EXM.php?id="+b+"&k="+jsonResponse.keymatch,true);
                xmlhttp.onreadystatechange = function()
                {
                if(xmlhttp.readyState==4 && xmlhttp.status==200)
                    {
                        var response = xmlhttp.responseText;//alert(response);
                        var jsonResponse = JSON.parse(response);
                        //alert(jsonResponse.status);
                        if(jsonResponse.status="success")
                            {
                                sending();
                            }
                            else
                                {
                                    alert("Bye");
                                }
                    }
                }
                xmlhttp.send();
            }

            function sending()
            {
                var pp = '<?php echo $_GET['propic']; ?>';
                var fnm = '<?php echo $_GET['fnm']; ?>';
                var lnm = '<?php echo $_GET['lnm']; ?>';
                var gen = '<?php echo $_GET['gen']; ?>';
                var mob = '<?php echo $_GET['mob']; ?>';
                var pwd = '<?php echo $_GET['pwd']; ?>';
                var xmlhttp =  new XMLHttpRequest();
                xmlhttp.open("GET","registration.php?pp="+pp+"&fnm="+fnm+"&lnm="+lnm+"&gen="+gen+"&mob="+mob+"&pwd="+pwd,true);
                        alert("Hi");
                        alert("registration.php?pp="+pp+"&fnm="+fnm+"&lnm="+lnm+"&gen="+gen+"&mob="+mob+"&pwd="+pwd);
                        location.href='registration.php?pp='+pp+'&fnm='+fnm+'&lnm='+lnm+'&gen='+gen+'&mob='+mob+'&pwd='+pwd;
                        xmlhttp.send();
            }
        </script>
        <?php
        // put your code here
        ?>
        <center>
            <input type="text" id="no" value="<?php echo $_GET['mob']; ?>" name="no">
            <input type="submit" onclick="verify();" value="Verify" />
            <div id="div1" style="background-color:red;">

            </div>
            <div id="div2" style="background-color:Green;">

            </div>
            <div id="div3"style="background-color:yellow;">

            </div>
            <div id="div4"style="background-color:blue;">

            </div>
            <div id="div4"style="background-color:brown;">

            </div>
        </center>
    </body>
</html>
