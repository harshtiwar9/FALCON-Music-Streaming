<?php
$con = mysqli_connect("localhost","root","root","Falcon_Music_Final");
if(!$con)
{
    echo "Database Connection Error..!!";
}
else
{
    if(!mysqli_query($con,"Select Album_Art from Songs"))
        {
            $c = "Data Not Found..!!";
        }
        else
        {
            $c = mysqli_query($con,"Select * from Songs");
            while($row=mysqli_fetch_array($c))
            {
                $n = $row["Album_Art"];
                echo $n."<br/>";
            }

        }
}

?>
