<?php
include('security2.php');
$_SESSION['f']=1;
$_SESSION['tt']="";

$tid=$_SESSION['username'];
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
					$name=$row["Name"];
					$phone=$row["Contact"];
					$email=$row["Email"];
          $designation=$row["Designation"];
          $img=$row["Img"];
          $imageURL = 'admin/uploads/'.$img; 
                    
                }

	
                $connection= mysqli_connect('localhost','root','');
                $db=mysqli_select_db($connection,'faculty');
               
              

if(isset($_POST['submit']))
{
    $day= $_POST['day'];
    $time=$_POST['time'];
    $room=$_POST['room'];
	$subject=$_POST['subject'];
	
	$flag=0;
	
    $query="select * from timetable where day='$day' AND time='$time' AND room='$room'";
                $query_run = mysqli_query($connection,$query);
    
   
                $quer="select * from timetable where day='$day' AND time='$time' AND tid='$tid'";
                $query_r = mysqli_query($connection,$quer);
                
     if(mysqli_fetch_array($query_run))
    {
       $_SESSION['tt']="The room is already booked for this time";
	  // header('Location:tt.php');
    }
    
    else if(mysqli_fetch_array($query_r))
    {
$update="update timetable set subject='$subject', room='$room' where tid='$tid' and day='$day' and time='$time' and flag=0";
if(mysqli_query($connection,$update))
$_SESSION['tt']="Timetabe updated";
else
$_SESSION['tt']="Database error";

}
    
    else
    {
		$insert="insert into timetable (day,time,subject,room,tid,flag) values ('$day','$time','$subject','$room','$tid',$flag)";
       if(mysqli_query($connection,$insert))
		   $_SESSION['tt']="Timetabe updated";
	   else
		  $_SESSION['tt']="Database error";
	  
    }
    
  

}

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
    <link rel="stylesheet" href="css/tt_style.css">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark navbar-default">
        <ul class="navbar-nav mr-auto" id="navbar-li">
                        
            <li class="nav-item">
                <p data-toggle="modal" data-target="#myModal" style="cursor: pointer; color:rgb(1, 50, 97);">Verify</p>

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
                        
                            <label style="color: black;"> Already Verified</label>
                          
                      </div>
                    </div>
                    
                  </div>
                </div>
            </li>
            <li class="nav-item">
              <p style="color: rgb(1, 50, 97); cursor:pointer;"><a href="tt.php" id="timeTable" style="font-weight: normal; padding-top:55px; padding-left:10px; cursor: pointer; color:rgb(1, 50, 97);">Set Time-Table</a></p>
            </li>
        </ul>
    
            <ul class="navbar-nav ml-auto">
               
                <li class="nav-item">
                    <a class="nav-link" href="faculty.php"><img src="img/upes-logo.png" height="45px"></a>
                </li>
            </ul>
      
    </nav>
    <div class="row">
        <nav id="sidebar">
            <div class="sidebar-header text-center">
                <p style="color: rgb(146, 145, 145);">Faculty Information</p>
                <br><br>
                <img src="<?php echo $imageURL; ?>" alt="Faculty-img" style="height: 130px;" >
            </div>
    
            <ul class="list-unstyled components text-center ">
                <p class="font-weight-bold" ><br><?php echo $name; ?><span class="font-weight-normal">(<?php echo $designation; ?>)</span></p>
                
                <li>
                    <p style="font-size: 15px;">Email Address: <?php echo $email; ?></p>
                </li>
                <li>
                    <p style="font-size: 15px; margin-top: -28px;">Contact No: <?php echo $phone; ?></p>
                </li>
                
                
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
        
        <div class="col md-6 lg-6">
            
                <div class="container-table100" >
                    <div class="wrap-table100">
                        <div class="table100 table-bordered ver1 m-b-110" style="margin-left:20px; border-radius:4px;">
                            <table data-vertable="ver1" >
                                <thead>
                                    <tr class="row100 head">
                                        <th class="column100 column1" data-column="column1"></th>
                                        
                                        <th class="column100 column3" data-column="column3" data-toggle="modal" data-target="#select_room1" name="room">MONDAY</th>
                                        <th class="column100 column4" data-column="column4" data-toggle="modal" data-target="#select_room2" name="room">Tuesday</th>
                                        <th class="column100 column5" data-column="column5" data-toggle="modal" data-target="#select_room3" name="room">Wednesday</th>
                                        <th class="column100 column6" data-column="column6" data-toggle="modal" data-target="#select_room4" name="room">Thursday</th>
                                        <th class="column100 column7" data-column="column7" data-toggle="modal" data-target="#select_room5" name="room">Friday</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
  
                                    <tr class="row100">
                                        <td class="column100 column1" data-column="column1"><a href="#" style="display:block;position:relative;width:100%;">9:30 - 10:30</a></td>
                                        <td class="column100 column2" data-column="column2">
                                      
        <?php 
        			   $conn= new mysqli('localhost','root','','faculty');
                       if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = 'Select room,subject from timetable where tid="'.$tid.'" and time="9:30" and day="monday" ';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"];
    }
} else {
    echo " ";
}

