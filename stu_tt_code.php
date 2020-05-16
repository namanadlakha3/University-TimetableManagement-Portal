<?php
session_start();
$sap=$_SESSION['sap'];
$connection= mysqli_connect('localhost','root','');
$db=mysqli_select_db($connection,'minor');
if(!$connection)
{
    echo "Connection error";
}

if(isset($_POST['save']))
{
    
$subject=$_POST['subject'];
$fac=$_POST['fac'];
echo $subject.$fac.$sub;
$query="select * from timetable where tid='$fac' and subject='$subject'";
$r=mysqli_query($connection, $query);
while($row=mysqli_fetch_assoc($r))
{
	
	$time=$row['time'];
	$room=$row['room'];
	$day=$row['day'];
	$q="insert into student_timetable (sap,tid,day,time,room,subject) values ('$sap','$fac','$day','$time','$room','$subject')";
mysqli_query($connection, $q);

}
$q="update faculty set counter=counter-1 where username='$fac'";
mysqli_query($connection, $q);
//echo $fac;

header('Location:student_tt.php');
}

?>