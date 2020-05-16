<?php
$connection= mysqli_connect('localhost','root','');
mysqli_select_db($connection,'minor');
$flag=1;
$a=rand(1,2);
$query="select count(name) from faculty";
$r=mysqli_query($connection, $query);
while($row=mysqli_fetch_assoc($r))
{
$x=$row["count(name)"];
}
$query="select count(name) from faculty where flag=0";
$r=mysqli_query($connection, $query);
while($row=mysqli_fetch_assoc($r))
{
$y=$row["count(name)"];
}


/*



*/
if($x==$y)
{
$query="select email from faculty where id%2='$a'";
$r=mysqli_query($connection, $query);
while($row=mysqli_fetch_assoc($r))
{
	$n=$row["email"];
	$headers = 'From: php.mailing.test@gmail.com' . "\r\n" . 
           'MIME-Version: 1.0' . "\r\n" .
           'Content-Type: text/html; charset=utf-8';
$token=rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9);

$q="update faculty set token='$token' where email='$n'";
mysqli_query($connection, $q);
$q="update faculty set flag='$flag'  where email='$n'";
mysqli_query($connection, $q);
mail("$n", "Token", "Token Generated: $token", $headers);
}
}
else
{
	
	
$query="select email from faculty where flag=0";
$r=mysqli_query($connection, $query);
while($row=mysqli_fetch_assoc($r))
{
	$n=$row["email"];
	$headers = 'From: php.mailing.test@gmail.com' . "\r\n" . 
           'MIME-Version: 1.0' . "\r\n" .
           'Content-Type: text/html; charset=utf-8';
$token=rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9);
$q="update faculty set token='$token'  where email='$n'";
mysqli_query($connection, $q);
$q="update faculty set flag='$flag'  where email='$n'";
mysqli_query($connection, $q);
mail("$n", "Token", "Token Generated: $token", $headers);

}
header('Location:registerFaculty.php');
}
?>