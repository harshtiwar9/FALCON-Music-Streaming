<?php
$con = mysqli_connect("localhost","root","root","Falcon_Music_Final");
                if(!$con)
                {
                    echo "Connection Not Establish..!!";
                }
                else
                {
                        $qry = mysqli_query($con,"SELECT song_url from songs ORDER BY counter DESC");
                        for($i=1;$i<11;$i++)
                        {
                            while($row = mysqli_fetch_array($qry))
                            {
                                echo $row['song_url']."<br/>";
                                break;
                            }
                        }
                }
?>
			