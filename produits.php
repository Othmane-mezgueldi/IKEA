<?php

$page = "produits";

require "database/database.php";
require "helpers/functions.php";

_check_if_user_connected();


$produits = $db->query("SELECT * FROM produits")->fetchAll();
$categories = $db->query("SELECT * FROM categories")->fetchAll();
$couleurs = $db->query("SELECT * FROM couleurs")->fetchAll();

// echo "<pre>";
// print_r($produits);
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

            <h3>Produits</h3>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Produits</li>
                </ol>
            </nav>

            <div class="card">
                <div class="card-header">
                    <h6>Liste des produits</h6>
                </div>
                <div class="card-body">

                    <a href="" class="btn btn-primary btn-sm fw-bold mb-3">Ajouter</a>


                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Image</th>
                                <th>Nom</th>
                                <th>Quantité</th>
                                <th>Prix</th>
                                <th>Prix Total</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($produits as $key => $value) : ?>

                                <tr>
                                    <td><?= $value['id'] ?></td>
                                    <td>
                                        <img width="30" src="images/<?= $value['image'] ?>" loading="lazy" alt="...">
                                    </td>
                                    <td><?= $value['nom'] ?></td>
                                    <td><?= $value['quantite'] ?></td>
                                    <td><?= $value['prix'] ?> DH</td>
                                    <td><?= $value['prix'] * $value['quantite'] ?> DH</td>
                                    <td>
                                        <a href="" class="btn btn-dark btn-sm fw-bold">Afficher</a>
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
        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
        </script>
</body>

</html>