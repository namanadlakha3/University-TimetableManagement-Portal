
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
    $name=$_POST['name'];
    $username=$_POST['username'];
    $pwd=$_POST['password'];
  // $token=rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9);
    $cpwd=$_POST['confirmpassword'];
    $designation=$_POST['designation'];
    $contact=$_POST['contact'];
    $email=$_POST['email'];
    $subject=[];
	$c1=4;
	$c2=4;
	$flag=0;
    if(!empty($_POST['sub'])){
        $cnt=0;
        foreach($_POST['sub'] as $selected){
            $subject[$cnt]=$selected;
            $cnt++;
         }
        }
		if($cnt==1)
			$c2=0;
    echo "saved";
    $_SESSION['success']="Faculty Added";
    header('Location: registerFaculty.php');
    if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath));
    if($pwd===$cpwd  )
    {
       
      $status=0;
        // Upload file to server
        
        $query="insert into faculty (Name, Username, Password,  Designation, Contact, Email,Subject1, Subject2,Img,c1,c2,status,flag) values ('$name','$username','$pwd','$designation','$contact','$email','$subject[0]','$subject[1]','$fileName','$c1','$c2','$status','$flag')"; 
        
        if(mysqli_query($connection, $query))
        {
            echo "saved";
            $_SESSION['success']="Faculty Added";
            header('refresh:2; url:registerFaculty.php');
        }
    
        else
        {
            echo "error inserting data";
            $_SESSION['success']="Faculty Not Added";
            header('Location: registerFaculty.php');
    
        }
    }
    else
    {
        $_SESSION['success']="Password and Confirm Password do not match";
        header('Location:register.php');
    }
    
}


?>