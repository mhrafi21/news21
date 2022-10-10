<?php include "header.php"; ?>

<div id="admin-content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="adin-heading"> Update Category</h1>
      </div>
      <div class="col-md-offset-3 col-md-6">
        <!-- form -->



        <?php
        include("config.php");
        $update_id = $_GET['id'];

        $query = "SELECT * FROM category WHERE id ={$update_id}";
        $result = mysqli_query($connection, $query);
        if (mysqli_num_rows($result) > 0) {
          while ($rows = mysqli_fetch_assoc($result)) {

        ?>
            <form action="" method="POST">
              <div class="form-group">
                <input type="hidden" name="category_id" class="form-control" value='<?php echo $rows['id']?>' placeholder="">
              </div>
              <div class="form-group">
                <label>Category Name</label>
                <input type="text" name="category_name" class="form-control" value="<?php echo $rows['category_name']; ?>" placeholder="" required>
              </div>
              <input type="submit" name="update" class="btn btn-primary" value="Update" required />
            </form>
        <?php }
        } ?>
        <!-- update -->
        <?php
       
       

        if (isset($_POST['update'])) {
          $query2 = "UPDATE category SET category_name='$_POST[category_name]' WHERE id = '{$update_id}'";
          $result2 = mysqli_query($connection,$query2) or die("not connected!");
          if($result2){
            header("location: category.php");
          }


        }


        ?>

      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>