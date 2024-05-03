<?php

$page = "categories";

require "database/database.php";
require "helpers/functions.php";

if (isset($_POST['activate_all'])) {

    $db->query("UPDATE categories SET deleted_at = NULL");
    $_SESSION['message'] = "Toutes les catégories sont activée";
    $_SESSION['couleur'] = "success";
    header("Location:categories.php");
    exit;
}


$categories_rows = $db->query("SELECT * FROM categories WHERE deleted_at IS NOT NULL")->rowCount();
$categories = $db->query("SELECT * FROM categories WHERE deleted_at IS NOT NULL")->fetchAll();

// echo "<pre>";
// print_r($produits);
// echo "</pre>";
// exit;
?>

<!doctype html>
<html lang="en">

<head>
    <title>Liste des catégories archiver</title>
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

            <h3>Liste des catégories archiver</h3>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Categories</li>
                </ol>
            </nav>


            <div class="card">
                <div class="card-header">
                    <h6>iste des catégories archiver</h6>
                </div>
                <div class="card-body">

                    <form method="post">
                        <a href="categories.php" class="btn btn-dark mb-3">Retour</a>
                        <?php if ($categories_rows > 0) : ?>
                            <button type="submit" name="activate_all" class="btn btn-success mb-3">Activer tout</button>
                        <?php else :  ?>
                            <!-- <button class="btn btn-success mb-3 disabled" disabled>Activer tout</button> -->
                        <?php endif  ?>

                    </form>
                    <?php if ($categories_rows > 0) : ?>

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="table-light">
                                        <th>Id</th>
                                        <th>Nom</th>
                                        <th>Icon</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($categories as $key => $c) : ?>
                                        <tr>
                                            <td><?= $c['id'] ?></td>
                                            <td><?= ucwords($c['nom']) ?></td>
                                            <td>
                                                <i class="bi bi-<?= $c['icon'] ?>"></i>
                                            </td>
                                            <td>
                                                <a href="categorie_show.php?id=<?= $c['id'] ?>" class="btn btn-secondary btn-sm">
                                                    Afficher
                                                </a>

                                                <a href="" class="btn btn-dark btn-sm">
                                                    Modifier
                                                </a>

                                                <a href="categorie_active.php?id=<?= $c['id'] ?>" class="btn btn-success btn-sm">
                                                    Activer
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- responsive -->

                    <?php else :  ?>

                        <div class="text-center">
                            <h5>Aucune catégorie supprimer</h5>
                            <p>
                                Veuiller supprimer une catégorie
                            </p>
                            <img width="300" src="images/illustrations/no_data.png" alt="">

                        </div>
                    <?php endif  ?>



                </div>
            </div>


        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->

</body>

</html>