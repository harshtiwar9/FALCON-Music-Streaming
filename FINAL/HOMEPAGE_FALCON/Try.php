<?php
$mn = $_GET['mn'];
$con = mysqli_connect("localhost","root","root","Falcon_Music_Final");
if(!$con)
{
    echo "Database Connection Error..!!";
}
else
{
    if(!mysqli_query($con,"Select Album_Art from music_info"))
        {
            $c = "Data Not Found..!!";
        }
        else
        {
            $c = mysqli_query($con,"SELECT * FROM `music_info` WHERE Album_Name='$mn'");
            while($row=mysqli_fetch_array($c))
            {
                $n = $row["Url"];
                echo $n."<br/>";
            }

        }
}
?>
