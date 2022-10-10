<?php
include("config.php");
$deleteId  = $_GET['id'];

$query6 = "DELETE FROM post WHERE post_id = {$deleteId}";
$result6 = mysqli_query($connection, $query6);

if ($result6) {
    header("location:post.php");
}
