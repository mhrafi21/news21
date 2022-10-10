<?php include "header.php";
?>

<?php
// update user info
$updateId = $_GET['id'];

if (isset($_POST['update'])) {

    include("config.php");

    $fname  = mysqli_real_escape_string($connection,$_POST['fname']);
    $lname  = mysqli_real_escape_string($connection,$_POST['lname']);
    $user  = mysqli_real_escape_string($connection,$_POST['user']);
    $role  = mysqli_real_escape_string($connection,$_POST['role']);
    

    $query2 = "UPDATE user SET  
    first_name = '$fname', 
    last_name = '$lname',
    user = '$user',
    role = '$role'
     WHERE id = {$updateId}" ;
    $result2 = mysqli_query($connection,$query2);
    if($result2 == true){
        header("location: users.php");
    }
}
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Modify User Details</h1>
            </div>
            <div class="col-md-offset-4 col-md-4">
                <!-- Form Start -->

                <?php
                include('config.php');
                $user_id = $_GET['id'];
                $query = "SELECT * FROM user WHERE id = {$user_id}";
                $result = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($result)) {


                ?>
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                        <div class="form-group">
                            <input type="hidden" name="id" class="form-control" value="<?php echo $row['id'] ?>" placeholder="">
                        </div>
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="fname" class="form-control" value="<?php echo $row['first_name'] ?>" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="lname" class="form-control" value="<?php echo $row['last_name'] ?>" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" name="user" class="form-control" value="<?php echo $row['user'] ?>" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label>User Role</label>
                            <select class="form-control" name="role" value="">

                                <?php
                                if ($row['role'] == 1) {
                                    echo "<option value='0'>Moderator</option>
                                 <option value='1' selected>Admin</option>";
                                } else {
                                    echo "<option value='0' selected>Moderator</option>
                                  <option value='1'>Admin</option>";
                                }
                                ?>

                            </select>
                        </div>
                        <input type="submit" name="update" class="btn btn-primary" value="Update" required />
                    </form>

                <?php } ?>
                <!-- /Form -->

            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>