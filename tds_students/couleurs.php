<?php

$page = "couleurs";

require "database/database.php";
require "helpers/functions.php";
$couleurs = $db->query("SELECT * FROM couleurs ORDER BY id DESC")->fetchAll();

// echo "<pre>";
// print_r($produits);
// echo "</pre>";
// exit;

if (isset($_POST['btn_add_color'])) {
    $nom = e($_POST['nom']);
    $db->query("INSERT INTO couleurs SET 
        nom = '$nom'
    ");

    $_SESSION['message'] = "Bien ajouter";
    $_SESSION['couleur'] = "success";
    header("Location:couleurs.php");
    exit;
}

if (isset($_POST['btn_update_color'])) {
    $id = (int)$_POST['id'];
    $nom = e($_POST['nom']);

    $db->query("UPDATE couleurs SET 
        nom = '$nom'
        WHERE id = $id
    ");

    $_SESSION['message'] = "Bien ajouter";
    $_SESSION['couleur'] = "success";
    header("Location:couleurs.php");
    exit;
}

if (isset($_POST['btn_delete_color'])) {
    $id = (int)$_POST['id'];

    $db->query("UPDATE couleurs SET deleted_at = NOW() WHERE id = $id");

    $_SESSION['message'] = "Bien supprimer";
    $_SESSION['couleur'] = "success";
    header("Location:couleurs.php");
    exit;
}

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

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modal_add_user">
                    Ajouter
                </button>

                <div class="modal fade" id="modal_add_user" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form method="post">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5">
                                        Ajouter
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <!-- modal-header -->
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="nom">Nom:</label>
                                                <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom:" />
                                            </div>
                                        </div>
                                        <!-- col -->

                                    </div>
                                    <!-- row -->
                                </div>
                                <!-- modal-body -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                    <button type="submit" name="btn_add_color" class="btn btn-primary">
                                        Ajouter
                                    </button>
                                </div>
                                <!-- modal-footer -->
                            </form>
                        </div>
                        <!-- modal-content -->
                    </div>
                    <!-- modal-dialog -->
                </div>
                <!-- Modal -->



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
                                    <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#modal_show_user_<?= $value['id'] ?>">
                                        Afficher
                                    </button>

                                    <div class="modal fade" id="modal_show_user_<?= $value['id'] ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5">
                                                        Afficher
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <!-- modal-header -->
                                                <div class="modal-body">
                                                    <ul>
                                                        <li>Id:<?= $value['id'] ?></li>
                                                        <li>Nom: <?= ucwords($value['nom']) ?></li>
                                                        <li>icon: <i class="bi bi-circle-fill" style="color:<?= $value['nom'] ?>"></i>
                                                        </li>

                                                    </ul>
                                                </div>
                                                <!-- modal-body -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                                </div>
                                                <!-- modal-footer -->
                                            </div>
                                            <!-- modal-content -->
                                        </div>
                                        <!-- modal-dialog -->
                                    </div>
                                    <!-- Modal -->


                                    <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#modal_update_user_<?= $value['id'] ?>">
                                        Modifier
                                    </button>

                                    <div class="modal fade" id="modal_update_user_<?= $value['id'] ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">

                                                <form method="post">

                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5">
                                                            Modifier
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <!-- modal-header -->
                                                    <div class="modal-body">


                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="mb-3">
                                                                    <label for="nom" class="form-label">Nom:</label>
                                                                    <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom:" value="<?= $value['nom'] ?>" />
                                                                </div>
                                                            </div>
                                                            <!-- col -->




                                                        </div>
                                                        <!-- row -->



                                                    </div>
                                                    <!-- modal-body -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>

                                                        <input type="hidden" name="id" value="<?= $value['id'] ?>">

                                                        <button type="submit" name="btn_update_color" class="btn btn-dark">
                                                            Modifier
                                                        </button>
                                                    </div>
                                                    <!-- modal-footer -->
                                                </form>

                                            </div>
                                            <!-- modal-content -->
                                        </div>
                                        <!-- modal-dialog -->
                                    </div>
                                    <!-- Modal -->


                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal_delete_color_<?= $value['id'] ?>">
                                        Supprimer
                                    </button>

                                    <div class="modal fade" id="modal_delete_color_<?= $value['id'] ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5">
                                                        supprime
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <!-- modal-header -->
                                                <div class="modal-body">


                                                    <h6 class="text-danger">
                                                        Voulez vous vraiment supprimer <?= ucwords($value['nom']) ?> ?
                                                    </h6>
                                                </div>
                                                <!-- modal-body -->
                                                <div class="modal-footer">
                                                    <form method="post">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
                                                        <input type="hidden" name="id" value="<?= $value['id'] ?>">

                                                        <button type="submit" name="btn_delete_color" class="btn btn-danger">
                                                            Oui
                                                        </button>
                                                    </form>
                                                </div>
                                                <!-- modal-footer -->
                                            </div>
                                            <!-- modal-content -->
                                        </div>
                                        <!-- modal-dialog -->
                                    </div>
                                    <!-- Modal -->

                                </td>

                            </tr>

                        <?php endforeach  ?>

                    </tbody>
                </table>
            </div>
        </div>
        <!-- place card here -->
    </main>
    <footer>
        <!-- place footer here -->
    </footer>

</body>

</html>