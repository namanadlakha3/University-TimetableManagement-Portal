<?php
include('security.php');
$connection= mysqli_connect('localhost','root','');
if(!$connection)
{
    echo "Connection error";
}
if(mysqli_select_db($connection,'minor'))
{
    $username=$_POST['username'];
    $pwd=$_POST['password'];
    $cpwd=$_POST['confirmpassword'];
    echo "saved";
    $_SESSION['success']="Admin Profile Added";
    header('Location: register.php');
    if($pwd===$cpwd)
    {
        $query="insert into admin (username, password) values ('$username','$pwd')"; 
        if(mysqli_query($connection, $query))
        {
            echo "saved";
            $_SESSION['success']="Admin Profile Added";
            header('refresh:2; url:register.php');
        }
        else
        {
            echo "error inserting data";
            $_SESSION['success']="Admin Profile Not Added";
            header('Location: register.php');
    
        }
    }
    else
    {
        $_SESSION['success']="Password and Confirm Password do not match";
        header('Location:register.php');
    }
    
}

if(isset($_POST['login_btn']))
{
    $connection= mysqli_connect('localhost','root','');
    if(!$connection)
    {
        echo "Connection error";
    }
    if(mysqli_select_db($connection,'minor'))
    {
        $username= $_POST['username'];
        $password=$_POST['password'];
        echo "saved";
        $query="select * from admin where username='$username' AND password='$password'";
        $query_run = mysqli_query($connection,$query);
        
        if(mysqli_fetch_array($query_run))
        {
            $_SESSION['username'] = username;
            header('Location: index.php');
        }
        else
        {
            $_SESSION['status']= 'Email ID or Password is invalid';
            header('Location: login.php');
        }

    }
}


?>