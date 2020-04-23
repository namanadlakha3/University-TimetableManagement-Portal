<?php
    session_start();

    if(!$_SESSION['username'])
    {
        header('Location:facultyLogin.php');
    }
?>