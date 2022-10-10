<?php include "header.php"; ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Add New Post</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form -->
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="post_title">Title</label>
                        <input type="text" name="post_title" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"> Description</label>
                        <textarea name="post_desc" class="form-control" rows="5" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Category</label>
                        <select name="category" class="form-control">
                            <option disabled selected> Select Category</option>
                            <?php
                            include("config.php");
                            $query4 = "SELECT * FROM category";
                            $result4 = mysqli_query($connection, $query4);

                            if (mysqli_num_rows($result4) > 0) {
                                while ($row = mysqli_fetch_assoc($result4)) {

                                    $ctg_name =  $row['category_name'];
                                    $ctg_id =  $row['id'];

                                    echo "<option value='{$ctg_id}'>{$row['category_name']}</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Post image</label>
                        <input type="file" name="fileToUpload" required>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                </form>
                <!--/Form -->
                <?php
                if (isset($_POST['submit'])) {

                    include("config.php");
                    if (isset($_FILES['fileToUpload'])) {
                        $error = array();
                        $file_name = $_FILES['fileToUpload']['name'];
                        $file_size = $_FILES['fileToUpload']['size'];
                        $tmp_name = $_FILES['fileToUpload']['tmp_name'];
                        $file_type = $_FILES['fileToUpload']['type'];
                        $file_ext = end(explode('.', $file_name));

                        $extension = array('jpg', 'jpeg', 'png');

                        if (in_array($file_ext, $extension) == false) {
                            echo $error[] = "This file format is not allowed , Please try jpg,png and jpeg";
                        }
                        if ($file_size > 2000000) {
                            $error = "This file is too big, try within 2MB!";
                        }

                        $new_name  = date("d-M-Y") . "-" . basename($file_name);
                        $target  = "upload/" . $new_name;
                        if (empty($error) == true) {
                            move_uploaded_file($tmp_name, $target);
                        }
                    }
                    $post_title = $_POST['post_title'];
                    $post_des = $_POST['post_desc'];
                    $post_category = $_POST['category'];
                    $post_time = date("d-M-Y");

                    $author = $_SESSION['id'];

                    $query1 = "INSERT INTO post(post_title,post_desc,post_category,post_image,post_date,author) VALUES('{$post_title}','{$post_des}' , '{$post_category}' , '{$new_name}' , '{$post_time}' , '{$author}');";
                    $result1 .= "UPDATE category SET post = post + 1 WHERE id = {$post_category}";
                    $result1 = mysqli_multi_query($connection, $query1) or die("errors");

                    if ($result1) {
                        header("location: post.php");
                    }
                }
                ?>

            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>