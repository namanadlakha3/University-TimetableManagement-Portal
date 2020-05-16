<?php
session_start();
$tid=$_SESSION['username'];

        $connection= mysqli_connect('localhost','root','');
        $db=mysqli_select_db($connection,'minor');

        $new=1;
		  $final="select * from faculty where username='$tid'";
		  $q=mysqli_query($connection,$final);
		    while($row = mysqli_fetch_assoc($q))
		 {
			 $c1=$row["c1"];
			 $c2=$row["c2"];
		 }
		 if($c1==0&&$c2==0)
		 {
			 $_SESSION['tt']="Please fill all your slots";
			 
			  
		 
			 
        $final="update faculty set status='$new' where username='$tid'";
        if(mysqli_query($connection,$final))
          { echo "Timetabe updated";
       
  
          }
          else
          echo 'cant';
		 }
		 else
			  $_SESSION['tt']="Please fill all your slots";
		       header('Location:tt.php');
    ?>