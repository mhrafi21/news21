 <?php include "header.php";
    ?>

 <div id="admin-content">
     <div class="container">
         <div class="row">
             <div class="col-md-10">
                 <h1 class="admin-heading">All Posts</h1>
             </div>
             <div class="col-md-2">
                 <a class="add-new" href="add-post.php">add post</a>
             </div>
             <div class="col-md-12">
                 <table class="content-table">
                     <thead>
                         <th>S.No.</th>
                         <th>Image</th>
                         <th>Title</th>
                         <th>Category</th>
                         <th>Description</th>
                         <th>Date</th>
                         <th>Author</th>
                         <th>Edit</th>
                         <th>Delete</th>
                     </thead>
                     <tbody>
                         <?php
                            include("config.php");
                            $query6 = "SELECT post.post_id,post.post_title,post.post_desc,post.post_category,post.post_image,post.post_date,post.author, category.category_name, user.user FROM post

                            LEFT JOIN category ON post.post_category = category.id
                            LEFT JOIN user ON post.author = user.id


                            
                            ";

                            $result6  = mysqli_query($connection, $query6) or die("error");
                            if (mysqli_num_rows($result6) > 0) {
                                while ($row = mysqli_fetch_assoc($result6)) {





                            ?>
                                 <tr>
                                     <td class='id'><?php echo $row['post_id'] ?></td>

                                     <td><img height=""><?php echo $row['post_image'] ?></td>
                                     <td><?php echo $row['post_title'] ?></td>
                                     <td><?php echo $row['category_name'] ?></td>
                                     <td><?php echo $row['post_desc'] ?></td>
                                     <td><?php echo $row['post_date'] ?></td>
                                     <td><?php echo $row['user'] ?></td>

                                     <td class='edit'><a href=''><i class='fa fa-edit'></i></a></td>
                                     <td class='delete'><a onclick="return confirm('Are u confirm?')" href='delete-post.php?id=<?php echo $row['post_id'] ?>'><i class='fa fa-trash-o'></i></a></td>


                                 </tr>
                         <?php        }
                            } ?>

                     </tbody>

                 </table>




                 <ul class='pagination admin-pagination'>

                     <li><a href="">1</a></li>


                     <li class=''><a href="">2</a></li>


                     <li><a href="">3</a></li>

                 </ul>



             </div>
         </div>
     </div>
 </div>
 <?php include "footer.php"; ?>