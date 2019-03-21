<?php
include 'db_connect.php';
//if(!(isset($_SESSION['mob'])))
//{
//    header("Location: /final/falcon_music/home.php");
//}

$url = substr($_POST["url"],19);
                  
$plylst_nm = $_POST["LstNme"];
//            include 'db_connect.php';

$sltqry = mysqli_query($con, "SELECT * FROM $mob$desh$plylst_nm WHERE url = '$url'");
//print_r(mysqli_error($con));
echo mysqli_error($con);
$row = mysqli_fetch_array($sltqry);
$sngUrl = $row['url'];
//            echo $url;

if($url == $sngUrl)
{
    echo " &#9824; Already Exists &#9688; ";
}

else
{
    $res = mysqli_query($con, "SELECT * FROM songs WHERE Song_Url = '$url'");//print_r($res);
    //print_r("'SELECT * FROM songs WHERE Song_Url = '$url2'");
    $row = mysqli_fetch_array($res);
    $sngNme = $row['Song_Name'];
    $sngAlbum = $row['Song_Album'];
    //echo $sngAlbum;

    $sql = "INSERT INTO $mob$desh$plylst_nm(sng_name, sng_album, url) VALUES ('$sngNme','$sngAlbum','$url')";  // do chnge for URL

    if (!mysqli_query($con,$sql))
    {
        echo ( 'Error..... : ' . mysqli_error($con));
    }

    else
    {
        echo " &#9824; Added &#9688; ";
    }
}
?>

