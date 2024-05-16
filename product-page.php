<?php
require "database/database.php";
require "helpers/functions.php";
// echo "<pre>";
// print_r($_GET['id']);
// echo "</pre>";
// exit;

$id = $_GET['id'];

$produit_rows = $db->query("SELECT * FROM produits WHERE id = $id LIMIT 1")->rowCount();

if ($produit_rows == 0) {
    header('Location:shop.php');
    exit;
}
// echo "<pre>";
// print_r($produit_rows);
// echo "</pre>";
// exit;

$p = $db->query("SELECT * FROM produits WHERE id = $id LIMIT 1")->fetch();

// echo "<pre>";
// print_r($p);
// echo "</pre>";
// exit;
?>


<!doctype html>
<html lang="en">

<head>
    <title>Product Page | ikea.com</title>
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
        <main class="container">


            <h3 class="mt-3">Product page</h3>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="shop.php">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Product page</li>
                </ol>
            </nav>


            <div class="row">
                <div class="col">
                    <img src="images/produits/<?= $p['image'] ?>" class="img-fluid" alt="">
                </div>
                <!-- col -->

                <div class="col">
                    <h5><?= strtoupper($p['nom']) ?></h5>

                    <div class="text-warning">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-half"></i>
                    </div>

                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos hic voluptate itaque exercitationem
                        optio inventore ullam nihil delectus. Voluptatum, cum. Dolores, deleniti? In itaque quae optio,
                        eaque aperiam vero iusto?
                    </p>


                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Size:</label>
                                <select class="form-select" name="" id="">
                                    <option selected>S</option>
                                    <option value="">M</option>
                                    <option value="">L</option>
                                    <option value="">XL</option>
                                </select>
                            </div>

                        </div>
                        <!-- col 2 -->

                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Color:</label>
                                <select class="form-select" name="" id="">
                                    <option selected>Blue</option>
                                    <option value="">Red</option>
                                    <option value="">Yellow</option>
                                    <option value="">Purple</option>
                                </select>
                            </div>

                        </div>
                        <!-- col 2 -->


                    </div>
                    <!-- row 2 -->


                    <h3>
                        <?= $p['prix'] ?> DH
                        <s class="text-danger"><?= $p['ancien_prix'] ?> DH</s>
                    </h3>
                    <a href="cart.php" class="btn btn-dark">
                        <i class="bi bi-cart-fill"></i>
                        Add to cart
                    </a>

                </div>
                <!-- col -->
            </div>
            <!-- row -->

        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>