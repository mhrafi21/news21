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
    <!-- HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class=" col-md-offset-4 col-md-4">

                    <a href="index.php" id="logo"><img src="images/news.jpg"></a>
                </div>
                <!-- /LOGO -->
            </div>
        </div>
    </div>
    <!-- /HEADER -->
    <!-- Menu Bar -->
    <div id="menu-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class='menu'>
                        <?php
                        include("admin/config.php");

                        if (isset($_GET['catid'])) {
                            $catid = $_GET['catid'];
                        };

                        $query3 = "SELECT * FROM category";
                        $result3 = mysqli_query($connection, $query3);

                        if (mysqli_num_rows($result3) > 0) {
                            $active = '';
                            while ($row3 = mysqli_fetch_assoc($result3)) {

                                if ($row3['id'] == $catid) {
                                    $active = "active";
                                } else {
                                    $active = '';
                                };


                                echo " <li><a class= '$active' href='category.php?catid={$row3['id']}'>{$row3['category_name']}</a></li>";
                            }
                        }
                        ?>


                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /Menu Bar -->