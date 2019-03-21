<?php
$con = mysqli_connect("localhost","root","root","Falcon_Music_Final");
if(!$con)
{
    echo "Database Connection Error..!!";
}
else
{
            $c = mysqli_query($con,"Select * from songs");
            while($row=mysqli_fetch_array($c))
            {
                 echo $row['Album_Art']."<br/>";
            }

}

?>