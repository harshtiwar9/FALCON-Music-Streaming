<?php

$unm = $_POST['unm'];

$con = mysqli_connect("localhost","root","","temp");
if(!$con)
{
  echo 'Not Connected';
}
else
{


$res = mysqli_query($con,"select * from user_info where user_name='$unm'");
$row = mysqli_fetch_array($res);
    if($row['user_name']==$unm)
{
    $pwd=$row['password'];
    
    echo "$unm password is $pwd";
    
}
else
{
    echo "username not found";
}
}

?>

