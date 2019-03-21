<?php
$accessToken = '2a99a973738a4c12833de1ad06079fda7a2eb014';
$appID = '05b84dbe7ff546d6a913c63';
$otp = $_GET['id'];
$keymatch = $_GET['k'];

// First Step ( Request missed call )
$request = "https://www.cognalys.com/api/v1/otp/confirm/?app_id=$appID&access_token=$accessToken&keymatch=$keymatch&otp=".$otp;


// From here you process the json data
$json = file_get_contents($request);
echo $json;
?>
