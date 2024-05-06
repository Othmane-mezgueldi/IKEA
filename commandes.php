<?php


require "database/database.php";
require "helpers/functions.php";
$page = "commandes";

?>

<!doctype html>
<html lang="en">

<head>
    <title>Commandes</title>
    <!-- Required meta tags -->

    <?php include_once "body/head.php"; ?>
    <?php include_once "body/script.php"; ?>
</head>

<body>
    <header>
        <!-- place navbar here -->
        <?php include_once "body/nav.php"; ?>
    </header>
    <main class="container mt-3">

        <?php include_once "body/message_flash.php"; ?>

        <h3>Commandes</h3>


    </main>
    <footer>
        <!-- place footer here -->
    </footer>

</body>

</html>