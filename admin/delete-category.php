<?php
include("config.php");

$delete_id = $_GET['id'];
$query = "DELETE FROM category WHERE id = {$delete_id} ";
$result = mysqli_query($connection,$query);
if($result){
    header("location: category.php");
}


?>