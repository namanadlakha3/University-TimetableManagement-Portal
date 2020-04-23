<?php 
include('security2.php');
                $username=$_SESSION['username'];
                $connection= mysqli_connect('localhost','root','');
                $db=mysqli_select_db($connection,'minor');
                if(!$connection)
                {
                     echo "Connection error";
                }
                $query="select * from faculty where username='$username'";
                $query_run = mysqli_query($connection,$query);
    
                while($row = mysqli_fetch_assoc($query_run))
                {
					$token=$row['Token'];
                   $name=$row["Name"];
					$phone=$row["Contact"];
					$email=$row["Email"];
                    $designation=$row["Designation"];
                    $img=$row["Img"];
                    $imageURL = 'admin/uploads/'.$img; 
                }
                $connection= mysqli_connect('localhost','root','');
                $db=mysqli_select_db($connection,'faculty');
                $tid=$_SESSION['username'];
               
                $del="delete from timetable where flag=0 and tid='$tid'";
                $d = mysqli_query($connection,$del);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Faculty Login</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/faculty_style.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>

<body style="overflow-x:hidden;">
    <!--Top navbar start-->
    <nav class="navbar navbar-expand-md navbar-dark navbar-default">
        <ul class="navbar-nav mr-auto" id="navbar-li">
                        
            <li class="nav-item">
               
					  	<?php 
			if(!isset($_SESSION['f']))
               echo '<p data-toggle="modal" data-target="#myModal" style="cursor: pointer; color:rgb(1, 50, 97);"><a style="cursor: pointer; color:rgb(1, 50, 97);"> Verify</a></p>

                <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                  <div class="modal-dialog">
                  
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        
                        <h4 class="modal-title text-center">Verification</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body">
                          <form method="post" action="faculty.php">
                            <label style="color: black;"> Enter Tocken Number:</label>
                            <input type="text"  name="token" id="token"/>
							<input type="submit" name="submit" >
                          </form>
                           <p id="clockdiv" style="color: black;  position:fixed; bottom:20px; left:15px; margin:0px; font-size: 15px;"></p>
                       
                      </div>
                      <div class="modal-footer">
                     <!--  <button type="button" id="okay" onClick="window.location.reload(true);" class="btn btn-default" data-dismiss="modal">Okay</button> -->
                      </div>
                    </div>
                    
                  </div>
                </div>
            </li>
            <li class="nav-item">
              <p style="color: rgb(1, 50, 97); cursor:pointer;">';
			  if(isset($_SESSION['f']))
				echo '
                <p style="color: rgb(1, 50, 97); cursor:pointer;"><a data-toggle="modal" href="faculty.php" data-target="#Modal" style="cursor: pointer; color:rgb(1, 50, 97);">Verify</a>

                <!-- Modal -->
                <div class="modal fade" id="Modal" role="dialog">
                  <div class="modal-dialog">
                  
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        
                        <h4 class="modal-title text-center">Verification</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body">
                            <label style="color: black;"> Already Verified</label>
                          
                      </div>
                    </div>
                    
                  </div>
                </div>
				
           ';
			?>
			<?php  
			  
			  if(isset($_POST['submit']))
			  {
				

	$verify=$_POST['token'];

			  if($verify==$token) {  $flag=1;
			  $_SESSION['f']=$flag;
			  header('Location: faculty.php');
			 }
			 else
				 echo '<script type="text/javascript">
			  alert("Token is incorrect");
			  </script>
			 ';
		 
			  }
			  if(isset($_SESSION['f']))
			  {
	echo ' <li class="nav-item">
    <p style="color: rgb(1, 50, 97); cursor:pointer;"><a href="tt.php"  id="timeTable" style="font-weight: normal; padding-top:55px; padding-left:10px; cursor: pointer; color:rgb(1, 50, 97);">Set Time-Table</a></p></li>';
	  
			  }
    else
		 echo ' <li class="nav-item">
         <p style="color: rgb(1, 50, 97); cursor:pointer;"><a href=""  id="timeTable" style="font-weight: normal; padding-top:55px; padding-left:10px; cursor: pointer; color:rgb(1, 50, 97);">Set Time-Table</a></p></li>';
		

			  
			  
			  ?>
           
            </li>
        </ul>
    
            <ul class="navbar-nav ml-auto">
               
                <li class="nav-item">
                    <a class="nav-link" href="#"><img src="img/upes-logo.png" height="45px" href=faculty.php></a>
                </li>
            </ul>
      
    </nav>
    <!--Top navbar end-->

   
    <div class="row">

         <!--Sidebar start-->
        <nav id="sidebar">
            <div class="sidebar-header text-center">
                <p style="color: rgb(146, 145, 145);">Faculty Information</p>
                <br>
                <img src="<?php echo $imageURL; ?>" alt="Faculty-img" style="height: 130px;" >
            </div>
    
            <ul class="list-unstyled components text-center ">
                <p class="font-weight-bold" ><br>
				<?php echo $name; ?><span class="font-weight-normal"><br>(<?php echo $designation; ?>)</span></p>
                
                <li>
                    <p style="font-size: 15px;">Email Address: <?php echo $email; ?></p>
                </li>
                <li>
                    <p style="font-size: 15px; margin-top: -28px;">Contact No: <?php echo $phone; ?></p>
                
                
            </ul>
            <ul class="list-unstyled components text-center ">
                <li>
                    <div class="text-center";><a href="#" style="font-size: 15px;">Change Password</a></div>
                </li>
                <li>
                    <div class="text-center"><a href="logout.php" style="font-size: 15px;" >Logout</a></div>
                </li>
            </ul>
        </nav>
        <!--Sidebar end-->
        
        <!--Main Content start-->
        <div class="col">
           
        </div>
        <!-- Main Content end-->
    </div>
    

    <script>
        // 10 minutes from now
     var time_in_minutes = 1;
     var current_time = Date.parse(new Date());
     var deadline = new Date(current_time + time_in_minutes*60*1000);
     function time_remaining(endtime){
         var t = Date.parse(endtime) - Date.parse(new Date());
         var seconds = Math.floor( (t/1000) % 60 );
         var minutes = Math.floor( (t/1000/60) % 60 );
         var hours = Math.floor( (t/(1000*60*60)) % 24 );
         var days = Math.floor( t/(1000*60*60*24) );
         return {'total':t, 'days':days, 'hours':hours, 'minutes':minutes, 'seconds':seconds};
     }
     function run_clock(id,endtime){
         var clock = document.getElementById(id);
         function update_clock()
         {
             var t = time_remaining(endtime);
             clock.innerHTML =t.minutes+'m '+t.seconds+'s';
             if(t.total<=0)
             {
                  clearInterval(timeinterval); 
             }
             alertCountdown(t.minutes, t.seconds);
     
         }
         update_clock(); // run function once at first to avoid delay
         var timeinterval = setInterval(update_clock,1000);
        
     }
     run_clock('clockdiv',deadline);
     
     function alertCountdown(timerMinutes, timerSeconds)
     {
         if(timerMinutes===0 && timerSeconds===0)
         {
             alert('Timer Expired');
			 window.location.replace("logout.php");
             document.getElementById("okay").disabled=true;
         }
     }
     
     
     </script>
     <script>
       var lnk = document.getElementById('timeTable');
     
         if (window.addEventListener) {
             document.addEventListener('click', function (e) {
                 if (e.target.id === lnk.id) {
                     //e.preventDefault();         // Comment this line to enable the link tag again.
                 }
             });
         }
     </script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

</body>

</html>
