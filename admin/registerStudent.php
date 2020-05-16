<?php 
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>
 
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Register New Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	 
      <form action="registerStudentCode.php" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
      <div class="form-group">
            <label> Sap </label>
            <input type="text" name="sap" class="form-control" placeholder="Enter Sap" required />
        </div>
        <div class="form-group">
            <label> First Name </label>
            <input type="text" name="fname" class="form-control" placeholder="Enter First Name" required />
        </div>
		<div class="form-group">
            <label> Last Name </label>
            <input type="text" name="lname" class="form-control" placeholder="Enter Last Name" required />
        </div>
       
        <div class="form-group">
            <label> Roll No. </label>
            <input type="text" name="rollno" class="form-control" placeholder="Enter Roll No." required />
        </div>
      
        <div class="form-group">
            <label> Branch </label>
            <input type="text" name="branch" class="form-control" placeholder="Enter Branch" required />
        </div>
    <div class="form-group">
            <label> Year </label>
            <input type="text" name="year" class="form-control" placeholder="Enter Year" required />
        </div>
        
        <div class="form-group">
            <label> Email </label>
            <input type="email" name="email" class="form-control" placeholder="Enter Email" required />
		</div>	
		<div class="form-group">
            <label> Phone No. </label>
            <input type="text" name="phone" class="form-control" placeholder="Enter Phone No." required />
        </div>
		<div class="form-group">
            <label> Password </label>
            <input type="password" name="password" class="form-control" placeholder="Enter Password" required />
        
		
       <br>     <label>
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
    <h6 class="m-0 font-weight-bold text-primary">Student Registration
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile"> 
  Register New Student
</button>
    </h6>
</div>
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
        $query="select * from students";
        $result=mysqli_query($connection,$query);
      ?>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Sap</th>
                <th>FirstName</th>
                <th>LastName</th>
                <th>Rollno</th>
                <th>Branch</th>
                <th>Year</th>
                <th>Email</th>
                <th>Image</th>
                <th>Password</th>
            </tr>
            </thead>
            <tbody>
            <?php
                while($row= mysqli_fetch_assoc($result))
                {
             ?>
                <tr>
                    <td><?php echo $row['Sap']; ?></td>
                    <td><?php echo $row['FirstName']; ?></td>
                    <td><?php echo $row['LastName']; ?></td>
                    <td><?php echo $row['Rollno']; ?></td>
                    <td><?php echo $row['Branch']; ?></td>
                    <td><?php echo $row['Year']; ?></td>
                    <td><?php echo $row['Email']; ?></td>
					<td><?php echo $row['Image']; ?></td>
					<td><?php echo $row['Password']; ?></td>
                   
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