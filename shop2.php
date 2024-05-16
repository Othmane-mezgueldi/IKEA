<?php

require "database/database.php";
require "helpers/functions.php";

$page = "shop";

$req_search = '';
if (isset($_GET['search'])) {
    $search_input = e($_GET['search']);
    $req_search = " nom  LIKE '%" . $search_input . "%' AND ";
}

$categorie_filter = $list_couleur_ids_filter = '';
$categorie_filter_req = $couleur_filter_req = '';
$couleur_filter = [];
if (isset($_GET['filters'])) {

    if (isset($_GET['categorie_filter'])) {
        $categorie_filter = (int)$_GET['categorie_filter'];

        if ($categorie_filter != "") {
            $categorie_filter_req = "categorie_id = $categorie_filter AND";
        }
    }

    if (isset($_GET['couleur_filter'])) {
        $couleur_filter = $_GET['couleur_filter'];

        if (!empty($couleur_filter)) {
            $couleur_filter = $_GET['couleur_filter'];
            foreach ($couleur_filter as $key => $cf) {
                if ($key !== 0) {
                    $list_couleur_ids_filter .= ', ';
                }
                $list_couleur_ids_filter .= $cf;
            }

            $couleur_filter_req = "couleur_id IN($list_couleur_ids_filter) AND";
        }
    }
}

$produits = $db->query("SELECT * FROM produits WHERE
$req_search
$categorie_filter_req
$couleur_filter_req
deleted_at IS NULL")->fetchAll();

$categories = $db->query("SELECT 
c.id As categorie_id,
c.nom As categorie_nom,
c.icon,
COALESCE(SUM(p.quantite),0) AS total_produit_par_categorie
FROM produits p 
RIGHT JOIN categories c ON c.id = p.categorie_id
WHERE c.deleted_at IS NULL
GROUP BY c.id")->fetchALL();

$couleurs = $db->query("SELECT 
c.id As couleur_id,
c.nom As couleur_nom,
COALESCE(SUM(p.quantite),0) AS total_produit_par_couleur
FROM produits p 
RIGHT JOIN couleurs c ON c.id = p.couleur_id
WHERE c.deleted_at IS NULL
GROUP BY c.id")->fetchALL();
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
            <div class="row mb-5">
                <div class="col-md-3">
                    <!-- start Liste filtres -->
                    <form method="get">
                        <h5>Catégories</h5>
                        <ul class="list-group list-group-flush mb-3">
                            <?php foreach ($categories as $key => $value) : ?>

                                <li class="list-group-item">

                                    <input <?= $categorie_filter == $value['categorie_id'] ? 'checked' : '' ?> class="form-check-input" type="radio" name="categorie_filter" value="<?= $value['categorie_id'] ?>" id="categorie_filter_<?= $value['categorie_id'] ?>">


                                    <label class="form-check-label" for="categorie_filter_<?= $value['categorie_id'] ?>">
                                        <i class="bi bi-<?= $value['icon'] ?>"></i>
                                        <?= $value['categorie_nom'] ?>
                                        <b>
                                            (<?= $value['total_produit_par_categorie'] ?>)
                                        </b>
                                    </label>

                                </li>
                            <?php endforeach  ?>
                        </ul>
                        <h5>Couleurs</h5>
                        <ul class="list-group list-group-flush mb-3">
                            <?php foreach ($couleurs as $key => $value) : ?>
                                <li class="list-group-item">

                                    <input <?= in_array($value['couleur_id'], $couleur_filter) ? 'checked' : '' ?> name="couleur_filter[]" class="form-check-input" type="checkbox" value="<?= $value['couleur_id'] ?>" id="couleur_filter_<?= $value['couleur_id'] ?>">
                                    <label class="form-check-label" for="couleur_filter_<?= $value['couleur_id'] ?>">
                                        <i class="bi bi-circle-fill fs-6" style="color:<?= $value['couleur_nom'] ?>"></i>
                                        <?= strtoupper($value['couleur_nom']) ?>

                                        <b>
                                            (<?= $value['total_produit_par_couleur'] ?>)
                                        </b>
                                    </label>
                                </li>
                            <?php endforeach ?>
                        </ul>
                        <button type="submit" name="filters" class="btn btn-dark fw-bold">
                            <i class="bi bi-filter"></i>
                            Filters
                        </button>
                    </form>
                    <!-- end Liste filtres -->
                </div>
                <!-- col page -->

                <!-- start catalogue -->
                <div class="col-md-9">
                    <!-- start row 2 catalogue-->
                    <form method="get">
                        <div class="input-group mb-3">
                            <input type="search" class="form-control" name="search" placeholder="Rechercher" value="<?= $search_input  ?? '' ?>">
                            <button class="btn btn-outline-secondary" type="submit">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </form>
                    <div class="row gy-2 row-cols-1 row-cols-md-3 row-cols-sm-2">
                        <?php foreach ($produits as $key => $value) : ?>
                            <div class="col">
                                <div class="card">
                                    <a href="product-page.php?id=<?= $value['id'] ?>">
                                        <img src="images/produits/<?= $value['image'] ?>" loading="lazy" class="card-img-top" alt="...">
                                    </a>
                                    <div class="card-body">
                                        <h6 class="card-title">
                                            <?= ucwords($value['nom']) ?>
                                        </h6>

                                        <h5>
                                            <?= $value['prix'] ?> DH
                                            <br>
                                            <small>
                                                <s class="text-danger"><?= $value['ancien_prix'] ?> DH</s>
                                            </small>
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