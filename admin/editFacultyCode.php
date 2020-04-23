<?php 
include('includes/header.php');
include('includes/navbar.php');
$connection= mysqli_connect('localhost','root','');
$db=mysqli_select_db($connection,'minor');
if(!$connection)
{
    echo "Connection error";
}

if(isset($_POST['edit_btn']))
{
    $user = $_POST['edit_user'];
    $query="select * from faculty where username='$user'";
    $query_run = mysqli_query($connection,$query);
    
    while($row = mysqli_fetch_assoc($query_run))
    {

        ?>
        <div class="container-fluid">
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Edit Faculty Profile</h6>
    <form action="updateFacultyCode.php" method="POST">
    <input type="hidden" name="edit_user" value="<?php echo $row['Username']; ?>" />
    <div class="form-group">
        <label> Username </label>
        <input type="text" name="edit_username" class="form-control" value="<?php echo $row['Username']?>" required />
    </div>
    
    <div class="form-group">
        <label> Password </label>
        <input type="password" name="edit_password" class="form-control" value="<?php echo $row['Password']?>" required />
    </div>
    <a href="register.php" class="btn btn-danger">Cancel</a>
      <button type="submit" name="update_btn" class="btn btn-primary" >Update</button>
    </form>
    </div>
    </div>
    </div>
<?php
    }
}
    
?>
 
    

<?php include('includes/scripts.php'); ?>
