<?php 
include('security3.php');
                $sap=$_SESSION['sap'];
				echo $_SESSION['tt']="";
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
           
         //       $tid=$_SESSION['sap'];
               
                
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
    <link rel="stylesheet" href="css/timetable_style.css">


    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <script>
    function showTime(str,str2){
        if (str=="") {
            document.getElementById("getTime").innerHTML="";
            return;
        }
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() 
        {
            if (this.readyState==4 && this.status==200) {
                document.getElementById("getTime").innerHTML=this.responseText;
            }
        }
        xmlhttp.open("GET","getInfo.php?q="+str+"&q2="+str2,true);
        xmlhttp.send();

    }
    function showTime2(str,str2){
        if (str=="") {
            document.getElementById("getTime2").innerHTML="";
            return;
        }
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() 
        {
            if (this.readyState==4 && this.status==200) {
                document.getElementById("getTime2").innerHTML=this.responseText;
            }
        }
        xmlhttp.open("GET","getInfo.php?q="+str+"&q2="+str2,true);
        xmlhttp.send();

    }
    function showTime3(str,str2){
        if (str=="") {
            document.getElementById("getTime3").innerHTML="";
            return;
        }
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() 
        {
            if (this.readyState==4 && this.status==200) {
                document.getElementById("getTime3").innerHTML=this.responseText;
            }
        }
        xmlhttp.open("GET","getInfo.php?q="+str+"&q2="+str2,true);
        xmlhttp.send();

    }
    function showTime4(str,str2){
        if (str=="") {
            document.getElementById("getTime4").innerHTML="";
            return;
        }
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() 
        {
            if (this.readyState==4 && this.status==200) {
                document.getElementById("getTime4").innerHTML=this.responseText;
            }
        }
        xmlhttp.open("GET","getInfo.php?q="+str+"&q2="+str2,true);
        xmlhttp.send();

    }
    function showTime5(str,str2){
        if (str=="") {
            document.getElementById("getTime5").innerHTML="";
            return;
        }
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() 
        {
            if (this.readyState==4 && this.status==200) {
                document.getElementById("getTime5").innerHTML=this.responseText;
            }
        }
        xmlhttp.open("GET","getInfo.php?q="+str+"&q2="+str2,true);
        xmlhttp.send();

    }
    </script>
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
            <?php
            $connection= mysqli_connect('localhost','root','');
            $db=mysqli_select_db($connection,'minor');
            if(!$connection)
            {
                echo "Connection error";
            }
            $query="select subject from subject where year=$year";
            $query_run = mysqli_query($connection,$query);
            $arr=[];
            $i=0;
            while($row = mysqli_fetch_assoc($query_run))
            {
                $arr[$i]=$row['subject'];
                echo " <button type='button' class='btn btn-md subjects' data-toggle='modal' data-target='#{$arr[$i]}'>{$arr[$i]} </button>";
                $i++;
            }
            
        ?>
                        
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
  
$sql = 'Select room,subject,tid from student_timetable where sap="'.$sap.'" and day="monday" and time="9:30"';
$result = mysqli_query($connection,$sql);
if(mysqli_fetch_array($result))
{
while($row = mysqli_fetch_array($result))
{
	echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"]."<br>"."Faculty:".$row["tid"];
}
	
}

    // output data of each row
  
 else 
{
    echo " ";
}

?>
                                        </td>
                                        <td class="column100 column3" data-column="column3" style="width: 20px;">
              <?php 
  
$sql = 'Select room,subject,tid from student_timetable where sap="'.$sap.'" and day="tuesday" and time="9:30"';
$result = mysqli_query($connection,$sql);
if(mysqli_fetch_array($result))
{
while($row = mysqli_fetch_array($result))
{
	echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"]."<br>"."Faculty:".$row["tid"];
}
	
}

    // output data of each row
  
 else 
{
    echo " ";
}

?>
                                          </td>
										
                                        <td class="column100 column4" data-column="column4">
     <?php 
  
$sql = 'Select room,subject,tid from student_timetable where sap="'.$sap.'" and day="wednesday" and time="9:30"';
$result = mysqli_query($connection,$sql);
if(mysqli_fetch_array($result))
{
while($row = mysqli_fetch_array($result))
{
	echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"]."<br>"."Faculty:".$row["tid"];
}
	
}

    // output data of each row
  
 else 
{
    echo " ";
}

?>
                                        </td>
                                        <td class="column100 column5" data-column="column5">
                                            <?php 
  
