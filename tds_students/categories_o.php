<?php

require "database/database.php";
require "helpers/functions.php";

$page = "categories";

$categoriess = $db->query("SELECT * FROM categories WHERE deleted_at IS NULL")->fetchAll();

// $categories_archive_count =  $db->query("SELECT count(id) AS archive_count  from categories where deleted_at is not null LIMIT 1")->fetch()->archive_count ?? 0;

$categories_archive_count =  $db->query("SELECT * FROM categories WHERE deleted_at IS NOT NULL")->rowCount();









if (isset($_POST['add_categorie'])) {
    // echo "Ok";
    // exit;
    // echo "<pre>";
    // print_r($_FILES);
    // echo "</pre>";
    // exit;

    // https://www.w3schools.com/php/php_file_upload.asp

    $image_name = $_FILES["image"]["name"];
    // $target_file = "images/categories/" . basename($image_name);
    // move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);



    move_uploaded_file($_FILES["image"]["tmp_name"], "images/categories/" . basename($_FILES["image"]["name"]));


    // echo "<pre>";
    // print_r($target_file);
    // echo "</pre>";
    // exit;



    //Récupération des données
    $nom = $_POST['nom'];
    $icon = $_POST['icon'];

    // Enregistrer les données dans la BD

    $db->query("INSERT INTO `categories` (`id`, `nom`, `icon`,`image`) VALUES (null,'$nom','$icon','$image_name')");

    // Redériger user vers la page categories
    header("Location:categories.php");
    exit;
}






















if (isset($_POST['btn_update_categories'])) {
    $id = (int)$_POST['id'];
    $nom = e($_POST['nom']);
    $image = e($_POST['image']);
    $icon = e($_POST['icon']);


    // $query = "UPDATE users SET 
    // nom = '$nom',
    // email = '$email'
    // $req_password
    // WHERE id = $id";

    // dd($query);

    $db->query("UPDATE categories SET nom = '$nom', icon ='$icon' WHERE id = $id");



    $_SESSION['message'] = "Bien modifier";
    $_SESSION['couleur'] = "success";
    header("Location:categories.php");
    exit;
}



if (isset($_POST['delete_categorie'])) {
    $id = (int)$_POST['id'];
    // echo "Ok";
    // $db->query("DELETE FROM categories WHERE id = $id");
    $db->query("UPDATE categories SET deleted_at = NOW() WHERE id = $id");
    $_SESSION['message'] = "Bien supprimer";
    $_SESSION['couleur'] = "success";

    header("Location:categories.php");
    exit;
}


if (isset($_POST['activate_all'])) {

    $db->query("UPDATE categories SET deleted_at = NULL");
    $_SESSION['message'] = "Toutes les catégories sont activée";
    $_SESSION['couleur'] = "success";
    header("Location:categories.php");
    exit;
}













// echo "<pre>";
// print_r($produits);
// echo "</pre>";
// exit;
?>

<!doctype html>
<html lang="en">

