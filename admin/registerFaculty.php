<?php 
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Register New Faculty</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="registerFacultyCode.php" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
      <div class="form-group">
            <label> Name </label>
            <input type="text" name="name" class="form-control" placeholder="Enter Name" required />
        </div>
        <div class="form-group">
            <label> Username </label>
            <input type="text" name="username" class="form-control" placeholder="Enter Username" required />
        </div>
       
        <div class="form-group">
            <label> Password </label>
            <input type="password" name="password" class="form-control" placeholder="Enter Password" required />
        </div>
        <div class="form-group">
            <label> Confirm Password </label>
            <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm password" required />
        </div>
     
        <div class="form-group">
      <label>  Designation: </label>
<select name="designation">
  <option value="Professor">Professor</option>
  <option value="Assoc. Professor">Associate professor</option> <br>
  </select>
        </div>
        <div class="form-group">
            <label> Contact </label>
            <input type="text" name="contact" class="form-control" placeholder="Enter Contact" required />
        </div>
        <div class="form-group">
            <label> Email </label>
            <input type="email" name="email" class="form-control" placeholder="Enter Email" required />
       <br>    </div>
       <div class="form-group">
            <label> Subjects </label><br>
            <input type="checkbox"  name="sub[]" value="Basic-Electronics">Basic Electronics<br>
            <input type="checkbox" name="sub[]" value="Programming-and-Data-Structures">Programming and Data Structures<br>
            <input type="checkbox" name="sub[]" value="Physics">Physics<br>
            <input type="checkbox" name="sub[]" value="Chemistry">Chemistry<br>
            <input type="checkbox"  name="sub[]" value="Mathematics-1">Mathematics-1<br>
            <input type="checkbox"  name="sub[]" value="Database-Management-Systems">Database Management Systems<br>
            <input type="checkbox" name="sub[]" value="Introduction-to-IT-infrastructure">Introduction to IT infrastructure<br>
            <br>
        </div> 
        <div class="form-group">
        <label>
      Select Image File to Upload:</label> <br>
    <input type="file" name="file">
        </div>
        
      </div>
   
      <div class="modal-footer">
        <input type="submit" name="submit" class="btn btn-primary" value="Submit" >
      </div>
      </form>
    </div>
  </div>
</div>

<div class="container-fluid">
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Faculty Registration
	<br>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile"> 
  Register New Faculty
</button>
<br>
<br>
<form method="POST" action='hit.php'>
  <input type="submit" value="Generate Token" class="btn btn-primary" data-toggle="modal" > 

</button>
</form>

    </h6>
</div>
<div class="card-body">
<div class="card-body">

<?php
  if(isset($_SESSION['success']) && $_SESSION['success'] != '')
  {
    echo '<h3> '.$_SESSION['success'].' </h3>';
    unset($_SESSION['success']);
  }
?>
    <div class="table-responsive">
      <?php
        $connection= mysqli_connect('localhost','root','');
        mysqli_select_db($connection,'minor');
		$flag=1;
        $query="select * from faculty where flag='$flag'";
        $result=mysqli_query($connection,$query);
      ?>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Password</th>
                <th>Token</th>
                <th>Designation</th>
                <th>Contact</th>
                <th>Email</th>
              
            </tr>
            </thead>
            <tbody>
            <?php
                while($row= mysqli_fetch_assoc($result))
                {
             ?>
                <tr>
                    <td><?php echo $row['Name']; ?></td>
                    <td><?php echo $row['Username']; ?></td>
                    <td><?php echo $row['Password']; ?></td>
                    <td><?php echo $row['Token']; ?></td>
                    <td><?php echo $row['Designation']; ?></td>
                    <td><?php echo $row['Contact']; ?></td>
                    <td><?php echo $row['Email']; ?></td>
                    <td>
                    <form action="editFacultyCode.php" method="POST">
                    <input type="hidden" name="edit_user" value="<?php echo $row['username']; ?>" />
                   
                    </form>
                    </td>
                    <form action="deleteFacultyCode.php" method="POST">
                    <input type="hidden" name="edit_user" value="<?php echo $row['username']; ?>" />
                
                </form>
                </tr>
             <?php    
                }
            ?>
            </tbody>
        </table>

        </div>
</div>
Faculties left:
<div class="card-body">

<?php
  if(isset($_SESSION['success']) && $_SESSION['success'] != '')
  {
    echo '<h3> '.$_SESSION['success'].' </h3>';
    unset($_SESSION['success']);
  }
?>
    <div class="table-responsive">
      <?php
        $connection= mysqli_connect('localhost','root','');
        mysqli_select_db($connection,'minor');
		$flag=0;
        $query="select * from faculty where flag='$flag'";
        $result=mysqli_query($connection,$query);
      ?>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Password</th>
                <th>Token</th>
                <th>Designation</th>
                <th>Contact</th>
                <th>Email</th>
           
            </tr>
            </thead>
            <tbody>
            <?php
                while($row= mysqli_fetch_assoc($result))
                {
             ?>
                <tr>
                    <td><?php echo $row['Name']; ?></td>
                    <td><?php echo $row['Username']; ?></td>
                    <td><?php echo $row['Password']; ?></td>
                    <td><?php echo $row['Token']; ?></td>
                    <td><?php echo $row['Designation']; ?></td>
                    <td><?php echo $row['Contact']; ?></td>
                    <td><?php echo $row['Email']; ?></td>
                    <td>
                    <form action="editFacultyCode.php" method="POST">
                    <input type="hidden" name="edit_user" value="<?php echo $row['username']; ?>" />
       
                    </form>
                    </td>
                    <form action="deleteFacultyCode.php" method="POST">
                    <input type="hidden" name="edit_user" value="<?php echo $row['username']; ?>" />
                
                </form>
                </tr>
             <?php    
                }
            ?>
            </tbody>
        </table>

        </div>
</div>
</div>

<?php include('includes/scripts.php'); ?>
 <?php include('includes/footer.php'); ?>