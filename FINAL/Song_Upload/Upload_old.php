<?php
if(!isset($_REQUEST["submit"]))
{
    echo "File Not Found..!!!";
}
else
{
            $name = $_FILES["file"]["name"];
            $size = $_FILES['file']['size'];
            $type = $_FILES['file']['type'];
            $songName = $_REQUEST['songTitle'];
            $sa = $_REQUEST['songArtist'];
            $songartist = str_replace(" , ","",$sa);

            //print_r($_FILES);

            //echo round($filename/1024,2)."Kb";
            //echo round($filename/1048576,2)."Mb";
//            $arr = explode("[", $name);
//            $fn = $arr[0];
            //$siz = round($size/1048576,2)."Mb";
            $ap = $_REQUEST["path"];
            $path= $_REQUEST["path"]."/";
            $albumName = $ap;
            $fn = str_replace("- DJMaza.Cool","",$songName);

            $tmp_name = $_FILES['file']['tmp_name'];
            $error = $_FILES['file']['error'];
            if(!($type=="audio/mpeg" || $type=="audio/mp3"))
            {
                echo "Select Audio File..!!!";
            }
            else
            {
            if($size==0)
            {
                echo "Please Select File To Upload...!!!!";
            }
                    else
                    {
                    if (isset($name))
                    {
                        if (file_exists("uploads/$path". $_FILES["file"]["name"]))
                        {
                             echo $_FILES["file"]["name"] . " already exists. ";
                             header("refresh:2; url='index.php'");
                        }
                        else
                        {
                            echo "<html><script>alert('uploads/$path')</script></html>";
                            $ret = is_dir("uploads/$path");
                            echo "<html><script>alert('$ret')</script></html>";
                            if( is_dir("uploads/$path") === false )
                            {
                                echo "<html><script>alert('Make dir!!')</script></html>";
                                mkdir("uploads/$path");
                                $location = 'uploads/'.$path;
                                $con=mysqli_connect("localhost","root","root","Falcon_Music_Final");
                                        $url=$location.$name;
                                        $albumart = $location."$ap.jpg";
                                        $son = gettimeofday();
                                        $songid = $son['sec'] ;
                                        //print_r($songId);
                                        $sql ="Insert into Songs (Song_Id,Song_Name,Song_Album,Song_Artist,Album_Art,Song_Url) Values ($songid,'$fn','$albumName','$songartist','$albumart','$url')";
                                            if(!mysqli_query($con,$sql))
                                            {
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
                                $location = 'uploads/'.$path;
                                    $con=mysqli_connect("localhost","root","root","Falcon_Music_Final");
                                    if(!$con)
                                    {
                                        echo"Connection Cant be establish...!!!";
                                    }
                                    else
                                    {
                                        if (file_exists("uploads/$path".$_FILES["file"]["name"]))
                                        {
                                              echo $_FILES["file"]["name"] . " already exists. ";
                                        }
                                        else
                                        {
                                        $url=$location.$name;
                                        $albumart = $location."$ap.jpg";
                                        $son = gettimeofday();
                                        $songid = $son['sec'];
                                        print_r($songId);
                                        $sql ="Insert into Songs (Song_Id,Song_Name,Song_Album,Song_Artist,Album_Art,Song_Url) Values ($songid,'$fn','$albumName','$songartist','$albumart','$url')";
                                            if(!mysqli_query($con,$sql))
                                            {
                                                echo "<script>alert('Data Not Entered!!')</script>";
                                            }
                                            else
                                            {
                                                echo "<script>alert('Data Entered Successful!!')</script>";
                                                header("refresh:0; url='index.php'");
                                            }
                                        }
                                    }
                            }
                        }
                    }
                     else
                     {
                              echo 'please choose a file';
                     }
                }
            }
}
?>
