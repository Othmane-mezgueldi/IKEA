<?php

$page = "categories";

require "database/database.php";
require "helpers/functions.php";
$id = $_GET['id'];
// echo "<pre>";
// print_r($id);
// echo "</pre>";
// exit;

if (isset($_POST['active_categorie'])) {
    // echo "Ok";
    // $db->query("DELETE FROM categories WHERE id = $id");
    $db->query("UPDATE categories SET deleted_at = NULL WHERE id = $id");
    header("Location:categories.php");
    exit;
}

$c = $db->query("SELECT * FROM categories WHERE id = $id LIMIT 1")->fetcH();

// echo "<pre>";
// print_r($c);
// echo "</pre>";
// exit;
?>

<!doctype html>
<html lang="en">

<head>
    <title>Activer catégorie</title>
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

            <h3>Activer catégorie</h3>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Categories</li>
                </ol>
            </nav>



            <div class="card">
                <div class="card-header">
                    <h6>Activer catégorie</h6>
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

                    <h6 class="text-success">
                        Voulez vous vraiment Activer <?= $c['nom'] ?> ?
                    </h6>

                    <form method="post">
                        <a href="categories.php" class="btn btn-sm btn-secondary">Non</a>
                        <button type="submit" name="active_categorie" class="btn btn-sm btn-success">Oui</button>
                    </form>

                </div>
            </div>


        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->

</body>

</html>