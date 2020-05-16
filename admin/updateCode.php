<?php
include('security.php');
$connection= mysqli_connect('localhost','root','');
if(!$connection)
{
    echo "Connection error";
}
$db=mysqli_select_db($connection,'minor');

if(isset($_POST['update_btn']))
{
   
        $username=$_POST['edit_username'];
        $password=$_POST['edit_password'];  
        $user = $_POST['edit_user'];
        $query="update admin set username='$username',password='$password' where username='$user'";
        $result=mysqli_query($connection,$query);
        if($result)
        {
            $_SESSION['success'] = "Your data is updated";
            header('Location: register.php');
        }
        else
        {
            $_SESSION['success'] = "Your data is not updated";
            header('Location: register.php');
        }
        
}

?>