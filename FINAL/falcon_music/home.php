<?php
session_start();

//print_r($_SESSION);
    if(isset ($_SESSION['mob']))
    {
        $login = "true";
        echo "<div align='right'> <a href='login_signup/signOut_logic.php' align='right' class='btn btn-danger btn-sm'> Log Out </a> </div>";
        echo "<h4> <center> Hello... <b style='text-transform:capitalize'>" .$_SESSION['unme_first']."&nbsp;".$_SESSION['unme_last']. "</b> </center> </h4>";
    }
    
    elseif(isset ($_SESSION['pg']))
    {
        echo "<script> alert('Please Login...'); </script>";
        $login = "false";
        echo "<div align='right'> <a href='login_signup/login_signup.html' class='btn btn-link btn-lg' data-toggle='modal' data-target='#result'> Login/Sign Up </a> </div>";
        unset ($_SESSION['pg']);
    }

    else
//    else if(!isset ($_SESSION['mob']))
    {
        $login = "false";
        echo "<div align='right'> <a href='login_signup/login_signup.html' class='btn btn-link btn-lg' data-toggle='modal' data-target='#result'> Login/Sign Up </a> </div>";
    }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html class="no-js">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title> ☻ HOME ☺ </title>
        <link rel="stylesheet" href="extra/css/bootstrap.min.css">
        <script src="extra/jquery/jquery-1.11.3.min.js"></script>
        <script src="extra/js/bootstrap.js"></script>

        <style>
            /* .modal-transparent */
                        .modal-transparent {
              background: transparent;
            }
            .modal-transparent .modal-content {
              background: transparent;
            }
            .modal-backdrop.modal-backdrop-transparent {
              background: #ffffff;
            }
            .modal-backdrop.modal-backdrop-transparent.in {
              opacity: .9;
              filter: alpha(opacity=90);
            }

            /* .modal-fullscreen */

            .modal-fullscreen {
              background: transparent;
            }
            .modal-fullscreen .modal-content {
              background: transparent;
              border: 0;
              -webkit-box-shadow: none;
              box-shadow: none;
            }
            .modal-backdrop.modal-backdrop-fullscreen {
              background: #ffffff;
            }
            .modal-backdrop.modal-backdrop-fullscreen.in {
              opacity: .97;
              filter: alpha(opacity=97);
            }

            /* proPic */
            .no-js .inputfile + label {
                display: none;
            }
            
        </style>
    </head>
    <body>

        <div class="modal modal-transparent modal-fullscreen fade" role="dialog" id="result" >
            <div class="modal-dialog modal-md">
                <div class="modal-content ">
            <!--        <div class="modal-header bg-primary">
                       <abbr><h3 class="modal-title text-center"> Alert </h3></abbr>
                    </div>

                    <div class="modal-body bg-danger">
                        <h4><b> <p id="result_txt"/> </b></h4>
                    </div>  -->
                </div> 
            </div>
        </div>
        
  <br> <br>
    <button id="playlist" class="btn btn-primary" onclick="location.href='/falcon_music/playlist/plyList.php'"> Playlist </button>

        <center>
            <br> <br> <br>
            <table>

                <tr>
                    <td> Song 1..  </td> <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>  <td> <input type="submit" id="Song 1" onclick="selectlist(this)" value="Add to Playlist"/> </td>
                </tr>
                
                <tr>
                    <td> Song 2..  </td> <td> </td>  <td> <input type="submit" id="Song 2" onclick="selectlist(this)" value="Add to Playlist"/> </td> <td> <a id="song 2" class="btn" onclick="dwnlod(this)" download> download </a> </td>
                </tr>

                <tr>
                    <td> Song 3..  </td> <td> </td>  <td> <input type="submit" id="Song 3" oncl.� 0� 2� 4� 6� 8� :� <� >� @� B� D� F� H� J� L� N� P� R� T� V� X� Z� \� ^� `� b� d� f� h� j� l� n� p� r� t� v� x� z� |� ~� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� ® Į Ʈ Ȯ ʮ ̮ ή Ю Ү Ԯ ֮ خ ڮ ܮ ޮ � � � � � � � � � � �� �� �� �� �� ��  � � � � � 
� � � � � � � � � � �  � "� $� &� (� *� ,� .� 0� 2� 4� 6� 8� :� <� >� @� B� D� F� H� J� L� N� P� R� T� V� X� Z� \� ^� `� b� d� f� h� j� l� n� p� r� t� v� x� z� |� ~� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� ¯ į Ư ȯ ʯ ̯ ί Я ү ԯ ֯ د گ ܯ ޯ � � � � � � � � � � �� �� �� �� �� ��  � � � � � 
� � � � � � � � � � �  � "� $� &� (� *� ,� .� 0� 2� 4� 6� 8� :� <� >� @� B� D� F� H� J� L� N� P� R� T� V� X� Z� \� ^� `� b� d� f� h� j� l� n� p� r� t� v� x� z� |� ~� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� ° İ ư Ȱ ʰ ̰ ΰ а Ұ ԰ ְ ذ ڰ ܰ ް � � � � � � � � � � �� �� �� �� �� ��  � � � � � 
� � � � � � � � � � �  � "� $� &� (� *� ,� .� 0� 2� 4� 6� 8� :� <� >� @� B� D� F� H� J� L� N� P� R� T� V� X� Z� \� ^� `� b� d� f� h� j� l� n� p� r� t� 