$sql = 'Select room,subject,tid from student_timetable where sap="'.$sap.'" and day="thursday" and time="9:30"';
$result = mysqli_query($connection,$sql);
if(mysqli_fetch_array($result))
{
while($row = mysqli_fetch_array($result))
{
	echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"]."<br>"."Faculty:".$row["tid"];
}
	
}

    // output data of each row
  
 else 
{
    echo " ";
}

?>          
                                        </td>
                                        <td class="column100 column6" data-column="column6">
                                                    <?php 
  
$sql = 'Select room,subject,tid from student_timetable where sap="'.$sap.'" and day="friday" and time="9:30"';
$result = mysqli_query($connection,$sql);
if(mysqli_fetch_array($result))
{
while($row = mysqli_fetch_array($result))
{
	echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"]."<br>"."Faculty:".$row["tid"];
}
	
}

    // output data of each row
  
 else 
{
    echo " ";
}

?>  
                                        </td>
                                        
                                    </tr>
        
                                    <tr class="row100">
                            
                                        </td>
                                        <td class="column100 column2" data-column="column2">
                                             <?php 
  
$sql = 'Select room,subject,tid from student_timetable where sap="'.$sap.'" and day="monday" and time="10:30"';
$result = mysqli_query($connection,$sql);
if(mysqli_fetch_array($result))
{
while($row = mysqli_fetch_array($result))
{
	echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"]."<br>"."Faculty:".$row["tid"];
}
	
}

    // output data of each row
  
 else 
{
    echo " ";
}

?>
                                        </td>
                                        <td class="column100 column3" data-column="column3">
                                                                   <?php 
  
$sql = 'Select room,subject,tid from student_timetable where sap="'.$sap.'" and day="tuesday" and time="10:30"';
$result = mysqli_query($connection,$sql);
if(mysqli_fetch_array($result))
{
while($row = mysqli_fetch_array($result))
{
	echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"]."<br>"."Faculty:".$row["tid"];
}
	
}

    // output data of each row
  
 else 
{
    echo " ";
}

?>
                                        </td>
                                        <td class="column100 column4" data-column="column4">
                                                              <?php 
  
$sql = 'Select room,subject,tid from student_timetable where sap="'.$sap.'" and day="wednesday" and time="10:30"';
$result = mysqli_query($connection,$sql);
if(mysqli_fetch_array($result))
{
while($row = mysqli_fetch_array($result))
{
	echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"]."<br>"."Faculty:".$row["tid"];
}
	
}

    // output data of each row
  
 else 
{
    echo " ";
}

?>
                                        </td>
                                        <td class="column100 column5" data-column="column5">
										                          <?php 
  
$sql = 'Select room,subject,tid from student_timetable where sap="'.$sap.'" and day="thursday" and time="10:30"';
$result = mysqli_query($connection,$sql);
if(mysqli_fetch_array($result))
{
while($row = mysqli_fetch_array($result))
{
	echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"]."<br>"."Faculty:".$row["tid"];
}
	
}

    // output data of each row
  
 else 
{
    echo " ";
}

?>
                                        </td>
                                        <td class="column100 column6" data-column="column6">
                                                                <?php 
  
$sql = 'Select room,subject,tid from student_timetable where sap="'.$sap.'" and day="friday" and time="10:30"';
$result = mysqli_query($connection,$sql);
if(mysqli_fetch_array($result))
{
while($row = mysqli_fetch_array($result))
{
	echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"]."<br>"."Faculty:".$row["tid"];
}
	
}

    // output data of each row
  
 else 
{
    echo " ";
}

?>
                                        </td>
                                        
                                    </tr>
        
                                    <tr class="row100">
                                        <td class="column100 column1" data-column="column1">11:30 - 12:30</td>
                                        <td class="column100 column2" data-column="column2">
											                          <?php 
  
$sql = 'Select room,subject,tid from student_timetable where sap="'.$sap.'" and day="monday" and time="11:30"';
$result = mysqli_query($connection,$sql);
if(mysqli_fetch_array($result))
{
while($row = mysqli_fetch_array($result))
{
	echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"]."<br>"."Faculty:".$row["tid"];
}
	
}

    // output data of each row
  
 else 
{
    echo " ";
}

?>
                                        
                                        </td>
                                        <td class="column100 column3" data-column="column3">
                                        							                          <?php 
  
