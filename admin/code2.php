<?php
include('security.php');
$connection= mysqli_connect('localhost','root','');
$db=mysqli_select_db($connection,'minor');
if(!$connection)
{
    echo "Connection error";
}

if(isset($_POST['login_btn']))
{
    $username= $_POST['username'];
    $password=$_POST['password'];
    echo "saved";
    $query="select * from admin where username='$username' AND password='$password'";
    $query_run = mysqli_query($connection,$query);
    
    if(mysqli_fetch_array($query_run))
    {
        $_SESSION['username'] = $username;
        header('Location: index.php');
    }
    else
    {
        $_SESSION['status']= 'Email ID or Password is invalid';
        header('Location: login.php');
    }

}

?>