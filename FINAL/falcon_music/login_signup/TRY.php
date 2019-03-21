<?php
$accessToken = '2a99a973738a4c12833de1ad06079fda7a2eb014';
$appID = '05b84dbe7ff546d6a913c63';
$mobilePhoneNumber = $_GET['id'];

// First Step ( Request missed call )
$request = "https://www.cognalys.com/api/v1/otp/?access_token=".$accessToken."&app_id=".$appID."&mobile=+91".$mobilePhoneNumber;

// From here you process the json data
$json = file_get_contents($request);
//$obj = json_decode($json);
//echo $obj->status;
//echo $obj->keymatch;
//echo $obj->mobile;
//echo $obj->otp_start;
echo $json;
?>
