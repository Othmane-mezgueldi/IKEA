<?php

$page = "categories";

require "database/database.php";
require "helpers/functions.php";

if (!isset($_GET['id'])) {
    $_SESSION['message'] = "Id introuvable";
    $_SESSION['couleur'] = "danger";
    header('Location:categories.php');
    exit;
}

$id = $_GET['id'];


// echo "<pre>";
// print_r($id);
// echo "</pre>";
// exit;

$c = $db->query("SELECT * FROM categories WHERE id = $id LIMIT 1")->fetcH();

// echo "<pre>";
// print_r($c);
// echo "</pre>";
// exit;
?>

<!doctype html>
<html lang="en">

<head>
    <title>Detail de catégorie</title>
    <!-- Required meta tags -->

    <?php include_once "body/head.php"; ?>
    <?php include_once "body/script.php"; ?>
</head>

<body>
    <header>
        <!-- place navbar here -->
        <?php include_once "body/nav.php"; ?>
    </header>
    <main class="container">

        </header>
        <main class="container mt-3">

            <h3>Detail de catégorie</h3>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Categories</li>
                </ol>
            </nav>



            <div class="card">
                <div class="card-header">
                    <h6>Detail de catégorie</h6>
                </div>
                <div class="card-body">

                    <ul>
                        <li>Id: <?= $c['id'] ?></li>
                        <li>Nom: <?= $c['nom'] ?></li>
                        <li>
                            Icon:
                            <i class="bi bi-<?= $c['icon'] ?>"></i>
                        </li>
                    </ul>

                </div>
            </div>


        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->

</body>

</html>