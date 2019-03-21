<?php
$id = substr($_GET["ab"],35);
//echo "<script>alert($id)</script>";
$con = mysqli_connect("localhost","root","root","Falcon_Music_Final");
if(!$con)
{
    echo "Database Connection Error..!!";
}
else
{
            $c = mysqli_query($con,"Select Counter from Songs where Song_Url='$id'");
            print_r($c);
            while($row=mysqli_fetch_array($c))
            {
                $i = $row['Counter'];
                $n = $i + 1;
                mysqli_query($con,"update Songs set Counter='$n' where Song_Url='$id'");
                print_r("update Songs set Counter='$n' where Song_Url='$id'");
                echo $n;
            }

}
?>
