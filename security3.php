<?php
    session_start();

    if(!$_SESSION['sap'])
    {
        header('Location:index.php');
    }
?>