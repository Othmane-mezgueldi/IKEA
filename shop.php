<?php

$page = "shop";

require "database/database.php";
require "helpers/functions.php";
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

            <h3>Shop</h3>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Shop</li>
                </ol>
            </nav>





            <!-- start row 1 page-->
            <div class="row">
                <div class="col-md-3">
                    <!-- start Liste filtres -->
                    <section>
                        <h5>Catégories</h5>
                        <ul class="list-group list-group-flush mb-3">
                            <?php foreach ($categories as $key => $value) : ?>

                                <li class="list-group-item">

                                    <i class="bi bi-<?= $value['icon'] ?>"></i>
                                    <?= $value['nom'] ?>
                                </li>
                            <?php endforeach  ?>

                        </ul>

                        <h5>Couleurs</h5>
                        <ul class="list-group list-group-flush mb-3">
                            <?php foreach ($couleurs as $key => $value) : ?>
                                <li class="list-group-item">
                                    <i class="bi bi-circle-fill fs-6" style="color:<?= $value['nom'] ?>"></i>
                                    <?= strtoupper($value['nom']) ?>
                                </li>
                            <?php endforeach ?>

                        </ul>
                    </section>
                    <!-- end Liste filtres -->
                </div>
                <!-- col page -->

                <!-- start catalogue -->
                <div class="col-md-9">
                    <!-- start row 2 catalogue-->
                    <div class="row gy-2 row-cols-1 row-cols-md-3 row-cols-sm-2">
                        <?php foreach ($produits as $key => $value) : ?>
                            <div class="col">
                                <div class="card">
                                    <a href="product-page.php?id=<?= $value['id'] ?>">
                                        <img src="images/<?= $value['image'] ?>" loading="lazy" class="card-img-top" alt="...">
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <?= $value['nom'] ?>
                                        </h5>

                                        <h5>
                                            <?= $value['prix'] ?> DH
                                            <s class="text-danger"><?= $value['ancien_prix'] ?> DH</s>
                                        </h5>
                                        <a href="cart.php" class="btn btn-dark">
                                            <i class="bi bi-cart-fill"></i>
                                            Add to cart
                                        </a>
                                    </div>
                                    <!-- card-body -->
                                </div>
                                <!-- card -->
                            </div>
                            <!-- col catalogue -->
                        <?php endforeach  ?>





                    </div>
                    <!-- end row 2 catalogue-->
                </div>
                <!-- end catalogue -->
                <!-- col page -->

            </div>
            <!-- end row 1 page-->










        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->

</body>

</html>