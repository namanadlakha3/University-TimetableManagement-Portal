<?php 
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">
      <div class="modal-body">
        <div class="form-group">
            <label> Username </label>
            <input type="text" name="username" class="form-control" placeholder="Enter Username" required />
        </div>
       
        <div class="form-group">
            <label> Password </label>
            <input type="password" name="password" class="form-control" placeholder="Enter Password" required />
        </div>
        <div class="form-group">
            <label> Confirm Passowrd </label>
            <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm password" required />
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="registerbtn" class="btn btn-primary" >Save</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="container-fluid">
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Admin Profile
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile"> 
  Add Admin Profile
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
        $query="select * from admin";
        $result=mysqli_query($connection,$query);
      ?>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Password</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php
                while($row= mysqli_fetch_assoc($result))
                {
             ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['password']; ?></td>
                    
                    <td>
                    <form action="editCode.php" method="POST">
                    <input type="hidden" name="edit_user" value="<?php echo $row['username']; ?>" />
                    <button type="submit"name="edit_btn" class="btn btn-success">EDIT</button>
                    </form>
                    </td>
                    <form action="deleteCode.php" method="POST">
                    <input type="hidden" name="edit_user" value="<?php echo $row['username']; ?>" />
                    <td><button type="submit" name="delete_btn" class="btn btn-danger">DELETE</button></td>
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