<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>News Site</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>


    <!-- Menu Bar -->
    <div id="menu-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="index.php">Home</a>
                    <ul class='menu'>
                        <?php

                        if (isset($_GET['catid'])) {
                            $c_id = $_GET['catid'];
                        };
                        include("admin/config.php");


                        $query3 = "SELECT * FROM category WHERE post > 0";
                        $result3 = mysqli_query($connection, $query3);


                        while ($row3 = mysqli_fetch_assoc($result3)) {
                            $active = '';
                            if ($row3['id'] == $c_id) {
                                $active = "active";
                            } else {
                                $active = '';
                            };


                            echo " <li  ><a href='category.php?catid={$row3['id']}' class = '{$active}'>{$row3['category_name']}</a></li>";
                        }

                        ?>


                    </ul>

                </div>
            </div>
        </div>
    </div>
    <!-- /Menu Bar -->