$sql = 'Select room,subject,tid from student_timetable where sap="'.$sap.'" and day="tuesday" and time="11:30"';
$result = mysqli_query($connection,$sql);
if(mysqli_fetch_array($result))
{
while($row = mysqli_fetch_array($result))
{
	echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"]."<br>"."Faculty:".$row["tid"];
}
	
}

    // output data of each row
  
 else 
{
    echo " ";
}

?>
                                        </td>
                                        <td class="column100 column4" data-column="column4">
                                                               							                          <?php 
  
$sql = 'Select room,subject,tid from student_timetable where sap="'.$sap.'" and day="wednesday" and time="11:30"';
$result = mysqli_query($connection,$sql);
if(mysqli_fetch_array($result))
{
while($row = mysqli_fetch_array($result))
{
	echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"]."<br>"."Faculty:".$row["tid"];
}
	
}

    // output data of each row
  
 else 
{
    echo " ";
}

?>
                                        </td>
                                        <td class="column100 column5" data-column="column5">
                                                              							                          <?php 
  
$sql = 'Select room,subject,tid from student_timetable where sap="'.$sap.'" and day="thursday" and time="11:30"';
$result = mysqli_query($connection,$sql);
if(mysqli_fetch_array($result))
{
while($row = mysqli_fetch_array($result))
{
	echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"]."<br>"."Faculty:".$row["tid"];
}
	
}

    // output data of each row
  
 else 
{
    echo " ";
}

?>
                                        </td>
                                        <td class="column100 column6" data-column="column6"> 
 					                       							                          <?php 
  
$sql = 'Select room,subject,tid from student_timetable where sap="'.$sap.'" and day="friday" and time="11:30"';
$result = mysqli_query($connection,$sql);
if(mysqli_fetch_array($result))
{
while($row = mysqli_fetch_array($result))
{
	echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"]."<br>"."Faculty:".$row["tid"];
}
	
}

    // output data of each row
  
 else 
{
    echo " ";
}

?>
                                          </td>
                                        
                                    </tr>
        
                                    <tr class="row100">
                                        <td class="column100 column1" data-column="column1">12:30 - 1:30</td>
                                        <td class="column100 column2" data-column="column2">
										                       							                          <?php 
  
$sql = 'Select room,subject,tid from student_timetable where sap="'.$sap.'" and day="monday" and time="12:30"';
$result = mysqli_query($connection,$sql);
if(mysqli_fetch_array($result))
{
while($row = mysqli_fetch_array($result))
{
	echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"]."<br>"."Faculty:".$row["tid"];
}
	
}

    // output data of each row
  
 else 
{
    echo " ";
}

?>
										</td>
                                        <td class="column100 column3" data-column="column3">
																			                       							                          <?php 
  
$sql = 'Select room,subject,tid from student_timetable where sap="'.$sap.'" and day="tuesday" and time="12:30"';
$result = mysqli_query($connection,$sql);
if(mysqli_fetch_array($result))
{
while($row = mysqli_fetch_array($result))
{
	echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"]."<br>"."Faculty:".$row["tid"];
}
	
}

    // output data of each row
  
 else 
{
    echo " ";
}

?>
                                        	                               </td>
                                        <td class="column100 column4" data-column="column4">
                                        										                       							                          <?php 
  
$sql = 'Select room,subject,tid from student_timetable where sap="'.$sap.'" and day="wednesday" and time="12:30"';
$result = mysqli_query($connection,$sql);
if(mysqli_fetch_array($result))
{
while($row = mysqli_fetch_array($result))
{
	echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"]."<br>"."Faculty:".$row["tid"];
}
	
}

    // output data of each row
  
 else 
{
    echo " ";
}

?>
                                        </td>
                                        <td class="column100 column5" data-column="column5">
                                        										                       							                          <?php 
  
$sql = 'Select room,subject,tid from student_timetable where sap="'.$sap.'" and day="thursday" and time="12:30"';
$result = mysqli_query($connection,$sql);
if(mysqli_fetch_array($result))
{
while($row = mysqli_fetch_array($result))
{
	echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"]."<br>"."Faculty:".$row["tid"];
}
	
}

    // output data of each row
  
 else 
{
    echo " ";
}

?>
                                        </td>
                                        <td class="column100 column6" data-column="column6">
                                        										                       							                          <?php 
  
$sql = 'Select room,subject,tid from student_timetable where sap="'.$sap.'" and day="friday" and time="12:30"';
$result = mysqli_query($connection,$sql);
if(mysqli_fetch_array($result))
{
while($row = mysqli_fetch_array($result))
{
	echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"]."<br>"."Faculty:".$row["tid"];
}
	
}

    // output data of each row
  
 else 
{
    echo " ";
}

