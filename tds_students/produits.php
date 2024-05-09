<?php

$page = "produits";
require "../database/database.php";
require "../helpers/functions.php";
_check_if_user_connected();
if (isset($_POST['btn_add_user'])) {
    $nom = e($_POST['nom']);
    $prix = $_POST['prix'];
    $ancien_prix = $_POST['ancien_prix'];
    $quantite = $_POST['quantite'];
    $image = e($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], "images/products/" . basename($_FILES["image"]["name"]));

    $db->query("INSERT INTO products SET 
        nom = '$nom',
        prix = '$prix',
        ancien_prix = '$ancien_prix',
        quantite = '$prix',
        image = '$image'
        
    ");
    $_SESSION['message'] = "Bien ajouter";
    $_SESSION['couleur'] = "success";
    header("Location:produits.php");
    exit;
}
if (isset($_POST['btn_update_products'])) {
    $id = (int)$_POST['id'];
    $nom = e($_POST['nom']);
    $prix = $_POST['prix'];
    $ancien_prix = $_POST['ancien_prix'];
    $quantite = $_POST['quantite'];

    $db->query("UPDATE products SET 
        nom = '$nom',
        prix = '$prix',
        ancien_prix = '$ancien_prix',
        quantite = '$quantite'

        WHERE id = $id
    ");


    $_SESSION['message'] = "Bien modifier";
    $_SESSION['couleur'] = "success";
    header("Location:produits.php");
    exit;
}
if (isset($_POST['btn_delete_products'])) {

    $id = (int)$_POST['id'];
    $db->query("UPDATE products SET deleted_at = NOW() WHERE id = $id");
    $_SESSION['message'] = "Bien supprimer";
    $_SESSION['couleur'] = "success";
    header("Location:produits.php");
    exit;
}
if (isset($_POST['btn_Restore_products'])) {

    $id = (int)$_POST['id'];
    $db->query("UPDATE products SET deleted_at = NULL WHERE id = $id");
    $_SESSION['message'] = "Bien activer";
    $_SESSION['couleur'] = "success";
    header("Location:produits.php");
    exit;
}

$products_de = $db->query("SELECT * FROM produits WHERE deleted_at IS NOT NULL")->fetchAll();
$products = $db->query("SELECT * FROM produits WHERE deleted_at IS  NULL")->fetchAll();
$product_archive_count =  $db->query("SELECT * FROM produits WHERE deleted_at IS NOT NULL")->rowCount();
?>
<!doctype html>
<html lang="en">

<head>
    <title>
        Dashboard ( product )</title>
    <!-- Required meta tags -->
    <?php include_once "../body/head.php"; ?>
    <?php include_once "../body/script.php"; ?>
</head>

<body>
    <header class=" ">
        <!-- place navbar here -->
        <?php include_once "../body/nav.php"; ?>
    </header>
    <main class="container mt-3">
        <div>
            <h3>Products</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Produits</li>
                </ol>
            </nav>
        </div>
        <div class="d-grid gap-2 col-6 mx-auto">

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <form method="post" enctype="multipart/form-data">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5">
                                    Add a product </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <!-- modal-header -->
                            <div class="modal-body">

                                <div class="col">
                                    <div class="mb-3">
                                        <label for="nom" class="form-label">Name:</label>
                                        <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom:" />
                                    </div>
                                </div>
                                <!-- col -->

                                <div class="col">
                                    <div class="mb-3">
                                        <label for="prix" class="form-label">prix:</label>
                                        <input type="text" class="form-control" name="prix" id="prix" placeholder="prix:" />
                                    </div>
                                </div>
                                <!-- col -->

                                <div class="col">
                                    <div class="mb-3">
                                        <label for="ancien_prix" class="form-label">Old prix:</label>
                                        <input type="ancien_prix" class="form-control" name="ancien_prix" id="ancien_prix" placeholder="Old prix:" />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="quantite" class="form-label">Quantite:</label>
                                        <input type="quantite" class="form-control" name="quantite" id="quantite" placeholder="Old prix:" />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="image" class="form-label">image:</label>
                                        <input type="file" class="form-control" name="image" id="image" placeholder="image" />
                                    </div>
                                </div>
                                <!-- col -->

                            </div>
                            <!-- modal-body -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                <button type="submit" name="btn_add_user" class="btn btn-primary">
                                    Ajouter
                                </button>
                            </div>
                            <!-- modal-footer -->
                        </form>
                    </div>
                </div>
            </div>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#archive">
                <i class="bi bi-archive-fill"></i> Archive
                <span class="badge text-bg-success">
                    <?= $product_archive_count  ?>
                </span>
            </button>
            <!-- Modal -->
            <div class="modal fade" id="archive" tabindex="-1" aria-labelledby="archiveLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <form method="post" enctype="multipart/form-data">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5">
                                    archive a product </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <!-- modal-header -->
                            <div class="modal-body">

                                <div class="mt-3">
                                    <div class="card">
                                        <h5 class="card-header ">
                                            Archived Products List:
                                        </h5>
                                        <div class="card-body">
                                            <table class="table table-striped ">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th></th>
                                                        <th></th>
                                                        <th>Name</th>
                                                        <th></th>
                                                        <th></th>
                                                        <th>Image</th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th>Prix</th>
                                                        <th>Ancien prix</th>
                                                        <th>Quantite</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($products_de as $key => $value) : ?>
                                                        <tr>
                                                            <th scope="row"><?= $value['id'] ?></th>
                                                            <td></td>
                                                            <td></td>
                                                            <td><?= $value['nom'] ?></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td style="width: 15px;">
                                                                <img src="images/products/<?= $value['image'] ?>" loading="lazy" class="card-img-top " width="30px" alt="...">
                                                            </td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><?= $value['prix'] ?> DH</td>
                                                            <td><?= $value['ancien_prix'] ?> DH</td>
                                                            <td><?= $value['quantite'] ?></td>
                                                            <td>
                                                                <form method="post" enctype="multipart/form-data">

                                                                    <input type="hidden" name="id" value="<?= $value['id'] ?>">
                                                                    <button type="submit" name="btn_Restore_products" class="btn btn-success">
                                                                        Restore
                                                                    </button>
                                                                </form>

                                                            </td>
                                                        </tr>
                                                    <?php endforeach ?>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <!-- modal-body -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>

                            </div>
                            <!-- modal-footer -->
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <div class="mt-3">
            <div class="card">
                <h5 class="card-header ">
                    Products List:
                </h5>
                <div class="card-body">
                    <table class="table table-striped ">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Prix</th>
                                <th>Ancien prix</th>
                                <th>Quantite</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $key => $value) : ?>
                                <tr>
                                    <th><?= $value['id'] ?></th>
                                    <td><?= $value['nom'] ?></td>
                                    <td>
                                        <img src="images/products/<?= $value['image'] ?>" loading="lazy" class="card-img-top " width="30px" alt="...">
                                    </td>

                                    <td><?= $value['prix'] ?> DH</td>
                                    <td><?= $value['ancien_prix'] ?> DH</td>
                                    <td><?= $value['quantite'] ?></td>
                                    <td>
                                        <button type="button" class="btn btn-secondary " data-bs-toggle="modal" data-bs-target="#modal_show_products_<?= $value['id'] ?>">
                                            Show
                                        </button>

                                        <div class="modal fade" id="modal_show_products_<?= $value['id'] ?>" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5">
                                                            Show
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <!-- modal-header -->
                                                    <div class="modal-body">
                                                        <ul>
                                                            <li>Id: <?= $value['id'] ?></li>
                                                            <li>Nom: <?= ucwords($value['nom']) ?></li>
                                                            <li>Image: <img src="images/products/<?= $value['image'] ?>" width="30px" alt=""></li>
                                                            <li>Prix: <?= $value['prix'] ?></li>
                                                            <li>Old prix: <?= $value['ancien_prix'] ?></li>
                                                            <li>Quantite: <?= $value['quantite'] ?></li>
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

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modal_update_products_<?= $value['id'] ?>">
                                            update
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="modal_update_products_<?= $value['id'] ?>" tabindex="-1" aria-labelledby="modal_update_products_<?= $value['id'] ?>Label" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                <div class="modal-content">
                                                    <form method="post" enctype="multipart/form-data">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5">
                                                                Update a product </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <!-- modal-header -->
                                                        <div class="modal-body">
                                                            <div class="col">
                                                                <div class="mb-3">
                                                                    <label for="nom" class="form-label">Name:</label>
                                                                    <input type="text" value="<?= $value['nom'] ?>" class="form-control" name="nom" id="nom" placeholder="Nom:" />
                                                                </div>
                                                            </div>
                                                            <!-- col -->
                                                            <div class="col">
                                                                <div class="mb-3">
                                                                    <label for="prix" class="form-label">prix:</label>
                                                                    <input type="text" value="<?= $value['prix'] ?>" class="form-control" name="prix" id="prix" placeholder="prix:" />
                                                                </div>
                                                            </div>
                                                            <!-- col -->
                                                            <div class="col">
                                                                <div class="mb-3">
                                                                    <label for="ancien_prix" class="form-label">Old prix:</label>
                                                                    <input value="<?= $value['ancien_prix'] ?>" type="ancien_prix" class="form-control" name="ancien_prix" id="ancien_prix" placeholder="Old prix:" />
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="mb-3">
                                                                    <label for="quantite" class="form-label">Quantite:</label>
                                                                    <input type="quantite" value="<?= $value['quantite'] ?>" class="form-control" name="quantite" id="quantite" placeholder="Old prix:" />
                                                                </div>
                                                            </div>

                                                            <!-- col -->

                                                        </div>
                                                        <!-- modal-body -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                                            <input type="hidden" name="id" value="<?= $value['id'] ?>">
                                                            <button type="submit" name="btn_update_products" class="btn btn-primary">
                                                                Update
                                                            </button>
                                                        </div>
                                                        <!-- modal-footer -->
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal_Delete_products_<?= $value['id'] ?>">
                                            <i class="bi bi-trash"></i> Delete
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="modal_Delete_products_<?= $value['id'] ?>" tabindex="-1" aria-labelledby="modal_Delete_products_<?= $value['id'] ?>Label" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                <div class="modal-content">
                                                    <form method="post" enctype="multipart/form-data">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5">
                                                                Delete a product </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <!-- modal-header -->
                                                        <div class="modal-body">

                                                            <h4>Are you sure you want to delete this product (<span class="text-danger"><?= $value['nom'] ?></span>)?</h4>


                                                        </div>
                                                        <!-- modal-body -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                                            <input type="hidden" name="id" value="<?= $value['id'] ?>">
                                                            <button type="submit" name="btn_delete_products" class="btn btn-danger">
                                                                Delete
                                                            </button>
                                                        </div>
                                                        <!-- modal-footer -->
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

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
    <!-- Bootstrap JavaScript Libraries -->

</body>

</html>