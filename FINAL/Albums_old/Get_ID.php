<?php
$id = $_POST["ab"];print_r($id);
$con = mysqli_connect("localhost","root","root","Falcon_Music_Final");
if(!$con)
{
    echo "Database Connection Error..!!";
}
else
{   $i="";
            $c = mysqli_query($con,"Select Song_Id from Songs where Song_Url='$id'");
            while($row=mysqli_fetch_array($c))
            {
                $i = $row['Song_Id'];
            }
            echo $i;
}
?>
