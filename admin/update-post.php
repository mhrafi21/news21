<?php include "header.php";

if ($_SESSION['role'] == '0') {
  header("location: post.php");
}

?>
<div id="admin-content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="admin-heading">Update Post</h1>
      </div>
      <div class="col-md-offset-3 col-md-6">
        <!-- Form for show edit-->

        <?php
        include("config.php");
        $updateId = $_GET['updateId'];

        $query4 = "SELECT * FROM post
        LEFT JOIN category ON post.post_category = category.category_name
        LEFT JOIN user ON post.author = user.user
        WHERE post.post_id = {$updateId}

        ";
        $result4 = mysqli_query($connection, $query4);
        if (mysqli_num_rows($result4)  > 0) {
          while ($rows = mysqli_fetch_assoc($result4)) {


        ?>




            <form action="save-update-post.php" method="POST" enctype="multipart/form-data" autocomplete="off">
              <div class="form-group">
                <input type="hidden" name="post_id" class="form-control" value="<?php echo $rows['post_id'] ?>" placeholder="">
              </div>
              <div class="form-group">
                <label for="exampleInputTile">Title</label>
                <input type="text" name="post_title" class="form-control" id="exampleInputUsername" value="<?php echo $rows['post_title'] ?>">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1"> Description</label>
                <textarea name="post_desc" class="form-control" required rows="5">
              <?php echo $rows['post_desc'] ?>
                </textarea>
              </div>
              <div class="form-group">
                <label for="exampleInputCategory">Category</label>
                <select class="form-control" name="category">
                  <option disabled selected>selected category</option>

                  <?php
                  include("config.php");
                  $query6 = "SELECT * FROM category";
                  $result6 = mysqli_query($connection, $query6) or die("not connected");
                  if (mysqli_num_rows($result6)  > 0) {
                    while ($rows6 = mysqli_fetch_assoc($result6)) {
                      if($rows['post_category'] == $rows6 ['id']){
                        $selected = "selected";
                      }else{
                        $selected = '';
                      }
                      echo "<option {$selected} value='{$rows6['id']}'>{$rows6['category_name']}</option>";
                    }
                  }
                  ?>

                </select>







                <input type="hidden" name="old_category" value = <?php echo $rows['post_category']?>/>
              </div>
              <div class="form-group">
                <label for="">Post image</label>
                <input type="file" value="new_imag">
                <img src="upload/<?php echo $rows['post_image'] ?>" name = "new_image" height="50%" width="50%">
                <input type="hidden" name = "old_image" value="<?php echo $rows['post_image']?>" >
              </div>
              <input type="submit" name="submit" class="btn btn-primary" value="Update" />
            </form>
        <?php
          }
        } ?>
        <!-- Form End -->
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>