?>
                                        </td>
                                        
                                    </tr>
        
                                    <tr class="row100">
                                        <td class="column100 column1" data-column="column1">1:30 - 2:30</td>
                                        <td class="column100 column2" data-column="column2">
                                          										                       							                          <?php 
  
$sql = 'Select room,subject,tid from student_timetable where sap="'.$sap.'" and day="monday" and time="1:30"';
$result = mysqli_query($connection,$sql);
if(mysqli_fetch_array($result))
{
while($row = mysqli_fetch_array($result))
{
	echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"]."<br>"."Faculty:".$row["tid"];
}
	
}

    // output data of each row
  
 else 
{
    echo " ";
}

?>
                                        </td>
                                        <td class="column100 column3" data-column="column3">
                                                                 							                          <?php 
  
$sql = 'Select room,subject,tid from student_timetable where sap="'.$sap.'" and day="tuesday" and time="1:30"';
$result = mysqli_query($connection,$sql);
if(mysqli_fetch_array($result))
{
while($row = mysqli_fetch_array($result))
{
	echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"]."<br>"."Faculty:".$row["tid"];
}
	
}

    // output data of each row
  
 else 
{
    echo " ";
}

?>	
                                        </td>
                                        <td class="column100 column4" data-column="column4">
                                          	                       							                          <?php 
  
$sql = 'Select room,subject,tid from student_timetable where sap="'.$sap.'" and day="wednesday" and time="1:30"';
$result = mysqli_query($connection,$sql);
if(mysqli_fetch_array($result))
{
while($row = mysqli_fetch_array($result))
{
	echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"]."<br>"."Faculty:".$row["tid"];
}
	
}

    // output data of each row
  
 else 
{
    echo " ";
}

?>
                                        </td>
                                        <td class="column100 column5" data-column="column5">
                                         	                       							                          <?php 
  
$sql = 'Select room,subject,tid from student_timetable where sap="'.$sap.'" and day="thursday" and time="1:30"';
$result = mysqli_query($connection,$sql);
if(mysqli_fetch_array($result))
{
while($row = mysqli_fetch_array($result))
{
	echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"]."<br>"."Faculty:".$row["tid"];
}
	
}

    // output data of each row
  
 else 
{
    echo " ";
}

?>
                                        </td>
                                        <td class="column100 column6" data-column="column6">
                                         	                       							                          <?php 
  
$sql = 'Select room,subject,tid from student_timetable where sap="'.$sap.'" and day="friday" and time="1:30"';
$result = mysqli_query($connection,$sql);
if(mysqli_fetch_array($result))
{
while($row = mysqli_fetch_array($result))
{
	echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"]."<br>"."Faculty:".$row["tid"];
}
	
}

    // output data of each row
  
 else 
{
    echo " ";
}

?>
                                        </td>
                                        
                                    </tr>
        
                                    <tr class="row100">
                                        <td class="column100 column1" data-column="column1">2:30 - 3:30</td>
                                        <td class="column100 column2" data-column="column2">                        							                          <?php 
  
$sql = 'Select room,subject,tid from student_timetable where sap="'.$sap.'" and day="monday" and time="2:30"';
$result = mysqli_query($connection,$sql);
if(mysqli_fetch_array($result))
{
while($row = mysqli_fetch_array($result))
{
	echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"]."<br>"."Faculty:".$row["tid"];
}
	
}

    // output data of each row
  
 else 
{
    echo " ";
}

?> 	 </td>
                                        <td class="column100 column3" data-column="column3">
                                       <?php 
  
$sql = 'Select room,subject,tid from student_timetable where sap="'.$sap.'" and day="tuesday" and time="2:30"';
$result = mysqli_query($connection,$sql);
if(mysqli_fetch_array($result))
{
while($row = mysqli_fetch_array($result))
{
	echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"]."<br>"."Faculty:".$row["tid"];
}
	
}

    // output data of each row
  
 else 
{
    echo " ";
}

?> 
                                        </td>
                                        <td class="column100 column4" data-column="column4">
                                       <?php 
  
$sql = 'Select room,subject,tid from student_timetable where sap="'.$sap.'" and day="wednesday" and time="2:30"';
$result = mysqli_query($connection,$sql);
if(mysqli_fetch_array($result))
{
while($row = mysqli_fetch_array($result))
{
	echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"]."<br>"."Faculty:".$row["tid"];
}
	
}

    // output data of each row
  
 else 
{
    echo " ";
}