?>

                                        </td>
                                        <td class="column100 column3" data-column="column3" style="width: 20px;">
                                       <?php     
									   


$sql = 'Select room,subject from timetable where tid="'.$tid.'" and time="9:30" and day="tuesday" ';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"];
    }
} else {
    echo " ";
}
?>                                        </td>
										
                                        <td class="column100 column4" data-column="column4">
                                                     <?php     
													 

$sql = 'Select room,subject from timetable where tid="'.$tid.'" and time="9:30" and day="wednesday" ';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"];
    }
} else {
    echo " ";
}
 ?>
                                        </td>
                                        <td class="column100 column5" data-column="column5">
                                                     <?php     
													 

$sql = 'Select room,subject from timetable where tid="'.$tid.'" and time="9:30" and day="thursday" ';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"];
    }
} else {
    echo " ";
}
 ?>
                                        </td>
                                        <td class="column100 column6" data-column="column6">
                                                     <?php     
													

$sql = 'Select room,subject from timetable where tid="'.$tid.'" and time="9:30" and day="friday" ';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"];
    }
} else {
    echo " ";
}
 ?>
                                        </td>
                                        
                                    </tr>
        
                                    <tr class="row100">
                                        <td class="column100 column1" data-column="column1">10:30 - 11:30
                             <?php     
							 
$sql = 'Select room,subject from timetable where tid="'.$tid.'" and time="10:30" and day="monday" ';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"];
    }
} else {
    echo " ";
}
 ?>
                                        </td>
                                        <td class="column100 column2" data-column="column2">
                                            <?php     
											
											

$sql = 'Select room,subject from timetable where tid="'.$tid.'" and time="10:30" and day="tuesday" ';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"];
    }
} else {
    echo " ";
}
 ?>
                                        </td>
                                        <td class="column100 column3" data-column="column3">
                                            <?php    

$sql = 'Select room,subject from timetable where tid="'.$tid.'" and time="10:30" and day="wednesday" ';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"];
    }
} else {
    echo " ";
}
 ?>
                                        </td>
                                        <td class="column100 column4" data-column="column4">
                                       <?php     
								

$sql = 'Select room,subject from timetable where tid="'.$tid.'" and time="10:30" and day="thursday" ';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"];
    }
} else {
    echo " ";
}
 ?>
                                        </td>
                                        <td class="column100 column5" data-column="column5">
										  <?php     
							
$sql = 'Select room,subject from timetable where tid="'.$tid.'" and time="10:30" and day="friday" ';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"];
    }
} else {
    echo " ";
}
 ?>
                                        </td>
                                        <td class="column100 column6" data-column="column6">
                                        
                                        </td>
                                        
                                    </tr>
        
                                    <tr class="row100">
                                        <td class="column100 column1" data-column="column1">11:30 - 12:30</td>
                                        <td class="column100 column2" data-column="column2">
											  <?php     
									  
$sql = 'Select room,subject from timetable where tid="'.$tid.'" and time="11:30" and day="monday" ';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"];
    }
} else {
    echo " ";
}
 ?>
                                        
                                        </td>
                                        <td class="column100 column3" data-column="column3">
                                        <?php     
									   

$sql = 'Select room,subject from timetable where tid="'.$tid.'" and time="11:30" and day="tuesday" ';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"];
    }
} else {
    echo " ";
}
 ?>
                                        </td>
                                        <td class="column100 column4" data-column="column4">
                                         <?php     
							
$sql = 'Select room,subject from timetable where tid="'.$tid.'" and time="11:30" and day="wednesday" ';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"];
    }
} else {
    echo " ";
}
 ?>
                                        </td>
                                        <td class="column100 column5" data-column="column5">
                                        <?php     
									  

