<?php
require "database/database.php";
require "helpers/functions.php";

// $fruits = ['banan', 'pomme', 'kiwi'];
// $fruits = implode(',', $fruits);
// dd($fruits);

// $string = "Salut-ca-va";

// $string = explode("-", $string);
// dd($string);

$page = "shop";

$req_search = isset($_GET['search']) ? " nom LIKE '%" . e($_GET['search']) . "%' AND " : '';

$req_search  = $categorie_filter_req = $couleur_filter_req = '';
if (isset($_GET['btn_filters'])) {
    if (!empty($_GET['categorie_filter'])) {
        $categorie_filter_req = "categorie_id = " . (int)$_GET['categorie_filter'] . " AND";
    }

    if (!empty($_GET['couleur_filter'])) {
        $list_couleur_ids_filter = implode(', ', array_map('intval', $_GET['couleur_filter']));
        $couleur_filter_req = "couleur_id IN($list_couleur_ids_filter) AND";
    }

    $req_search = isset($_GET['search']) ? " nom LIKE '%" . e($_GET['search']) . "%' AND " : '';
}

$produits = $db->query("SELECT * FROM produits WHERE $req_search $categorie_filter_req $couleur_filter_req deleted_at IS NULL ORDER BY RAND()")->fetchAll();


$categories = $db->query("SELECT c.id AS categorie_id, c.nom AS categorie_nom, c.icon, COALESCE(SUM(p.quantite), 0) AS total_produit_par_categorie FROM produits p RIGHT JOIN categories c ON c.id = p.categorie_id WHERE c.deleted_at IS NULL GROUP BY c.id")->fetchAll();

$couleurs = $db->query("SELECT c.id AS couleur_id, c.nom AS couleur_nom, COALESCE(SUM(p.quantite), 0) AS total_produit_par_couleur FROM produits p RIGHT JOIN couleurs c ON c.id = p.couleur_id WHERE c.deleted_at IS NULL GROUP BY c.id")->fetchAll();
?>

<!doctype html>
<html lang="en">

<head>
    <title>Shop</title>
    <?php include_once "body/head.php"; ?>
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
                            <i class="bi bi-clear"></i>
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

</body>

</html>