<?php

require "database/database.php";
require "helpers/functions.php";
$id = $_GET['id'];
// echo "<pre>";
// print_r($id);
// echo "</pre>";
// exit;
$couleur = $db->query("SELECT * FROM couleurs WHERE id = $id LIMIT 1")->fetch();

// echo "<pre>";
// print_r($couleur);
// echo "</pre>";
// exit;
?>

<!doctype html>
<html lang="en">

<head>
    <title>Détails couleur</title>
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

            <h3>Couleur details</h3>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Couleurs</li>
                </ol>
            </nav>

            <div class="card">
                <div class="card-header">
                    <h6>Déatils de couleur</h6>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Id: <?= $couleur['id'] ?></li>
                        <li class="list-group-item">Nom: <?= $couleur['nom'] ?></li>
                        <li class="list-group-item">
                            Icon:
                            <i class="bi bi-circle-fill" style="color:<?= $couleur['nom'] ?>"></i>
                        </li>
                    </ul>

                    <a href="couleurs.php" class="btn btn-secondary btn-sm">
                        Retour
                    </a>

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