<?php
$con = mysqli_connect("localhost","root","root","Falcon_Music_Final");
                //$path = $_GET['path'];
                $songName = $_GET['songTitle'];
                $name = $_GET['songName'];
                $sa = $_GET['songArtist'];
                $ap = $_GET["path"];
                $path= $_GET["path"]."/";
                $albumName = $ap;
                $songartist = str_replace(" , ","",$sa);
                $fn = str_replace("- DJMaza.Info","",$songName);
                //echo "<script>alert('$path')</script>";
                    if( is_dir("uploads/$path") === false )
                            {
                                echo "<html><script>alert('Make dir!!')</script></html>";
                                mkdir("uploads/$path");

                                $location = 'uploads/'.$path;
                                        $url=$location.$name;
                                        $albumart = $location."$ap.jpg";
                                        $son = gettimeofday();
                                        $songid = $son['sec'] ;
                                        echo "<script>alert($url)</script>";
                                        $qry = mysqli_query($con,"select Song_Url from songs where Song_Url='$url'");
                                        echo "<script>alert('select Song_Url from songs where Song_Url='$url'')</script>";
                                        print_r(mysqli_num_rows($qry));
                                        if(mysqli_num_rows($qry) == 0)
                                        {
                                        //print_r($songId);
                                        $sql ="Insert into songs (Song_Id,Song_Name,Song_Album,Song_Artist,Album_Art,Song_Url) Values ($songid,'$fn','$albumName','$songartist','$albumart','$url')";
                                            if(!mysqli_query($con,$sql))
                                            {
                                                die(mysqli_error($con));
                                                echo "<script>alert('Data Not Entered!!')</script>";
                                            }
                                            else
                                            {
                                                echo "<script>alert('Data Entered Successful!!')</script>";
                                                header("refresh:0; url='index.php'");
                                            }
                                        }
                                        else
                                        {
                                            echo "<script>alert('$songName Already Existed !!')</script>";
                                        }
                            }
                            else
                            {
                                $location = 'uploads/'.$path;
                                    if(!$con)
                                    {
                                        echo"Connection Cant be establish...!!!";
                                    }
                                    else
                                    {
                                        $url=$location.$name;
                                        echo "<script>alert($url)</script>";
                                        $qry = mysqli_query($con,"select Song_Url from songs where Song_Url='$url'");
                                        echo "<script>alert('select Song_Url from songs where Song_Url='$url'')</script>";
                                        if(mysqli_num_rows($qry) == 0)
                                        {
                                            $albumart = $location."$ap.jpg";
                                            $son = gettimeofday();
                                            $songid = $son['sec'];
                                            $sql ="Insert into songs (Song_Id,Song_Name,Song_Album,Song_Artist,Album_Art,Song_Url) Values ($songid,'$fn','$albumName','$songartist','$albumart','$url')";
                                            if(!mysqli_query($con,$sql))
                                            {
                                                die(mysqli_error($con));
                                                echo "<script>alert('Data Not Entered!!')</script>";
                                            }
                                            else
                                            {
                                                echo "<script>alert('Data Entered Successful!!')</script>";
                                                header("refresh:0; url='index.php'");
                                            }
                                        }
                                        else
                                        {
                                            echo $name . " already exists. ";
                                        }
                                    }
                            }
                ?>
	