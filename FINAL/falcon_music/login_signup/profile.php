<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>

        <link rel="stylesheet" href="/final/falcon_music/extra/css/bootstrap.min.css">
        <script src="/final/falcon_music/extra/jquery/jquery-1.11.3.min.js"></script>
        <script src="/final/falcon_music/extra/js/bootstrap.js"></script>

    </head>
    <body>
        <?php
        // put your code here
            session_start();
        ?>
        <form action="/FINAL/falcon_music/login_signup/profileUpdate.php" method="POST">
        

            <br> <br> <br>
            Mobile No : <input type="tel" name="mob" id="txtMob" value="<?php echo $_SESSION['mob'] ?>" readonly placeholder="eg. +00-000-00-000" pattern="[0-9]{10}" maxlength="10" title="10 numbers"/> <br>
            Profile Pic : <input type="file" id="propic" name="propic" readonly> <br>
            Enter First Name : <input type="text" id="fnm" name="fnm" readonly required/>  <br>
            Enter Last Name : <input type="text" name="lstnm" id="lstnm" readonly required/> <br>
            Choose Gender : <br>
             Male : <input type="radio" id="male" name="gender" readonly value="male" required/>  &nbsp;&nbsp;&nbsp; Female : <input type="radio" id="female" name="gender" readonly value="female" required/> <br>
            Password : <input type="password" name="txtpassword" id="txtpassword" readonly name="pwd" placeholder="eg. X8df!90EO" maxlength="20" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,20}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 5 or more characters" />   <br><br>
            <input type="button" onclick="edit()" value="edit"> &nbsp;&nbsp; <input type="submit" name="submit" value="Submit" />
            
        </form>

            <script>
                function edit()
                {
//                    alert("dfd");
                    document.getElementById("propic").readOnly=false;
                    document.getElementById("fnm").readOnly=false;
                    document.getElementById("lstnm").readOnly=false;
                    document.getElementById("txtpassword").readOnly=false;
                    document.getElementById("fnm").readOnly=false;
                }
            </script>
    </body>

</html>
