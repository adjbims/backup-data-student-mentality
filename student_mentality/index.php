<?php
session_start();

if (isset($_GET['page']) && $_GET['page'] === 'logout') {
    session_destroy();
    header("Location: login.php");
    exit;
}

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Mentality</title>

    <!-- My Style -->
    <link rel="stylesheet" href="style/style.css">
    <link rel="shortcut icon" href="image/logoweb.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap"
        rel="stylesheet">
</head>

<body>


    <!-- Navbar start -->
    <header>
        <nav class="navbar">
            <img src="image/logoweb.png" alt="" width="50" height="50" class="d-inline-block align-text-top">
            <a href="#" class="navbar-logo">Student<span>Mentality</span>.</a>

            <div class="navbar-nav">
                <a href="home.php">Home</a>
                <a href="insight.php">Daily Insight</a>
                <a href="forum.php">Student Forums</a>
                <a href="service.php">Service</a>
                <a href="logout.php">Log Out</a>
            </div>
            <div class="menu-toggle">
                <i class="fa fa-bars"></i>
            </div>
        </nav>
    </header>
    <!-- Navbar end -->


    <div id=" contents">
        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];

            switch ($page) {
                case 'home':
                    include "home.php";
                    break;
                case 'insight':
                    include "insight.php";
                    break;
                case 'forum':
                    include "forum.php";
                    break;
                case 'service':
                    include "service.php";
                    break;
            }
        } else {
            include "home.php";
        }
        ?>
    </div>

</body>

</html>