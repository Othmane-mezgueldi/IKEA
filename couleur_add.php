<?php

require "database/database.php";
require "helpers/functions.php";
if (isset($_POST['add_color'])) {
    $nom = $_POST['nom'];
    $db->query("INSERT INTO couleurs SET nom = '$nom'");
    header('Location:couleurs.php');
    exit;
}

?>

<!doctype html>
<html lang="en">

<head>
    <title>Ajouter une couleur</title>
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

            <h3>Ajouter une couleur</h3>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Couleurs</li>
                </ol>
            </nav>

            <div class="card">
                <div class="card-header">
                    <h6>Ajouter une couleur</h6>
                </div>
                <div class="card-body">


                    <form method="post">
                        <input type="text" name="nom">
                        <button name="add_color">Ajouter</button>
                    </form>


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