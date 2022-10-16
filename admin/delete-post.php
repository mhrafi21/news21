<?php
include("config.php");
$deleteId  = $_GET['id'];
$catId  = $_GET['catid'];

$query2 = "SELECT * FROM post WHERE post_id = {$deleteId}";
$result2 = mysqli_query($connection,$query2);
$row2 = mysqli_fetch_assoc($result2);

unlink("upload/" . $row2['post_image']);

$query6 = "DELETE FROM post WHERE post_id = {$deleteId};";
$query6 .= "UPDATE category SET post = post - 1 WHERE category.id = {$catId}";
$result6 = mysqli_multi_query($connection, $query6);




if ($result6) {
    header("location:post.php");
}