?> 
                                        </td>
                                        <td class="column100 column5" data-column="column5">
                                                   <?php 
  
$sql = 'Select room,subject,tid from student_timetable where sap="'.$sap.'" and day="thursday" and time="2:30"';
$result = mysqli_query($connection,$sql);
if(mysqli_fetch_array($result))
{
while($row = mysqli_fetch_array($result))
{
	echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"]."<br>"."Faculty:".$row["tid"];
}
	
}

    // output data of each row
  
 else 
{
    echo " ";
}

?>                            </td>
                                        <td class="column100 column6" data-column="column6">
										<?php 
  
$sql = 'Select room,subject,tid from student_timetable where sap="'.$sap.'" and day="friday" and time="2:30"';
$result = mysqli_query($connection,$sql);
if(mysqli_fetch_array($result))
{
while($row = mysqli_fetch_array($result))
{
	echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"]."<br>"."Faculty:".$row["tid"];
}
	
}

    // output data of each row
  
 else 
{
    echo " ";
}

?> 
                                                             </td>
                                        
                                    </tr>
        
                                    <tr class="row100">
                                        <td class="column100 column1" data-column="column1">3:30 - 4:30</td>
                                        <td class="column100 column2" data-column="column2">
										<?php 
  
$sql = 'Select room,subject,tid from student_timetable where sap="'.$sap.'" and day="monday" and time="3:30"';
$result = mysqli_query($connection,$sql);
if(mysqli_fetch_array($result))
{
while($row = mysqli_fetch_array($result))
{
	echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"]."<br>"."Faculty:".$row["tid"];
}
	
}

    // output data of each row
  
 else 
{
    echo " ";
}

?> 
										</td>
                                        <td class="column100 column3" data-column="column3">
                                      										<?php 
  
$sql = 'Select room,subject,tid from student_timetable where sap="'.$sap.'" and day="tuesday" and time="3:30"';
$result = mysqli_query($connection,$sql);
if(mysqli_fetch_array($result))
{
while($row = mysqli_fetch_array($result))
{
	echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"]."<br>"."Faculty:".$row["tid"];
}
	
}

    // output data of each row
  
 else 
{
    echo " ";
}

?> 
                                        </td>
                                        <td class="column100 column4" data-column="column4">
                                        										<?php 
  
$sql = 'Select room,subject,tid from student_timetable where sap="'.$sap.'" and day="wednesday" and time="3:30"';
$result = mysqli_query($connection,$sql);
if(mysqli_fetch_array($result))
{
while($row = mysqli_fetch_array($result))
{
	echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"]."<br>"."Faculty:".$row["tid"];
}
	
}

    // output data of each row
  
 else 
{
    echo " ";
}

?> 
                                        </td>
                                        <td class="column100 column5" data-column="column5">
                                         										<?php 
  
$sql = 'Select room,subject,tid from student_timetable where sap="'.$sap.'" and day="thursday" and time="3:30"';
$result = mysqli_query($connection,$sql);
if(mysqli_fetch_array($result))
{
while($row = mysqli_fetch_array($result))
{
	echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"]."<br>"."Faculty:".$row["tid"];
}
	
}

    // output data of each row
  
 else 
{
    echo " ";
}

?> 
                                        </td>
                                        <td class="column100 column6" data-column="column6">
																				<?php 
  
$sql = 'Select room,subject,tid from student_timetable where sap="'.$sap.'" and day="friday" and time="3:30"';
$result = mysqli_query($connection,$sql);
if(mysqli_fetch_array($result))
{
while($row = mysqli_fetch_array($result))
{
	echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"]."<br>"."Faculty:".$row["tid"];
}
	
}

    // output data of each row
  
 else 
{
    echo " ";
}

?> 
                                         </td>
                                        
                                    </tr>
                                    <tr class="row100">
                                        <td class="column100 column1" data-column="column1">4:30 - 5:30</td>
                                        <td class="column100 column2" data-column="column2">
																				<?php 
  
$sql = 'Select room,subject,tid from student_timetable where sap="'.$sap.'" and day="monday" and time="4:30"';
$result = mysqli_query($connection,$sql);
if(mysqli_fetch_array($result))
{
while($row = mysqli_fetch_array($result))
{
	echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"]."<br>"."Faculty:".$row["tid"];
}
	
}

    // output data of each row
  
 else 
{
    echo " ";
}