$sql = 'Select room,subject from timetable where tid="'.$tid.'" and time="11:30" and day="thursday" ';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"];
    }
} else {
    echo " ";
}
 ?>
                                        </td>
                                        <td class="column100 column6" data-column="column6"> 
 <?php     
									  

$sql = 'Select room,subject from timetable where tid="'.$tid.'" and time="11:30" and day="friday" ';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"];
    }
} else {
    echo " ";
}
 ?>										
                                          </td>
                                        
                                    </tr>
        
                                    <tr class="row100">
                                        <td class="column100 column1" data-column="column1">12:30 - 1:30</td>
                                        <td class="column100 column2" data-column="column2">
										 <?php     
								
$sql = 'Select room,subject from timetable where tid="'.$tid.'" and time="12:30" and day="monday" ';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"];
    }
} else {
    echo " ";
}
 ?></td>
                                        <td class="column100 column3" data-column="column3">
                                        	 <?php     
									

$sql = 'Select room,subject from timetable where tid="'.$tid.'" and time="12:30" and day="tuesday" ';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"];
    }
} else {
    echo " ";
}
?>
                                        </td>
                                        <td class="column100 column4" data-column="column4">
                                        	 <?php     
			

$sql = 'Select room,subject from timetable where tid="'.$tid.'" and time="12:30" and day="wednesday" ';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"];
    }
} else {
    echo " ";
}
 ?>
                                        </td>
                                        <td class="column100 column5" data-column="column5">
                                        	 <?php     
		
$sql = 'Select room,subject from timetable where tid="'.$tid.'" and time="12:30" and day="thursday" ';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"];
    }
} else {
    echo " ";
}
?>
                                        </td>
                                        <td class="column100 column6" data-column="column6">
                                        	 <?php     
				

$sql = 'Select room,subject from timetable where tid="'.$tid.'" and time="12:30" and day="friday" ';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"];
    }
} else {
    echo " ";
}
 ?>
                                        </td>
                                        
                                    </tr>
        
                                    <tr class="row100">
                                        <td class="column100 column1" data-column="column1">1:30 - 2:30</td>
                                        <td class="column100 column2" data-column="column2">
                                          	 <?php     
			

$sql = 'Select room,subject from timetable where tid="'.$tid.'" and time="1:30" and day="monday" ';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"];
    }
} else {
    echo " ";
}
 ?>
                                        </td>
                                        <td class="column100 column3" data-column="column3">
                                          	 <?php     
									  

$sql = 'Select room,subject from timetable where tid="'.$tid.'" and time="1:30" and day="tuesday" ';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"];
    }
} else {
    echo " ";
}
 ?>
                                        </td>
                                        <td class="column100 column4" data-column="column4">
                                          	 <?php     
					
$sql = 'Select room,subject from timetable where tid="'.$tid.'" and time="1:30" and day="wednesday" ';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"];
    }
} else {
    echo " ";
}
 ?>
                                        </td>
                                        <td class="column100 column5" data-column="column5">
                                         	 <?php     
					
$sql = 'Select room,subject from timetable where tid="'.$tid.'" and time="1:30" and day="thursday" ';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"];
    }
} else {
    echo " ";
}
?>
                                        </td>
                                        <td class="column100 column6" data-column="column6">
                                         	 <?php     
			
$sql = 'Select room,subject from timetable where tid="'.$tid.'" and time="1:30" and day="friday" ';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"];
    }
} else {
    echo " ";
}
 ?>
                                        </td>
                                        
                                    </tr>
        
                                    <tr class="row100">
                                        <td class="column100 column1" data-column="column1">2:30 - 3:30</td>
                                        <td class="column100 column2" data-column="column2">  	 <?php     
				
$sql = 'Select room,subject from timetable where tid="'.$tid.'" and time="2:30" and day="monday" ';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"];
    }
} else {
    echo " ";
}
 ?></td>
                                        <td class="column100 column3" data-column="column3">
                                       <?php     
						

$sql = 'Select room,subject from timetable where tid="'.$tid.'" and time="2:30" and day="tuesday" ';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"];
    }
} else {
    echo " ";
}
 ?>
                                        </td>
                                        <td class="column100 column4" data-column="column4">
                                        <?php     
			

$sql = 'Select room,subject from timetable where tid="'.$tid.'" and time="2:30" and day="wednesday" ';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"];
    }
} else {
    echo " ";
}
?>
                                        </td>
                                        <td class="column100 column5" data-column="column5">
                                                  <?php     
				

