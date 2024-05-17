<?php
require "database/database.php";
require "helpers/functions.php";

$page = "shop";

$req_search = isset($_GET['search']) ? " nom LIKE '%" . e($_GET['search']) . "%' AND " : '';

$req_search  = $prix_filter_req = $categorie_filter_req = $couleur_filter_req = '';
if (isset($_GET['btn_filters'])) {
    if (!empty($_GET['categorie_filter'])) {
        $categorie_filter_req = "categorie_id = " . (int)$_GET['categorie_filter'] . " AND";
    }

    if (!empty($_GET['couleur_filter'])) {
        $list_couleur_ids_filter = implode(', ', array_map('intval', $_GET['couleur_filter']));
        $couleur_filter_req = "couleur_id IN($list_couleur_ids_filter) AND";
    }

    $req_search = isset($_GET['search']) ? " nom LIKE '%" . e($_GET['search']) . "%' AND " : '';

    if (isset($_GET['filter_min'], $_GET['filter_max'])) {
        $filter_min = (int)$_GET['filter_min'];
        $filter_max = (int)$_GET['filter_max'];
        $prix_filter_req = " prix BETWEEN " . $filter_min . " AND  " . $filter_max . " AND";
    }
}

$produits = $db->query("SELECT * FROM produits WHERE $req_search $categorie_filter_req $couleur_filter_req 
$prix_filter_req
deleted_at IS NULL ORDER BY prix")->fetchAll();


$categories = $db->query("SELECT c.id AS categorie_id, c.nom AS categorie_nom, c.icon, COALESCE(SUM(p.quantite), 0) AS total_produit_par_categorie FROM produits p RIGHT JOIN categories c ON c.id = p.categorie_id WHERE c.deleted_at IS NULL GROUP BY c.id")->fetchAll();

$couleurs = $db->query("SELECT c.id AS couleur_id, c.nom AS couleur_nom, COALESCE(SUM(p.quantite), 0) AS total_produit_par_couleur FROM produits p RIGHT JOIN couleurs c ON c.id = p.couleur_id WHERE c.deleted_at IS NULL GROUP BY c.id")->fetchAll();
?>

<!doctype html>
<html lang="en">

<head>
    <title>Shop</title>
    <?php include_once "body/head.php"; ?>

    <style>
        /* Styles for the price input container */

        .slider-container {
            width: 100%;
        }

        .slider-container {
            height: 6px;
            position: relative;
            background: #e4e4e4;
            border-radius: 5px;
        }

        .slider-container .price-slider {
            height: 100%;
            left: 25%;
            right: 15%;
            position: absolute;
            border-radius: 5px;
            background: #01940b;
        }

        .range-input {
            position: relative;
        }

        .range-input input {
            position: absolute;
            width: 100%;
            height: 5px;
            background: none;
            top: -5px;
            pointer-events: none;
            cursor: pointer;
            -webkit-appearance: none;
        }

        /* Styles for the range thumb in WebKit browsers */
        input[type="range"]::-webkit-slider-thumb {
            height: 18px;
            width: 18px;
            border-radius: 70%;
            background: #555;
            pointer-events: auto;
            -webkit-appearance: none;
        }
    </style>
</head>

<body>
    <header>
        <?php include_once "body/nav.php"; ?>
    </header>
    <main class="container">
        <main class="container mt-3">
            <h3>Shop</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Shop</li>
                </ol>
            </nav>

            <div class="row mb-5">
                <div class="col-md-3">
                    <form method="get">

                        <div class="input-group mb-3">
                            <input type="search" class="form-control" name="search" placeholder="Rechercher" value="<?= $_GET['search'] ?? '' ?>">
                            <button class="btn btn-outline-secondary" type="submit">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>



                        <section class="mb-4">
                            <!-- src https://www.geeksforgeeks.org/price-range-slider-with-min-max-input-using-html-css-and-javascript/ -->
                            <div class="price-input-container">
                                <div class="price-input row">
                                    <div class="col">
                                        <span>Min</span>
                                        <input name="filter_min" type="number" class="min-input form-control form-control-sm" value="<?= $_GET['filter_min'] ?? 0 ?>">
                                    </div>
                                    <div class="col">
                                        <span>Max</span>
                                        <input name="filter_max" type="number" class="max-input form-control form-control-sm" value="<?= $_GET['filter_max'] ?? 10000 ?>">
                                    </div>
                                </div>
                                <br>
                                <div class="slider-container">
                                    <div class="price-slider">
                                    </div>
                                </div>
                            </div>

                            <!-- Slider -->
                            <div class="range-input">
                                <input type="range" class="min-range" min="0" max="10000" value="<?= $_GET['filter_min'] ?? 0 ?>" step="1">
                                <input type="range" class="max-range" min="1000" max="10000" value="<?= $_GET['filter_max'] ?? 10000 ?>" step="1">
                            </div>
                        </section>





                        <h5>Catégories</h5>
                        <ul class="list-group list-group-flush mb-3">
                            <?php foreach ($categories as $value) : ?>
                                <li class="list-group-item">
                                    <input <?= isset($_GET['categorie_filter']) && $_GET['categorie_filter'] == $value['categorie_id'] ? 'checked' : '' ?> class="form-check-input" type="radio" name="categorie_filter" value="<?= $value['categorie_id'] ?>" id="categorie_filter_<?= $value['categorie_id'] ?>">
                                    <label class="form-check-label" for="categorie_filter_<?= $value['categorie_id'] ?>">
                                        <i class="bi bi-<?= $value['icon'] ?>"></i>
                                        <?= $value['categorie_nom'] ?>
                                        <b>(<?= $value['total_produit_par_categorie'] ?>)</b>
                                    </label>
                                </li>
                            <?php endforeach ?>
                        </ul>

                        <h5>Couleurs</h5>
                        <ul class="list-group list-group-flush mb-3">
                            <?php foreach ($couleurs as $value) : ?>
                                <li class="list-group-item">
                                    <input <?= isset($_GET['couleur_filter']) && in_array($value['couleur_id'], $_GET['couleur_filter']) ? 'checked' : '' ?> name="couleur_filter[]" class="form-check-input" type="checkbox" value="<?= $value['couleur_id'] ?>" id="couleur_filter_<?= $value['couleur_id'] ?>">
                                    <label class="form-check-label" for="couleur_filter_<?= $value['couleur_id'] ?>">
                                        <i class="bi bi-circle-fill fs-6" style="color:<?= $value['couleur_nom'] ?>"></i>
                                        <?= strtoupper($value['couleur_nom']) ?>
                                        <b>(<?= $value['total_produit_par_couleur'] ?>)</b>
                                    </label>
                                </li>
                            <?php endforeach ?>
                        </ul>

                        <button type="submit" name="btn_filters" class="btn btn-dark fw-bold">
                            <i class="bi bi-filter"></i>
                            Filters
                        </button>

                        <a href="shop.php" class="btn btn-secondary fw-bold">
                            <i class="bi bi-stars"></i>
                            Clear
                        </a>
                    </form>
                </div>

                <div class="col-md-9">
                    <div class="row gy-2 row-cols-1 row-cols-md-3 row-cols-sm-2">
                        <?php foreach ($produits as $value) : ?>
                            <div class="col">
                                <div class="card" data-aos="fade-up">
                                    <a href="product-page.php?id=<?= $value['id'] ?>">
                                        <img src="images/produits/<?= $value['image'] ?>" loading="lazy" class="card-img-top" alt="...">
                                    </a>
                                    <div class="card-body">
                                        <h6 class="card-title"><?= ucwords($value['nom']) ?></h6>
                                        <h5><?= $value['prix'] ?> DH <br>
                                            <small><s class="text-danger"><?= $value['ancien_prix'] ?> DH</s></small>
                                        </h5>
                                        <a href="cart.php" class="btn btn-dark">
                                            <i class="bi bi-cart-fill"></i>
                                            Add to cart
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </main>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>

    <?php include_once "body/script.php"; ?>




    <script>
        //  Script.js 
        const rangevalue =
            document.querySelector(".slider-container .price-slider");
        const rangeInputvalue =
            document.querySelectorAll(".range-input input");

        // Set the price gap 
        let priceGap = 500;

        // Adding event listners to price input elements 
        const priceInputvalue =
            document.querySelectorAll(".price-input input");
        for (let i = 0; i < priceInputvalue.length; i++) {
            priceInputvalue[i].addEventListener("input", e => {

                // Parse min and max values of the range input 
                let minp = parseInt(priceInputvalue[0].value);
                let maxp = parseInt(priceInputvalue[1].value);
                let diff = maxp - minp

                if (minp < 0) {
                    alert("minimum price cannot be less than 0");
                    priceInputvalue[0].value = 0;
                    minp = 0;
                }

                // Validate the input values 
                if (maxp > 10000) {
                    alert("maximum price cannot be greater than 10000");
                    priceInputvalue[1].value = 10000;
                    maxp = 10000;
                }

                if (minp > maxp - priceGap) {
                    priceInputvalue[0].value = maxp - priceGap;
                    minp = maxp - priceGap;

                    if (minp < 0) {
                        priceInputvalue[0].value = 0;
                        minp = 0;
                    }
                }

                // Check if the price gap is met  
                // and max price is within the range 
                if (diff >= priceGap && maxp <= rangeInputvalue[1].max) {
                    if (e.target.className === " form-control form-control-sm") {
                        rangeInputvalue[0].value = minp;
                        let value1 = rangeInputvalue[0].max;
                        rangevalue.style.left = `${(minp / value1) * 100}%`;
                    } else {
                        rangeInputvalue[1].value = maxp;
                        let value2 = rangeInputvalue[1].max;
                        rangevalue.style.right =
                            `${100 - (maxp / value2) * 100}%`;
                    }
                }
            });

            // Add event listeners to range input elements 
            for (let i = 0; i < rangeInputvalue.length; i++) {
                rangeInputvalue[i].addEventListener("input", e => {
                    let minVal =
                        parseInt(rangeInputvalue[0].value);
                    let maxVal =
                        parseInt(rangeInputvalue[1].value);

                    let diff = maxVal - minVal

                    // Check if the price gap is exceeded 
                    if (diff < priceGap) {

                        // Check if the input is the min range input 
                        if (e.target.className === "min-range") {
                            rangeInputvalue[0].value = maxVal - priceGap;
                        } else {
                            rangeInputvalue[1].value = minVal + priceGap;
                        }
                    } else {

                        // Update price inputs and range progress 
                        priceInputvalue[0].value = minVal;
                        priceInputvalue[1].value = maxVal;
                        rangevalue.style.left =
                            `${(minVal / rangeInputvalue[0].max) * 100}%`;
                        rangevalue.style.right =
                            `${100 - (maxVal / rangeInputvalue[1].max) * 100}%`;
                    }
                });
            }
        }
    </script>

</body>

</html>