?> 
										 
                                        </td>
                                        <td class="column100 column3" data-column="column3">
																												<?php 
  
$sql = 'Select room,subject,tid from student_timetable where sap="'.$sap.'" and day="tuesday" and time="4:30"';
$result = mysqli_query($connection,$sql);
if(mysqli_fetch_array($result))
{
while($row = mysqli_fetch_array($result))
{
	echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"]."<br>"."Faculty:".$row["tid"];
}
	
}

    // output data of each row
  
 else 
{
    echo " ";
}

?> 
                                        	 </td>
                                        <td class="column100 column4" data-column="column4">
                                       																			<?php 
  
$sql = 'Select room,subject,tid from student_timetable where sap="'.$sap.'" and day="wednesday" and time="4:30"';
$result = mysqli_query($connection,$sql);
if(mysqli_fetch_array($result))
{
while($row = mysqli_fetch_array($result))
{
	echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"]."<br>"."Faculty:".$row["tid"];
}
	
}

    // output data of each row
  
 else 
{
    echo " ";
}

?> 
                                        </td>
                                        <td class="column100 column5" data-column="column5">
                                       	 																		<?php 
  
$sql = 'Select room,subject,tid from student_timetable where sap="'.$sap.'" and day="thursday" and time="4:30"';
$result = mysqli_query($connection,$sql);
if(mysqli_fetch_array($result))
{
while($row = mysqli_fetch_array($result))
{
	echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"]."<br>"."Faculty:".$row["tid"];
}
	
}

    // output data of each row
  
 else 
{
    echo " ";
}

?> 
                                        </td>
                                        <td class="column100 column6" data-column="column6">
                                        	  																		<?php 
  
$sql = 'Select room,subject,tid from student_timetable where sap="'.$sap.'" and day="friday" and time="4:30"';
$result = mysqli_query($connection,$sql);
if(mysqli_fetch_array($result))
{
while($row = mysqli_fetch_array($result))
{
	echo "Room number: ". $row["room"]."<br>"."Subject:".$row["subject"]."<br>"."Faculty:".$row["tid"];
}
	
}

    // output data of each row
  
 else 
{
    echo " ";
}