$sql = 'Select room,subject from timetable where tid="'.$tid.'" and time="2:30" and day="thursday" ';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"];
    }
} else {
    echo " ";
}
?>                              </td>
                                        <td class="column100 column6" data-column="column6">
                                        <?php     
					
$sql = 'Select room,subject from timetable where tid="'.$tid.'" and time="2:30" and day="friday" ';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"];
    }
} else {
    echo " ";
}
 ?>
                                        </td>
                                        
                                    </tr>
        
                                    <tr class="row100">
                                        <td class="column100 column1" data-column="column1">3:30 - 4:30</td>
                                        <td class="column100 column2" data-column="column2">
										<?php     
		
$sql = 'Select room,subject from timetable where tid="'.$tid.'" and time="3:30" and day="monday" ';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"];
    }
} else {
    echo " ";
}
 ?></td>
                                        <td class="column100 column3" data-column="column3">
                                       <?php     
			

$sql = 'Select room,subject from timetable where tid="'.$tid.'" and time="3:30" and day="tuesday" ';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"];
    }
} else {
    echo " ";
}
 ?>
                                        </td>
                                        <td class="column100 column4" data-column="column4">
                                         <?php     
									   

$sql = 'Select room,subject from timetable where tid="'.$tid.'" and time="3:30" and day="wednesday" ';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"];
    }
} else {
    echo " ";
}
 ?>
                                        </td>
                                        <td class="column100 column5" data-column="column5">
                                          <?php     
									  

$sql = 'Select room,subject from timetable where tid="'.$tid.'" and time="3:30" and day="thursday" ';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"];
    }
} else {
    echo " ";
}
 ?>
                                        </td>
                                        <td class="column100 column6" data-column="column6">
                                          <?php     
				

$sql = 'Select room,subject from timetable where tid="'.$tid.'" and time="3:30" and day="friday" ';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"];
    }
} else {
    echo " ";
}
?></td>
                                        
                                    </tr>
                                    <tr class="row100">
                                        <td class="column100 column1" data-column="column1">4:30 - 5:30</td>
                                        <td class="column100 column2" data-column="column2">
										  <?php     
									  

$sql = 'Select room,subject from timetable where tid="'.$tid.'" and time="4:30" and day="monday" ';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"];
    }
} else {
    echo " ";
}
?>
                                        </td>
                                        <td class="column100 column3" data-column="column3">
                                        	  <?php     
					

$sql = 'Select room,subject from timetable where tid="'.$tid.'" and time="4:30" and day="tuesday" ';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"];
    }
} else {
    echo " ";
}
?></td>
                                        <td class="column100 column4" data-column="column4">
                                       	  <?php     
				

$sql = 'Select room,subject from timetable where tid="'.$tid.'" and time="4:30" and day="wednesday" ';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"];
    }
} else {
    echo " ";
}
 ?>
                                        </td>
                                        <td class="column100 column5" data-column="column5">
                                       	  <?php     
									  

$sql = 'Select room,subject from timetable where tid="'.$tid.'" and time="4:30" and day="thursday" ';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"];
    }
} else {
    echo " ";
}
 ?>
                                        </td>
                                        <td class="column100 column6" data-column="column6">
                                        	  <?php     
						

