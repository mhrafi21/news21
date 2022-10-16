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
        <h1 class="admin-heading">All Categories</h1>
      </div>
      <div class="col-md-2">
        <a class="add-new" href="add-category.php">add category</a>
      </div>
      <div class="col-md-12">



        <table class="content-table">
          <thead>
            <th>S.No.</th>
            <th>Category Name</th>
            <th>No. of Posts</th>
            <th>Edit</th>
            <th>Delete</th>
          </thead>
          <tbody>
            <?php
            $serial = 1;
            include("config.php");
            $query2 = "SELECT * FROM category";
            $result2 = mysqli_query($connection, $query2);
            if (mysqli_num_rows($result2)) {
              while ($row = mysqli_fetch_assoc($result2)) {
                $category_id= $row['id'];
                $category_name = $row['category_name'];
              
          

            ?>

            <tr>
              <td class='id'><?php echo $serial++?></td>
              <td><?php echo $category_name?></td>
              <td><?php echo $row['post']?></td>


              <td class='edit'><a href='update-category.php?id=<?php echo $category_id?>'><i class='fa fa-edit'></i></a></td>


              <td class='delete'><a onclick = "return confirm('Are you confirm?')" href='delete-category.php?id=<?php echo $category_id?>'><i class='fa fa-trash-o'></i></a></td>


            </tr>
              <?php } } ?>


          </tbody>

        </table>


      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>