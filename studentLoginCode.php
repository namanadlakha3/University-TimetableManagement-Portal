<?php
session_start();
$connection= mysqli_connect('localhost','root','');
$db=mysqli_select_db($connection,'minor');
if(!$connection)
{
    echo "Connection error";
}

if(isset($_POST['login_btn']))
{
    $sap= $_POST['sap'];
    $password=$_POST['password'];
    echo "saved";
    $query="select * from students where Sap='$sap' AND Password='$password'";
    $query_run = mysqli_query($connection,$query);
    
    if(mysqli_fetch_array($query_run))
    {
        $_SESSION['sap'] = $sap;
        header('Location: student.php');
    }
    else
    {
        $_SESSION['status']= 'Email ID or Password is invalid';
        header('Location: index.php');
    }

}

?>