<head>
    <title>Liste des utilisateurs</title>
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

        <?php include_once "body/messaged_errors.php"; ?>

        <?php include_once "body/message_flash.php"; ?>

        <h3>Liste des utilisateurs</h3>



        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Categories</li>
            </ol>
        </nav>

        <?php include_once("body/message_flash.php") ?>

        <div class="card">
            <div class="card-header">
                <h6>Liste des categories</h6>
            </div>
            <div class="card-body">


                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#btn_addd_categories">
                    Ajouter
                </button>


                <div class="modal fade" id="btn_addd_categories" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form method="post" enctype="multipart/form-data">
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
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="nom" class="form-label">Nom:</label>
                                                    <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom:" />
                                                </div>
                                            </div>
                                            <!-- col -->

                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="icon" class="form-label">Icon:</label>
                                                    <input type="text" class="form-control" name="icon" id="icon" placeholder="Icon:" />
                                                </div>
                                            </div>
                                            <!-- col -->

                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="image" class="form-label">Image:</label>
                                                    <input type="file" class="form-control" name="image" id="image" />
                                                </div>
                                            </div>
                                            <!-- col -->
                                            <!-- row -->
                                        </div>
                                        <!-- modal-body -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                            <button type="submit" name="add_categorie" class="btn btn-primary">
                                                Ajouter
                                            </button>
                                        </div>
                                        <!-- modal-footer -->
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- modal-content -->
                    </div>
                    <!-- modal-dialog -->
                </div>
                <!-- Modal -->




























                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#btn_Archive_categories">
                    Archive
                </button>


                <div class="modal fade" id="btn_Archive_categories" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form method="post" enctype="multipart/form-data">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5">
                                        Archive
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <!-- modal-header -->
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h6>Liste des catégories archiver</h6>
                                                </div>
                                                <div class="card-body">

                                                    <form method="post">
                                                        <a href="categories.php" class="btn btn-dark mb-3">Retour</a>
                                                        <?php if ($categories_active > 0) : ?>
                                                            <button type="submit" name="activate_all" class="btn btn-success mb-3">Activer tout</button>
                                                        <?php else :  ?>
                                                            <!-- <button class="btn btn-success mb-3 disabled" disabled>Activer tout</button> -->
                                                        <?php endif  ?>

                                                    </form>
                                                    <?php if ($categories_active > 0) : ?>

                                                        <div class="table-responsive">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr class="table-light">
                                                                        <th>Id</th>
                                                                        <th>Nom</th>
                                                                        <th>iamge</th>
                                                                        <th>icon</th>
                                                                        <th>Actions</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    <?php foreach ($categories as $key => $a) : ?>

                                                                        <tr>

                                                                            <td><?= $a['id'] ?></td>
                                                                            <td><?= ucwords($a['nom']) ?></td>
                                                                            <td><img width="30" src="images/categories/<?= $a['image'] ?>?time=<?= date("d/m/Y H:i:s") ?>" alt=""></td>
                                                                            <td><i class="bi bi-<?= $c['icon'] ?>"></i></td>


                                                                            <td>








                                                                                <form method="post">
                                                                                    <input type="hidden" name="id" value="<?= $a['id'] ?>">
                                                                                    <button type="submit" name="active_categorie" class="btn btn-sm btn-success">active</button>
                                                                                </form>













                                                                            </td>
                                                                        </tr>
                                                                    <?php endforeach ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!-- responsive -->

                                                    <?php else :  ?>

                                                        <div class="text-center">
                                                            <h5>Aucune catégorie supprimer</h5>
                                                            <p>
                                                                Veuiller supprimer une catégorie
                                                            </p>
                                                            <img width="300" src="images/illustrations/no_data.png" alt="">

                                                        </div>
                                                    <?php endif  ?>



                                                </div>
                                            </div>
                                            <!-- row -->
                                        </div>
                                        <!-- modal-body -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                            <button type="submit" name="Archive_categorie" class="btn btn-primary">
                                                Ajouter
                                            </button>
                                        </div>
                                        <!-- modal-footer -->
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- modal-content -->
                    </div>
                    <!-- modal-dialog -->
                </div>
                <!-- Modal -->

























                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-light">
                                <th>Id</th>
                                <th>Nom</th>
                                <th>iamge</th>
                                <th>icon</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($categoriess as $key => $c) : ?>


                                <tr>

                                    <td><?= $c['id'] ?></td>
                                    <td><?= ucwords($c['nom']) ?></td>
                                    <td><img width="30" src="images/categories/<?= $c['image'] ?>?time=<?= date("d/m/Y H:i:s") ?>" alt=""></td>
                                    <td><i class="bi bi-<?= $c['icon'] ?>"></i></td>


                                    <td>
                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#modal_show_categories_<?= $c['id'] ?>">
                                            Afficher
                                        </button>

                                        <div class="modal fade" id="modal_show_categories_<?= $c['id'] ?>" tabindex="-1" aria-hidden="true">
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
                                                            <li>Id: <?= $c['id'] ?></li>
                                                            <li>Nom: <?= ucwords($c['nom']) ?></li>
                                                            <li>imag: <img width="30" src="images/categories/<?= $c['image'] ?>" alt=""></li>
                                                            <li>icon: <i class="bi bi-<?= $c['icon'] ?>"></i></li>
                                                            <li>
                                                                Status:


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


                                        <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#modal_update_categories_<?= $c['id'] ?>">
                                            Modifier
                                        </button>

                                        <div class="modal fade" id="modal_update_categories_<?= $c['id'] ?>" tabindex="-1" aria-hidden="true">
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
                                                                        <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom:" value="<?= $c['nom'] ?>" />
                                                                    </div>
                                                                </div>
                                                                <!-- col -->

                                                                <div class="col">
                                                                    <div class="mb-3">

                                                                        <label for="image" class="form-label">Image:</label>
                                                                        <input type="file" class="form-control" name="image" id="image" placeholder="<?= $c['image'] ?>" value="<?= $c['image'] ?>" />
                                                                    </div>
                                                                </div>
                                                                <!-- col -->

                                                                <div class="col">
                                                                    <div class="mb-3">
                                                                        <label for="icon" class="form-label">Icon:</label>
                                                                        <input type="text" class="form-control" name="icon" id="icon" placeholder="Icon:" value="<?= $c['icon'] ?>" />
                                                                    </div>
                                                                </div>
                                                                <!-- col -->
                                                            </div>
                                                            <!-- row -->



                                                        </div>
                                                        <!-- modal-body -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>

                                                            <input type="hidden" name="id" value="<?= $c['id'] ?>">

                                                            <button type="submit" name="btn_update_categories" class="btn btn-dark">
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





                                        <?php if (!$c['deleted_at']) : ?>
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal_disable_categories_<?= $c['id'] ?>">
                                                supprimer
                                            </button>

                                            <div class="modal fade" id="modal_disable_categories_<?= $c['id'] ?>" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5">
                                                                Désactiver
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <!-- modal-header -->
                                                        <div class="modal-body">
                                                            <ul>
                                                                <li>Id: <?= $c['id'] ?></li>
                                                                <li>Nom: <?= ucwords($c['nom']) ?></li>
                                                                <li>imag: <img width="30" src="images/categories/<?= $c['image'] ?>" alt=""></li>
                                                                <li>icon: <i class="bi bi-<?= $c['icon'] ?>"></i></li>

                                                            </ul>

                                                            <h6 class="text-danger">
                                                                Voulez vous vraiment désactiver <?= ucwords($c['nom']) ?> ?
                                                            </h6>
                                                        </div>
                                                        <!-- modal-body -->
                                                        <div class="modal-footer">
                                                            <form method="post">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
                                                                <input type="hidden" name="id" value="<?= $c['id'] ?>">

                                                                <button type="submit" name="delete_categorie" class="btn btn-danger">
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






                                        <?php endif ?>












                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </main>
    <footer>
        <!-- place footer here -->
    </footer>

</body>

</html>