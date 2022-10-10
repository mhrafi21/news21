<?php include "header.php";
?>
<?php
if ($_SESSION['role'] == '0') {
    header("location: post.php");
}
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Users</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-user.php">add user</a>
            </div>
            <div class="col-md-12">
                <table class="content-table">
                    <thead>
                        <th>DB ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>User Name</th>
                        <th>Role</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        <?php
                        include('config.php');
                        $limit = 7;
                        if (isset($_GET['page'])) {
                            $page_number = $_GET['page'];
                        }else{
                            $page_number = 1;
                        }
                        $offset  = ( $page_number - 1 ) * $limit;
                        $query = "SELECT * FROM user ORDER BY id ASC LIMIT {$offset},{$limit}";
                        $result = mysqli_query($connection, $query);
                        $count = mysqli_num_rows($result);
                        if ($count > 0) {
                            while ($row = mysqli_fetch_assoc($result)){
                                $id = $row['id'];
                                $fname = $row['first_name'];
                                $lname = $row['last_name'];
                                $user = $row['user'];
                                $pass = $row['pass'];
                                $role = $row['role'];
                        ?>
                                <tr>
                                    <td class='id'><?php echo $id ?></td>
                                    <td><?php echo $fname ?></td>
                                    <td><?php echo $lname ?></td>
                                    <td><?php echo $user ?> </td>
                                    <td>
                                        <?php if ($role == '1') {
                                            echo "Admin";
                                        } else {
                                            echo "Moderator";
                                        }
                                        ?> </td>
                                    <td class='edit'><a href='update-user.php?id=<?php echo $id ?>'><i class='fa fa-edit'></i></a></td>
                                    <td class='delete'><a onclick=" return confirm('Are you confirm?')" href='delete-user.php?id=<?php echo $id ?>'><i class='fa fa-trash-o'></i></a></td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>

                <?php
                include("config.php");
                $limit = 3;
                $query3 = "SELECT * FROM user";
                $result3 = mysqli_query($connection, $query);
                if (mysqli_num_rows($result3)) {
                    echo "<ul class='pagination admin-pagination'>";
                    $total_records = mysqli_num_rows($result3);
                    $total_pages  = ceil($total_records / $limit);
                    if($page_number  > 1){
                        echo '<li><a href = "users.php?page='.($page_number - 1).' ">pre</a></li>';

                    };
                    for($i = 1; $i <= $total_pages; $i++ ){
                        if($i == $page_number){
                            $active = 'active';
                        }else{
                            $active= '';
                        }
                        echo '<li class ='.$active.'><a href = "users.php?page='.$i.'">'.$i.'</a></li>';
                    }
                    echo '<li><a href = "users.php?page='.($page_number + 1).'" >next</a></li>';
                    echo "</ul>";
                }
               
                ?>
                <!-- <li class="active"><a>1</a></li> -->
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>