?> 
                                        </td>
                                        
                                       
                                    </tr>
                                   
                                      
                                      
                                      <!-- #modal 2 -->

                                    <div class="modal fade" id="<?php echo $arr[0]; ?>">
                                      <div class="modal-dialog" style="max-width:30%;height:45%; overflow-y: auto; ">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                          <h4 class="modal-title">Select Faculty and time </h4>
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                           
                                          </div>
                                          <div class="modal-body">
                                          <div class="modal-body">
                                              
                                                <form method="post" action="stu_tt_code.php" >
                                            <div class="form-group">
											Selected subject: <br>
											<input type="text" value="subject" name="<?php echo $arr[0]; ?>" hidden>
											<input type="text" value="<?php echo $arr[0]; ?>" name="subject" hidden>
											<?php echo $arr[0]; ?>
											<br>
											<br> 
                                            <label>  Select Faculty: </label>
                                                <select name="fac" onchange="showTime(this.value,'<?php echo $arr[0] ?>')">
                                                <option value="">Select faculty</option>
                                            <?php     
                                            $conn= mysqli_connect('localhost','root','');
                                            $db=mysqli_select_db($conn,'minor');
                                            if(!$conn)
                                            {
                                                 echo "Connection error";
                                            }

                                            $query = 'Select distinct tid from timetable where subject="'.$arr[0].'"';
                                            $query_run = mysqli_query($conn,$query);
                                            
                                            while($row = mysqli_fetch_assoc($query_run))
                                            {
                                                    echo "<option value='{$row['tid']}'>{$row['tid']}</option>";
                                                   
                                            } 
                                            ?>
                                            
                                               </select>
                                            </div>
      
        
                                            <div class="form-group">
                                                <div id="getTime">-</div>
                                                
                                            </div>
                                            
                                          <div class="modal-footer" style=" bottom: 0;">
                                           <?php
												   $f1=1;
										   $query="select * from student_timetable where sap='$sap' and subject='$arr[0]'";
                                           $query_r = mysqli_query($connection,$query);
										  if(mysqli_fetch_array($query_r))
                                 {
                                      $f1=0;
	 
                                     }
                                           /*      while($row=mysqli_fetch_assoc($r))
												 {
													 $f1=1;
												 }*/
											if($f1==1)
                                           echo ' <input type="submit" name="save" class="btn btn-primary" value="Save changes">
											';
											
											?>
											</form>
                                          </div>
                                        </div><!-- /.modal-content -->
                                      </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->  
                                      </div>
                                </div>
									                                        <!--modal2-->
                                    <div class="modal fade" id="<?php echo $arr[1]; ?>">
                                    <div class="modal-dialog" style="max-width:30%;height:45%; overflow-y: auto; ">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                          <h4 class="modal-title">Select Faculty and time </h4>
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                           
                                          </div>
                                          <div class="modal-body">
                                          <div class="modal-body">
                                              
                                          <form method="post" action="stu_tt_code.php" >
                                            <div class="form-group">
											Selected subject: <br>
											<input type="text" value="monday" name="day" hidden>
											<?php echo $arr[1]; ?>
											<br>
											<br> 
                                            <label>  Select Faculty: </label>
                                                <select name="fac" onchange="showTime2(this.value,'<?php echo $arr[1] ?>')">
                                                <option value="">Select faculty</option>
                                            <?php     
                                            

                                            $sql = 'Select distinct tid from timetable where subject="'.$arr[1].'"';
                                            $result = $conn->query($sql);
                                            
                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) {
                                                    echo "<option value=".$row['tid'].">". $row['tid']."</option>";
                                                   
                                                }
                                            } else {
                                                echo " ";
                                            }
                                            ?>
                                            
                                               </select>
                                            </div>
      
        
                                            <div class="form-group">
                                                <div id="getTime2">-</div>
                                                
                                            </div>
                                            
                                          <div class="modal-footer" style=" bottom: 0;">
                                           <input type="text" value="<?php echo $arr[1]; ?>" name="subject" hidden>
                                                   <?php
												   $f1=1;
										   $query="select * from student_timetable where sap='$sap' and subject='$arr[1]'";
                                           $query_r = mysqli_query($connection,$query);
										  if(mysqli_fetch_array($query_r))
                                 {
                                      $f1=0;
	 
                                     }
                                           /*      while($row=mysqli_fetch_assoc($r))
												 {
													 $f1=1;
												 }*/
											if($f1==1)
                                           echo ' <input type="submit" name="save" class="btn btn-primary" value="Save changes">
											';
											
											?>
											</form>
                                              </div>
                                        </div><!-- /.modal-content -->
                                      </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->  
                                      </div>
                                      </div>
									              
									                                        <!-- #modal 2 -->
                                    <div class="modal fade" id="<?php echo $arr[2]; ?>">
                                    <div class="modal-dialog" style="max-width:30%;height:45%; overflow-y: auto; ">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                          <h4 class="modal-title">Select Faculty and time </h4>
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                           
                                          </div>
                                          <div class="modal-body">
                                          <div class="modal-body">
                                              
                                          <form method="post" action="stu_tt_code.php" >
                                            <div class="form-group">
											Selected subject: <br>
											<input type="text" value="monday" name="day" hidden>
											<?php echo $arr[2]; ?>
											<br>
											<br> 
                                            <label>  Select Faculty: </label>
                                                <select name="fac" onchange="showTime3(this.value,'<?php echo $arr[2]; ?>')">
                                                <option value="">Select faculty</option>
                                            <?php     
                                            

                                            $sql = 'Select distinct tid from timetable where subject="'.$arr[2].'"';
                                            $result = $conn->query($sql);
                                            
                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) {
                                                    echo "<option value=".$row['tid'].">". $row['tid']."</option>";
                                                   
                                                }
                                            } else {
                                                echo " ";
                                            }
                                            ?>
                                            
                                               </select>
                                            </div>
      
        
                                            <div class="form-group">
                                                <div id="getTime3">-</div>
                                                
                                            </div>
                                            
                                          <div class="modal-footer" style=" bottom: 0;">
                                           
                                             <input type="text" value="<?php echo $arr[2]; ?>" name="subject" hidden>
                                                   <?php
												   $f1=1;
										   $query="select * from student_timetable where sap='$sap' and subject='$arr[2]'";
                                           $query_r = mysqli_query($connection,$query);
										  if(mysqli_fetch_array($query_r))
                                 {
                                      $f1=0;
	 
                                     }
                                           /*      while($row=mysqli_fetch_assoc($r))
												 {
													 $f1=1;
												 }*/
											if($f1==1)
                                           echo ' <input type="submit" name="save" class="btn btn-primary" value="Save changes">
											';
											
											?>
											</form>
                                          </div>
                                        </div><!-- /.modal-content -->
                                      </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->  
                                      </div>
                                      </div>
									              								                                        <!-- #modal 2 -->
                                    <div class="modal fade" id="<?php echo $arr[3]; ?>">
                                    <div class="modal-dialog" style="max-width:30%;height:45%; overflow-y: auto; ">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                          <h4 class="modal-title">Select Faculty and time </h4>
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                           
                                          </div>
                                          <div class="modal-body">
                                          <div class="modal-body">
                                              
                                          <form method="post" action="stu_tt_code.php" >
                                            <div class="form-group">
											Selected subject: <br>
											<input type="text" value="monday" name="day" hidden>
											<?php echo $arr[3]; ?>
											<br>
											<br> 
                                            <label>  Select Faculty: </label>
                                                <select name="fac" onchange="showTime4(this.value,'<?php echo $arr[3]; ?>')">
                                                <option value="">Select faculty</option>
                                            <?php     
                                            
                                            $sql = 'Select distinct tid from timetable where subject="'.$arr[3].'"';
                                            $result = $conn->query($sql);
                                            
                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) {
                                                    echo "<option value=".$row['tid'].">". $row['tid']."</option>";
                                                   
                                                }
                                            } else {
                                                echo " ";
                                            }
                                            ?>
                                            
                                               </select>
                                            </div>
      
        
                                            <div class="form-group">
                                                <div id="getTime4">-</div>
                                                
                                            </div>
                                            
                                          <div class="modal-footer" style=" bottom: 0;">
                                           
                                               <input type="text" value="<?php echo $arr[3]; ?>" name="subject" hidden>
                                                   <?php
												   $f1=1;
										   $query="select * from student_timetable where sap='$sap' and subject='$arr[3]'";
                                           $query_r = mysqli_query($connection,$query);
										  if(mysqli_fetch_array($query_r))
                                 {
                                      $f1=0;
	 
                                     }
                                           /*      while($row=mysqli_fetch_assoc($r))
												 {
													 $f1=1;
												 }*/
											if($f1==1)
                                           echo ' <input type="submit" name="save" class="btn btn-primary" value="Save changes">
											';
											
											?>
											</form>
                                          </div>
                                        </div><!-- /.modal-content -->
                                      </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->  
                                      </div>
