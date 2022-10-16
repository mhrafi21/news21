<?php
    include("config.php");
    if (empty($_FILES['new_image']['name'])) {
        $new_name = $_POST['old_image'];
    } else {
        $error = array();
        $file_name = $_FILES['new_image']['name'];
        $file_size = $_FILES['new_image']['size'];
        $tmp_name = $_FILES['new_image']['tmp_name'];
        $file_type = $_FILES['new_image']['type'];
        $file_ext = explode('.', $file_name);
        $error = array();
        $extension = array('jpg', 'jpeg', 'png');

        if (in_array($file_ext, $extension) == false) {
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


    $query1 = "UPDATE post SET(post_title,post_desc,post_category,post_image) VALUES('{$post_title}','{$post_des}' , '{$post_category}' , '{$new_name}'
    WHERE post_id = {$_POST['post_id']}";
    $result1 = mysqli_query($connection,$query1);

    ?>