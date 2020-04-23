<?php
include('security.php');
$connection= mysqli_connect('localhost','root','');
if(!$connection)
{
    echo "Connection error";
}
$db=mysqli_select_db($connection,'minor');
if(isset($_POST['delete_btn']))
{
    $user = $_POST['edit_user'];
    $query="delete from admin where username='$user'";
    $result=mysqli_query($connection,$query);
    if($result)
    {
        $_SESSION['success'] = "Your data is deleted";
        header('Location: register.php');
    }
    else
    {
        $_SESSION['success'] = "Your data is not deleted";
        header('Location: register.php');
    }
}
?>