</div>
									              
									  
									                                        <!-- #modal 2 -->
                                    <div class="modal fade" id="<?php echo $arr[4]; ?>">
                                    <div class="modal-dialog" style="max-width:30%;height:45%; overflow-y: auto; ">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                          <h4 class="modal-title">Select Faculty and time </h4>
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                           
                                          </div>
                                          <div class="modal-body">
                                          <div class="modal-body">
                                              
                                          <form method="post" action="stu_tt_code.php" >
                                            <div class="form-group">
											Selected subject: <br>
											<input type="text" value="monday" name="day" hidden>
											<?php echo $arr[4]; ?>
											<br>
											<br> 
                                            <label>  Select Faculty: </label>
                                                <select name="fac" onchange="showTime5(this.value,'<?php echo $arr[4]; ?>')">
                                                <option value="">Select faculty</option>
                                            <?php     
                                            

                                            $sql = 'Select distinct tid from timetable where subject="'.$arr[4].'"';
                                            $result = $conn->query($sql);
                                            
                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) {
                                                    echo "<option value=".$row['tid'].">". $row['tid']."</option>";
                                                   
                                                }
                                            } else {
                                                echo " ";
                                            }
                                            ?>
                                            
                                               </select>
                                            </div>
      
        
                                            <div class="form-group">
                                                <div id="getTime5">-</div>
                                                
                                            </div>
                                            
                                          <div class="modal-footer" style=" bottom: 0;">
                                           
                                               <input type="text" value="<?php echo $arr[4]; ?>" name="subject" hidden>
                                                   <?php
												   $f1=1;
										   $query="select * from student_timetable where sap='$sap' and subject='$arr[4]'";
                                           $query_r = mysqli_query($connection,$query);
										  if(mysqli_fetch_array($query_r))
                                 {
                                      $f1=0;
	 
                                     }
                                           /*      while($row=mysqli_fetch_assoc($r))
												 {
													 $f1=1;
												 }*/
											if($f1==1)
                                           echo ' <input type="submit" name="save" class="btn btn-primary" value="Save changes">
											';
											
											?>
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
						
                    </div>
                </div>
            
        </div>
        <!-- Main Content end-->
    </div>
    

   

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

</body>

</html>
