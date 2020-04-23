<?php 
include('security3.php');
                $sap=$_SESSION['sap'];
                $connection= mysqli_connect('localhost','root','');
                $db=mysqli_select_db($connection,'minor');
                if(!$connection)
                {
                     echo "Connection error";
                }
                $query="select * from students where Sap='$sap'";
                $query_run = mysqli_query($connection,$query);
    
                while($row = mysqli_fetch_assoc($query_run))
                {
					$sap=$row['Sap'];
                   $fname=$row["FirstName"];
                   $lname=$row["LastName"];
                    $rollno=$row["Rollno"];
                    $branch=$row["Branch"];
					$year=$row["Year"];
					$email=$row["Email"];
                    $phone=$row["Phoneno"];
                    $img=$row["Image"];
                    $imageURL = 'admin/uploads/'.$img;
                }
                $connection= mysqli_connect('localhost','root','');
                $db=mysqli_select_db($connection,'students');
                $tid=$_SESSION['sap'];
               
                $del="delete from timetable where flag=0 and tid='$tid'";
                $d = mysqli_query($connection,$del);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Student Login</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/faculty_style.css">
    <link rel="stylesheet" href="css/tt_style.css">


    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>

<body style="overflow-x:hidden;">
    <!--Top navbar start-->
    <nav class="navbar navbar-expand-md navbar-dark navbar-default">
        <ul class="navbar-nav mr-auto" id="navbar-li">
            
            <li class="nav-item">
              <p style="color: rgb(1, 50, 97); cursor:pointer;">
                <a href="student_tt.php"  style="cursor: pointer; color:rgb(1, 50, 97);">Set Time-Table</a></p>

            
        </ul>
    
            <ul class="navbar-nav ml-auto">
               
                <li class="nav-item">
                    <a class="nav-link" href="#"><img src="img/upes-logo.png" height="45px" href=student.php></a>
                </li>
            </ul>
      
    </nav>
    <!--Top navbar end-->

   
    <div class="row">

         <!--Sidebar start-->
        <nav id="sidebar">
            <div class="sidebar-header text-center">
                <p style="color: rgb(146, 145, 145);">Student Information</p>
                <br>
                <img src="<?php echo $imageURL; ?>" alt="Student-img" style="height: 130px;" >
            </div>
    
            <ul class="list-unstyled components text-center ">
                <p class="font-weight-bold" ><br>
				<?php echo $fname." ".$lname; ?><span class="font-weight-normal"><br><?php echo $branch; ?></span></p>
                <li>
                    <p style="font-size: 15px;"> <?php echo $sap; ?></p>
                </li>
                <li>
                    <p style="font-size: 15px; margin-top: -28px;">Year: <?php echo $year; ?></p>
                </li>
                <li>
                    <p style="font-size: 15px; margin-top: -28px;">Email Address: <?php echo $email; ?></p>
                </li>
                <li>
                    <p style="font-size: 15px; margin-top: -28px;">Contact No: <?php echo $phone; ?></p>
                
                
            </ul>
            <ul class="list-unstyled components text-center ">
                <li>
                    <div class="text-center";><a href="#" style="font-size: 15px;">Change Password</a></div>
                </li>
                <li>
                    <div class="text-center"><a href="logout2.php" style="font-size: 15px;" >Logout</a></div>
                </li>
            </ul>
        </nav>
        <!--Sidebar end-->
        
        <!--Main Content start-->
        <div class="col md-6 lg-6">
            <div class="row" style="margin-left:20px;margin-top:40px;">
                <button type="button" class="btn btn-md subjects" data-toggle="modal" data-target="#select_room1">Subject 1</button>
                <button type="button" class="btn btn-md subjects" data-toggle="modal" data-target="#select_room2">Subject 2</button>
                <button type="button" class="btn btn-md subjects" data-toggle="modal" data-target="#select_room3">Subject 3</button>
                <button type="button" class="btn btn-md subjects" data-toggle="modal" data-target="#select_room4">Subject 4</button>
                <button type="button" class="btn btn-md subjects" data-toggle="modal" data-target="#select_room5">Subject 5</button>
            </div>
                <div class="container-table100" >
                    <div class="wrap-table100">
                        <div class="table100 table-bordered ver1 m-b-110" style="margin-left:20px; border-radius:4px;">
                            <table data-vertable="ver1" >
                                <thead>
                                    <tr class="row100 head">
                                        <th class="column100 column1" data-column="column1"></th>
                                        
                                        <th class="column100 column3" data-column="column3" name="room">Monday</th>
                                        <th class="column100 column4" data-column="column4" name="room">Tuesday</th>
                                        <th class="column100 column5" data-column="column5" name="room">Wednesday</th>
                                        <th class="column100 column6" data-column="column6" name="room">Thursday</th>
                                        <th class="column100 column7" data-column="column7" name="room">Friday</th>
                                       
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
                                          <h4 class="modal-title">Select Faculty and time </h4>
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                           
                                          </div>
                                          <div class="modal-body">
                                          <div class="modal-body">
                                              
                                                <form method="post" action="" >
                                            <div class="form-group">
											Selected subject: <br>
											<input type="text" value="monday" name="day" hidden>
											SUBJECT 1
											<br>
											<br> 
                                            <label>  Select Faculty: </label>
                                                <select name="fac">
                                                <option value="fac1">Faculty1</option>
                                                <option value="fac2">Faculty2</option>
                                                <option value="fac3">Faculty3</option>
                                                <option value="fac4">Faculty4</option>
                                               </select>
                                            </div>
      
        
                                            <div class="form-group">
                                                <label> Time: (time set by the faculty)</label>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label>Room No: (Room no set by the faculty) </label>
                                                
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
									                                        <!--modal2-->
                                    <div class="modal fade" id="select_room2">
                                    <div class="modal-dialog" style="max-width:30%;height:45%; overflow-y: auto; ">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                          <h4 class="modal-title">Select Faculty and time </h4>
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                           
                                          </div>
                                          <div class="modal-body">
                                          <div class="modal-body">
                                              
                                                <form method="post" action="" >
                                            <div class="form-group">
											Selected subject: <br>
											<input type="text" value="monday" name="day" hidden>
											SUBJECT 2
											<br>
											<br> 
                                            <label>  Select Faculty: </label>
                                                <select name="fac">
                                                <option value="fac1">Faculty1</option>
                                                <option value="fac2">Faculty2</option>
                                                <option value="fac3">Faculty3</option>
                                                <option value="fac4">Faculty4</option>
                                               </select>
                                            </div>
      
        
                                            <div class="form-group">
                                                <label> Time: (time set by the faculty)</label>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label>Room No: (Room no set by the faculty) </label>
                                                
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
                                    <div class="modal fade" id="select_room3">
                                    <div class="modal-dialog" style="max-width:30%;height:45%; overflow-y: auto; ">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                          <h4 class="modal-title">Select Faculty and time </h4>
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                           
                                          </div>
                                          <div class="modal-body">
                                          <div class="modal-body">
                                              
                                                <form method="post" action="" >
                                            <div class="form-group">
											Selected subject: <br>
											<input type="text" value="monday" name="day" hidden>
											SUBJECT 3
											<br>
											<br> 
                                            <label>  Select Faculty: </label>
                                                <select name="fac">
                                                <option value="fac1">Faculty1</option>
                                                <option value="fac2">Faculty2</option>
                                                <option value="fac3">Faculty3</option>
                                                <option value="fac4">Faculty4</option>
                                               </select>
                                            </div>
      
        
                                            <div class="form-group">
                                                <label> Time: (time set by the faculty)</label>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label>Room No: (Room no set by the faculty) </label>
                                                
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
                                    <div class="modal fade" id="select_room4">
                                    <div class="modal-dialog" style="max-width:30%;height:45%; overflow-y: auto; ">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                          <h4 class="modal-title">Select Faculty and time </h4>
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                           
                                          </div>
                                          <div class="modal-body">
                                          <div class="modal-body">
                                              
                                                <form method="post" action="" >
                                            <div class="form-group">
											Selected subject: <br>
											<input type="text" value="monday" name="day" hidden>
											SUBJECT 4
											<br>
											<br> 
                                            <label>  Select Faculty: </label>
                                                <select name="fac">
                                                <option value="fac1">Faculty1</option>
                                                <option value="fac2">Faculty2</option>
                                                <option value="fac3">Faculty3</option>
                                                <option value="fac4">Faculty4</option>
                                               </select>
                                            </div>
      
        
                                            <div class="form-group">
                                                <label> Time: (time set by the faculty)</label>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label>Room No: (Room no set by the faculty) </label>
                                                
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
                                          <h4 class="modal-title">Select Faculty and time </h4>
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                           
                                          </div>
                                          <div class="modal-body">
                                          <div class="modal-body">
                                              
                                                <form method="post" action="" >
                                            <div class="form-group">
											Selected subject: <br>
											<input type="text" value="monday" name="day" hidden>
											SUBJECT 5
											<br>
											<br> 
                                            <label>  Select Faculty: </label>
                                                <select name="fac">
                                                <option value="fac1">Faculty1</option>
                                                <option value="fac2">Faculty2</option>
                                                <option value="fac3">Faculty3</option>
                                                <option value="fac4">Faculty4</option>
                                               </select>
                                            </div>
      
        
                                            <div class="form-group">
                                                <label> Time: (time set by the faculty)</label>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label>Room No: (Room no set by the faculty) </label>
                                                
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
