<?php include "header.php"; ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Add User</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">

                <!-- Form Start -->
                <?php
                if (isset($_POST['submit'])) {

                    include('config.php');

                    $fname = mysqli_real_escape_string($connection,$_POST['fname']);
                    $lname = mysqli_real_escape_string($connection,$_POST['lname']);
                    $user = mysqli_real_escape_string($connection,$_POST['user']);
                    $pass = mysqli_real_escape_string($connection,$_POST['pass']);
                    $rule = mysqli_real_escape_string($connection,$_POST['role']);

                    $query = "INSERT INTO user(first_name,last_name,user,pass,role) VALUES('$fname','$lname','$user','$pass','$rule')";
                    $result = mysqli_query($connection, $query);
                    if ($result) {
                        header('location: users.php');
                    }
                }

                ?>

                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                    </div>
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" name="user" class="form-control" placeholder="Username" required>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="pass" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label>User Role</label>
                        <select class="form-control" name="role">
                            <option value="0">Moderator</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Add" required />
                </form>
                <!-- Form End-->
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>