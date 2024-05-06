<?php

require "database/database.php";
require "helpers/functions.php";
$page = "dashboard";

if (!isset($_SESSION['ikea_auth'])) {
    $_SESSION['message'] = "Vous n'etes pas autorisé a consulter cette page !!!";
    $_SESSION['couleur'] = "danger";
    header('Location:login.php');
    exit;
}

?>

<!doctype html>
<html lang="en">

<head>
    <title>Dashboard</title>
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

        <h3>Dashboard welcome <?= $_SESSION['ikea_auth']['prenom'] ?></h3>

    </main>
    <footer>
        <!-- place footer here -->
    </footer>

</body>

</html>