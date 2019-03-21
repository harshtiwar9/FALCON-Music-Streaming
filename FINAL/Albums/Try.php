<?php
$mn = $_GET['mn'];
$con = mysqli_connect("localhost","root","root","Falcon_Music_Final");
if(!$con)
{
    echo "Database Connection Error..!!";
}
else
{
            $c = mysqli_query($con,"SELECT * FROM songs WHERE Song_Album='$mn'");
            while($row=mysqli_fetch_array($c))
            {
                  $n = $row["Song_Url"];
                  $id = $row["Song_Id"];
                  echo $n."<br/>";
            }
}
?>
