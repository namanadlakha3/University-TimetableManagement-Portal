
<?php
$connection= mysqli_connect('localhost','root','');
mysqli_select_db($connection,'minor');

?>



<?php
include('security.php');

if(!$connection)
{
    echo "Connection error";
}

if(mysqli_select_db($connection,'minor') )
{
    $targetDir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
    $sap=$_POST['sap'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $rollno=$_POST['rollno'];
    $branch=$_POST['branch'];
    $year=$_POST['year'];
    $email=$_POST['email'];
	$phone=$_POST['phone'];
	$pwd=$_POST['password'];
	
	
    echo "saved";
    $_SESSION['success']="Student Added";
    header('Location: registerStudent.php');
    if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath));
    
       

        // Upload file to server
       
        $query="insert into students (Sap, FirstName, LastName, Rollno, Branch, Year, Email, Phoneno, Image, Password) values ('$sap','$fname','$lname','$rollno','$branch','$year','$email','$phone','$fileName','$pwd')"; 
       
        if(mysqli_query($connection, $query))
        {
            echo "saved";
            $_SESSION['success']="Student Added";
            header('refresh:2; url:registerStudent.php');
        }
    
        else
        {
            echo "error inserting data";
            $_SESSION['success']="Student Not Added";
            header('Location: registerStudent.php');
    
        }
    
  
    
}


?>