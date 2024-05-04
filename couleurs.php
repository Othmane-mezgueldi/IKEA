<?php

$page = "couleurs";


require "database/database.php";
require "helpers/functions.php";
$couleurs = $db->query("SELECT * FROM couleurs ORDER BY id DESC")->fetchAll();

// echo "<pre>";
// print_r($produits);
// echo "</pre>";
// exit;
?>

<!doctype html>
<html lang="en">

<head>
    <title>Liste des couleurs</title>
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


        <main class="container mt-3">

            <h3>Couleurs</h3>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Couleurs</li>
                </ol>
            </nav>

            <div class="card">
                <div class="card-header">
                    <h6>Liste des couleurs</h6>
                </div>
                <div class="card-body">

                    <a href="couleur_add.php" class="btn btn-primary btn-sm fw-bold mb-3">Ajouter</a>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nom</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($couleurs as $key => $value) : ?>

                                <tr>
                                    <td><?= $value['id'] ?></td>

                                    <td>
                                        <i class="bi bi-circle-fill" style="color:<?= $value['nom'] ?>"></i>
                                        <?= ucwords($value['nom']) ?>
                                    </td>
                                    <td>
                                        <a href="couleur_show.php?id=<?= $value['id'] ?>" class="btn btn-dark btn-sm fw-bold">Afficher</a>
                                        <a href="" class="btn btn-dark btn-sm fw-bold">Modifier</a>
                                        <a href="" class="btn btn-danger btn-sm fw-bold">Supprimer</a>
                                    </td>
                                </tr>
                            <?php endforeach  ?>

                        </tbody>
                    </table>
                </div>
            </div>

        </main>
        <footer>
            <!-- place footer here -->
        </footer>

</body>

</html>