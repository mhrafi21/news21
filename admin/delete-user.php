<?php
$delete_id = $_GET['id'];



include("config.php");
// "DELETE FROM user WHERE `user`.`id` = 10"?
$query3 = "DELETE FROM user WHERE id = '{$delete_id}'";
$result3 = mysqli_query($connection,$query3);

if($result3){
    header("location: users.php");
}
?>