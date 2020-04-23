<?php
session_start();
$tid=$_SESSION['username'];

        $connection= mysqli_connect('localhost','root','');
        $db=mysqli_select_db($connection,'faculty');
$u=$_SESSION['username'];
        $new=1;
        $final="update timetable set flag=1 where tid='$tid'";
        if(mysqli_query($connection,$final))
          { echo "Timetabe updated";
       
        header('Location:tt.php');
          }
          else
          echo 'cant';
    
    ?>