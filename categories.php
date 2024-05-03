<?php
require "database/database.php";
require "helpers/functions.php";

$page = "categories";
$categories = $db->query("SELECT * FROM categories WHERE deleted_at IS NULL")->fetchAll();

// $categories_archive_count =  $db->query("SELECT count(id) AS archive_count  from categories where deleted_at is not null LIMIT 1")->fetch()->archive_count ?? 0;

$categories_archive_count =  $db->query("SELECT * FROM categories WHERE deleted_at IS NOT NULL")->rowCount();

// echo "<pre>";
// print_r($categories_archive_count);
// echo "</pre>";
// exit;
?>

<!doctype html>
<html lang="en">

<head>
    <title>Thank you page</title>
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

            <h3>Liste des catégories</h3>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Categories</li>
                </ol>
            </nav>

            <?php include_once("body/message_flash.php") ?>

            <div class="card">
                <div class="card-header">
                    <h6>Liste des categories</h6>
                </div>
                <div class="card-body">

                    <a href="categorie_add.php" class="btn btn-primary mb-3">Ajouter</a>

                    <a href="categories_archive.php" class="btn btn-secondary mb-3">
                        Archive
                        <span class="badge text-bg-light">
                            <?= $categories_archive_count  ?>
                        </span>
                    </a>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="table-light">
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Nom</th>
                                    <th>Icon</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($categories as $key => $c) : ?>
                                    <tr>
                                        <td><?= $c['id'] ?></td>
                                        <td><img width="30" src="images/categories/<?= $c['image'] ?>?time=<?= date("d/m/Y H:i:s") ?>" alt=""></td>
                                        <td><?= ucwords($c['nom']) ?></td>
                                        <td>
                                            <i class="bi bi-<?= $c['icon'] ?>"></i>
                                        </td>
                                        <td>
                                            <a href="categorie_show.php?id=<?= $c['id'] ?>" class="btn btn-secondary btn-sm">
                                                Afficher
                                            </a>

                                            <a href="categorie_update.php?id=<?= $c['id'] ?>" class="btn btn-dark btn-sm">
                                                Modifier
                                            </a>

                                            <a href="categorie_delete.php?id=<?= $c['id'] ?>" class="btn btn-danger btn-sm">
                                                Supprimer
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>




                </div>
            </div>


        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->

</body>

</html>