<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
$fac=$_GET["q"];
$sub = $_GET["q2"];
$con = mysqli_connect('localhost','root','');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"minor");
$sql="SELECT day,time,room FROM timetable WHERE tid = '".$fac."' and subject='".$sub."'";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>Day</th>
<th>Time</th>
<th>Room No.</th>

</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['day'] . "</td>";
  echo "<td>" . $row['time'] . "</td>";
  echo "<td>" . $row['room'] . "</td>";
 
  echo "</tr>";
}
$sql="SELECT counter FROM faculty WHERE username = '$fac' and subject1='$sub'";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)) {
  
echo "<table>
<tr>
<th>Slot:</th>


</tr>";
  echo "<td>" . $row['counter'] . "</td>";
 
  
}
$sql="SELECT counter FROM faculty WHERE username = '$fac' and subject2='$sub'";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)) {
 

echo "<table>
<tr>
<th>Slot:</th>


</tr>";
  echo "<td>" . $row['counter'] . "</td>";
 
 

}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>