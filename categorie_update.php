<?php

$page = "categories";

require "database/database.php";
require "helpers/functions.php";
$id = $_GET['id'];
// echo "<pre>";
// print_r($id);
// echo "</pre>";
// exit;

$c = $db->query("SELECT * FROM categories WHERE id = $id LIMIT 1")->fetcH();

// echo "<pre>";
// print_r($c);
// echo "</pre>";
// exit;

if (isset($_POST['update_categorie'])) {
    // echo "Ok";
    // exit;
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    // exit;
    //Récupération des données
    $nom = $_POST['nom'];
    $icon = $_POST['icon'];

    // Enregistrer les données dans la BD

    $db->query("UPDATE categories SET nom = '$nom', icon ='$icon' WHERE id = $id");

    // Redériger user vers la page categories
    header("Location:categories.php");
    exit;
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Modifier catégorie</title>
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

            <h3>Modifier catégorie</h3>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="categories.php">Categories</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Modifier</li>
                </ol>
            </nav>



            <div class="card">
                <div class="card-header">
                    <h6>Modifier catégorie</h6>
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

                    <form method="post">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="nom" class="form-label">Nom:</label>
                                    <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom:" value="<?= $c['nom'] ?>" />
                                </div>
                            </div>
                            <!-- col -->

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="icon" class="form-label">Icon:</label>
                                    <input type="text" class="form-control" name="icon" id="icon" placeholder="Icon:" value="<?= $c['icon'] ?>" />
                                </div>
                            </div>
                            <!-- col -->

                        </div>
                        <!-- row -->

                        <button type="submit" name="update_categorie" class="btn btn-dark mt-4">
                            Modifier
                        </button>
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