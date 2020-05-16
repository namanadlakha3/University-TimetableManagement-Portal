<?php
session_start();
$tid=$_SESSION['username'];

        $connection= mysqli_connect('localhost','root','');
        $db=mysqli_select_db($connection,'faculty');

        $new=4;
        $final="delete from timetable where tid='$tid'";
        if(mysqli_query($connection,$final))
          { echo "Timetabe Deleted";
          }
		  $connection= mysqli_connect('localhost','root','');
        $db=mysqli_select_db($connection,'minor');
		$final="update faculty set c1='$new' where username='$tid'";
        if(mysqli_query($connection,$final))
			echo "S1";
		$final="select Subject2 from faculty where username='$tid'";
        $q=mysqli_query($connection,$final);
         while($row = mysqli_fetch_assoc($q))
		 {
			 $tem=$row["Subject2"];
		 }
		 if($tem!="")
			 $final="update faculty set c2='$new' where username='$tid'";
		 $q=mysqli_query($connection,$final);
		  header('Location:tt.php');
	      
    ?>