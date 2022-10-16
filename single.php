<?php include 'header.php'; ?>
<div id="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="post-container">
                    <?php
                    $s_id = $_GET['id'];
                    include("admin/config.php");
                    $query6 = "SELECT post.post_id,post.post_title,post.post_desc,post.post_category,post.post_image,post.post_date,post.author, category.category_name, user.user FROM post

                            LEFT JOIN category ON post.post_category = category.id
                            LEFT JOIN user ON post.author = user.id
                            WHERE post.post_id  = {$s_id}";

                    $result6  = mysqli_query($connection, $query6) or die("error");
                    if (mysqli_num_rows($result6) > 0) {
                        while ($row = mysqli_fetch_assoc($result6)) {
                    ?>
                            <div class="post-content single-post">
                                <h3><?php echo $row['post_title'] ?></h3>
                                <div class="post-information">
                                    <span>
                                        <i class="fa fa-tags" aria-hidden="true"></i>
                                        <?php echo $row['category_name'] ?>
                                    </span>
                                    <span>
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <a href='author.php'> <?php echo $row['user'] ?></a>
                                    </span>
                                    <span>
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                        <?php echo $row['post_date'] ?>
                                    </span>
                                </div>
                                <img class="single-feature-image" src="images/post_1.jpg" alt="" />
                                <p class="description">
                                    <?php echo $row['post_desc'] ?>
                                </p>
                            </div>
                    <?php }
                    } ?>
                </div>
                <!-- /post-container -->
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>