$sql = 'Select room,subject from timetable where tid="'.$tid.'" and time="4:30" and day="friday" ';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"];
    }
} else {
    echo " ";
}
$conn->close();
 ?>
                                        </td>
                                        
                                       
                                    </tr>
                                   
                                      
                                      
                                      <!-- #modal 2 -->
                                    <div class="modal fade" id="select_room1">
                                      <div class="modal-dialog" style="max-width:30%;height:45%; overflow-y: auto; ">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                          <h4 class="modal-title">Select Room</h4>
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                           
                                          </div>
                                          <div class="modal-body">
                                          <div class="modal-body">
                                              
                                                <form method="post" action="" >
                                            <div class="form-group">
											Selected day: <br>
											<input type="text" value="monday" name="day" hidden>
											MONDAY
											<br>
											<br> 
                                            <label>  Select Time: </label>
                                                <select name="time">
                                                <option value="9:30">9:30-10:30</option>
                                                <option value="10:30">10:30-11:30</option>
                                                <option value="11:30">11:30-12:30</option>
                                                <option value="12:30">12:30-1:30</option>
                                                <option value="1:30">1:30-2:30</option>
                                                <option value="2:30">2:30-3:30</option> 
                                                <option value="3:30">3:30-4:30</option>
                                                <option value="4:30">4:30-5:30</option><br>
                                                </select>
                                            </div>
      
        
                                            <div class="form-group">
                                                <label>  Select Subject: </label>
                                                <select name="subject">
                                                    <option value="Sub1">Subject 1</option>
                                                    <option value="Sub2">Subject 2</option>
                                                    <option value="Sub3">Subject 3</option>
                                                    <br>
                                                </select>
                                                                                </div>
                                            <div class="form-group">
                                                <label> Enter Room No: </label>
                                                <input type="text" name="room" class="form-control"  required />
                                            </div>
                                        

                                          <div class="modal-footer" style=" bottom: 0;">
                                           
                                            <input type="submit" name="submit" class="btn btn-primary" value="Save changes">
											</form>
                                          </div>
                                        </div><!-- /.modal-content -->
                                      </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->  
                                      </div>
                                      </div
									                                        <!-- #modal 2 -->
                                    <div class="modal fade" id="select_room2">
                                      <div class="modal-dialog" style="max-width:30%;height:45%; overflow-y: auto; ">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                          <h4 class="modal-title">Select Room</h4>
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                           
                                          </div>
                                          <div class="modal-body">
                                          <div class="modal-body">
                                              
                                                <form method="post" action="tt.php" >
                                            <div class="form-group">
											Selected day: <br>
											<input type="text" value="tuesday" name="day" hidden>
											Tuesday<br>
											<br>
                                            <label>  Select Time: </label>
                                                <select name="time">
                                                                                              <option value="9:30">9:30-10:30</option>
                                                <option value="10:30">10:30-11:30</option>
                                                <option value="11:30">11:30-12:30</option>
                                                <option value="12:30">12:30-1:30</option>
                                                <option value="1:30">1:30-2:30</option>
                                                <option value="2:30">2:30-3:30</option> 
                                                <option value="3:30">3:30-4:30</option>
                                                <option value="4:30">4:30-5:30</option><br>
                                                </select>
                                            </div>
      
        
                                            <div class="form-group">
                                                <label>  Select Subject: </label>
                                                <select name="subject">
                                                    <option value="Sub1">Subject 1</option>
                                                    <option value="Sub2">Subject 2</option>
                                                    <option value="Sub3">Subject 3</option>
                                                    <br>
                                                </select>
                                                                                </div>
                                            <div class="form-group">
                                                <label> Enter Room No: </label>
                                                <input type="text" name="room" class="form-control"  required />
                                            </div>
                                        

                                          <div class="modal-footer" style=" bottom: 0;">
                                           
                                            <input type="submit" name="submit" class="btn btn-primary" value="Save changes">
											</form>
                                          </div>
                                        </div><!-- /.modal-content -->
                                      </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->  
                                      </div>
                                      </div>
									                                        <!-- #modal 2 -->
                                    <div class="modal fade" id="select_room3">
                                      <div class="modal-dialog" style="max-width:30%;height:45%; overflow-y: auto; ">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                          <h4 class="modal-title">Select Room</h4>
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                           
                                          </div>
                                          <div class="modal-body">
                                          <div class="modal-body">
                                              
                                                <form method="post" action="tt.php" >
                                            <div class="form-group">
											Selected day: <br>
										<input type="text" value="wednesday" name="day" hidden>
										WEDNESDAY
										<br>
											<br>
                                            <label>  Select Time: </label>
                                                <select name="time">
                                                                                         <option value="9:30">9:30-10:30</option>
                                                <option value="10:30">10:30-11:30</option>
                                                <option value="11:30">11:30-12:30</option>
                                                <option value="12:30">12:30-1:30</option>
                                                <option value="1:30">1:30-2:30</option>
                                                <option value="2:30">2:30-3:30</option> 
                                                <option value="3:30">3:30-4:30</option>
                                                <option value="4:30">4:30-5:30</option><br>
                                                </select>
                                            </div>
      
        
                                            <div class="form-group">
                                                <label>  Select Subject: </label>
                                                <select name="subject">
                                                    <option value="Sub1">Subject 1</option>
                                                    <option value="Sub2">Subject 2</option>
                                                    <option value="Sub3">Subject 3</option>
                                                    <br>
                                                </select>
                                                                                </div>
                                            <div class="form-group">
                                                <label> Enter Room No: </label>
                                                <input type="text" name="room" class="form-control"  required />
                                            </div>
                                        

                                          <div class="modal-footer" style=" bottom: 0;">
                                           
                                            <input type="submit" name="submit" class="btn btn-primary" value="Save changes">
											</form>
                                          </div>
                                        </div><!-- /.modal-content -->
                                      </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->  
                                      </div>
                                      </div>
									                                        <!-- #modal 2 -->
                                    <div class="modal fade" id="select_room4">
                                      <div class="modal-dialog" style="max-width:30%;height:45%; overflow-y: auto; ">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                          <h4 class="modal-title">Select Room</h4>
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                           
                                          </div>
                                          <div class="modal-body">
                                          <div class="modal-body">
                                              
                                                <form method="post" action="tt.php" >
                                            <div class="form-group">
											Selected day: <br>
											<input type="text" value="thursday" name="day" hidden>
											Thursday
											<br>
											<br>
                                            <label>  Select Time: </label>
                                                <select name="time">
                                                                                              <option value="9:30">9:30-10:30</option>
                                                <option value="10:30">10:30-11:30</option>
                                                <option value="11:30">11:30-12:30</option>
                                                <option value="12:30">12:30-1:30</option>
                                                <option value="1:30">1:30-2:30</option>
                                                <option value="2:30">2:30-3:30</option> 
                                                <option value="3:30">3:30-4:30</option>
                                                <option value="4:30">4:30-5:30</option><br>
                                                </select>
                                            </div>
      
        
                                            <div class="form-group">
                                                <label>  Select Subject: </label>
                                                <select name="subject">
                                                    <option value="Sub1">Subject 1</option>
                                                    <option value="Sub2">Subject 2</option>
                                                    <option value="Sub3">Subject 3</option>
                                                    <br>
                                                </select>
                                                                                </div>
                                            <div class="form-group">
                                                <label> Enter Room No: </label>
                                                <input type="text" name="room" class="form-control"  required />
                                            </div>
                                        

                                          <div class="modal-footer" style=" bottom: 0;">
                                           
                                            <input type="submit" name="submit" class="btn btn-primary" value="Save changes">
											</form>
                                          </div>
                                        </div><!-- /.modal-content -->
                                      </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->  
                                      </div>
                                      </div>
									  
									                                        <!-- #modal 2 -->
                                    <div class="modal fade" id="select_room5">
                                      <div class="modal-dialog" style="max-width:30%;height:45%; overflow-y: auto; ">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                          <h4 class="modal-title">Select Room</h4>
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                           
                                          </div>
                                          <div class="modal-body">
                                          <div class="modal-body">
                                              
                                                <form method="post" action="tt.php" >
                                            <div class="form-group">
											Selected day: 
										<input type="text" value="friday" name="day" hidden>
										Friday
										<br>
											<br>
                                            <label>  Select Time: </label>
                                                <select name="time">
                                                                                         <option value="9:30">9:30-10:30</option>
                                                <option value="10:30">10:30-11:30</option>
                                                <option value="11:30">11:30-12:30</option>
                                                <option value="12:30">12:30-1:30</option>
                                                <option value="1:30">1:30-2:30</option>
                                                <option value="2:30">2:30-3:30</option> 
                                                <option value="3:30">3:30-4:30</option>
                                                <option value="4:30">4:30-5:30</option><br>
                                                </select>
                                            </div>
      
        
                                            <div class="form-group">
                                                <label>  Select Subject: </label>
                                                <select name="subject">
                                                    <option value="Sub1">Subject 1</option>
                                                    <option value="Sub2">Subject 2</option>
                                                    <option value="Sub3">Subject 3</option>
                                                    <br>
                                                </select>
                                                                                </div>
                                            <div class="form-group">
                                                <label> Enter Room No: </label>
                                                <input type="text" name="room" class="form-control"  required />
                                            </div>
                                        

                                          <div class="modal-footer" style=" bottom: 0;">
                                           
                                            <input type="submit" name="submit" class="btn btn-primary" value="Save changes">
											</form>
                                          </div>
                                        </div><!-- /.modal-content -->
                                      </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->  
                                      </div>
                                      </div>
                                     
  
                                </tbody>
                            </table>
                        </div>
						<?php echo $_SESSION['tt']; ?>
						<form method="POST" action="update.php">
                        <input type="submit" name="reload" value="Update time table" class="btn btn-primary" style="margin-left:500px; margin-top:30px; background-color:rgb(0, 65, 130); border-radius:12px;">

                       </form>
                    </div>
                </div>
            
        </div>
    </div>
<script>
    function open(x){
    $(x).modal('show');
}
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

</body>

</html>

