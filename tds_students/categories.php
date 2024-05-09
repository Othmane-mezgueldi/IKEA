<?php
$page = "categories";
require "body/database.php";
require "helpers/functions.php";

if (isset($_POST['btn_add_categorie'])) {
    $nom = $_POST['name'];
    $icon = $_POST['icon'];
    $db->query("INSERT INTO categories SET 
        name = '$nom',
        icon = '$icon'      
    ");
    $_SESSION['message'] = "Bien ajouter";
    $_SESSION['couleur'] = "success";
    header("Location:categories.php");
    exit;
}

if (isset($_POST['btn_Restore_categorie'])) {

    $id = (int)$_POST['id'];
    $db->query("UPDATE categories SET deleted_at = NULL WHERE id = $id");
    $_SESSION['message'] = "Bien activer";
    $_SESSION['couleur'] = "success";
    header("Location:categories.php");
    exit;
}
if (isset($_POST['btn_update_categories'])) {
    $id = (int)$_POST['id'];
    $nom = $_POST['name'];
    $icon = $_POST['icon'];

    $db->query("UPDATE categories SET 
        name = '$nom',
        icon = '$icon'
        WHERE id = $id
    ");


    $_SESSION['message'] = "Bien modifier";
    $_SESSION['couleur'] = "success";
    header("Location:categories.php");
    exit;
}

if (isset($_POST['btn_delete_categories'])) {

    $id = (int)$_POST['id'];
    $db->query("UPDATE categories SET deleted_at = NOW() WHERE id = $id");
    $_SESSION['message'] = "Bien supprimer";
    $_SESSION['couleur'] = "success";
    header("Location:categories.php");
    exit;
}

$categories_de = $db->query("SELECT * FROM categories WHERE deleted_at IS NOT NULL")->fetchAll();

$categories = $db->query("SELECT * FROM categories WHERE deleted_at IS NULL")->fetchAll();

// $categories_archive_count =  $db->query("SELECT count(id) AS archive_count  from categories where deleted_at is not null LIMIT 1")->fetch()->archive_count ?? 0;

$categories_archive_count =  $db->query("SELECT * FROM categories WHERE deleted_at IS NOT NULL")->rowCount();

?>
<!doctype html>
<html lang="en">

<head>
    <title>
        Dashboard ( categories )</title>
    <!-- Required meta tags -->
    <?php include_once "shortcuts/head.php"; ?>
    <?php include_once "shortcuts/script.php"; ?>
</head>

<body>
    <header class=" ">
        <!-- place navbar here -->
        <?php include_once "shortcuts/nav.php"; ?>
    </header>
    <main class="container mt-3">

        <div>
            <h3>Categories</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Categories </li>
                </ol>
            </nav>
        </div>
        <?php include_once("shortcuts/message.php") ?>

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
                                    Add a categorie </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <!-- modal-header -->
                            <div class="modal-body">

                                <div class="col">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name:</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Name:" />
                                    </div>
                                </div>
                                <!-- col -->

                                <div class="col">
                                    <div class="mb-3">
                                        <label for="icon" class="form-label">Icon:</label>
                                        <input type="text" class="form-control" name="icon" id="icon" placeholder="icon:" />
                                    </div>
                                </div>
                                <!-- col -->
                            </div>
                            <!-- modal-body -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                <button type="submit" name="btn_add_categorie" class="btn btn-primary">
                                    Add
                                </button>
                            </div>
                            <!-- modal-footer -->
                        </form>
                    </div>
                </div>
            </div>
            <!-- archive -->

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#archive">
                <i class="bi bi-archive-fill"></i> Archive
                <span class="badge text-bg-success">
                    <?= $categories_archive_count  ?>
                </span>
            </button>
            <!-- Modal -->
            <div class="modal fade" id="archive" tabindex="-1" aria-labelledby="archiveLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <form method="post" enctype="multipart/form-data">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5">
                                    archive a categorie </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <!-- modal-header -->
                            <div class="modal-body">

                                <div class="mt-3">
                                    <div class="card">
                                        <h5 class="card-header ">
                                            Archived categories List:
                                        </h5>
                                        <div class="card-body">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col"></th>
                                                        <th scope="col">ID</th>
                                                        <th scope="col"></th>
                                                        <th scope="col"></th>
                                                        <th scope="col"></th>
                                                        <th scope="col"></th>
                                                        <th scope="col"></th>
                                                        <th scope="col"></th>
                                                        <th scope="col"></th>
                                                        <th scope="col">Icon</th>
                                                        <th scope="col"></th>
                                                        <th scope="col"></th>
                                                        <th scope="col"></th>
                                                        <th scope="col"></th>
                                                        <th scope="col">Name</th>
                                                        <th scope="col"></th>
                                                        <th scope="col"></th>
                                                        <th scope="col"></th>
                                                        <th scope="col"></th>
                                                        <th scope="col"></th>
                                                        <th scope="col"></th>
                                                        <th scope="col"></th>
                                                        <th scope="col"></th>
                                                        <th scope="col"></th>
                                                        <th scope="col"></th>
                                                        <th scope="col"></th>
                                                        <th scope="col">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="ms-3">
                                                    <?php foreach ($categories_de as $key => $value) : ?>
                                                        <tr>
                                                            <th scope="row"> </th>
                                                            <td><?= $value['id'] ?> </td>
                                                            <td> </td>
                                                            <td> </td>
                                                            <td> </td>
                                                            <td> </td>
                                                            <td> </td>
                                                            <td> </td>
                                                            <td> </td>
                                                            <td><i class="bi bi-<?= $value['icon'] ?>"></i> </td>
                                                            <td> </td>
                                                            <td> </td>
                                                            <td> </td>
                                                            <td> </td>
                                                            <td><?= $value['name'] ?></td>
                                                            <th scope="col"></th>
                                                            <th scope="col"></th>
                                                            <th scope="col"></th>
                                                            <th scope="col"></th>
                                                            <th scope="col"></th>
                                                            <th scope="col"></th>
                                                            <th scope="col"></th>
                                                            <th scope="col"></th>
                                                            <th scope="col"></th>
                                                            <th scope="col"></th>
                                                            <th scope="col"></th>
                                                            <td>
                                                                <form method="post" enctype="multipart/form-data">
                                                                    <input type="hidden" name="id" value="<?= $value['id'] ?>">
                                                                    <button type="submit" name="btn_Restore_categorie" class="btn btn-success">
                                                                        <i class="bi bi-arrow-repeat"></i> Restore
                                                                    </button>
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



            </a>
        </div>
        <div class="mt-3 mb-5">
            <div class="card overflow-hidden">
                <h5 class="card-header justify-content-center">
                    categories List:
                </h5>
                <div class="card-body">
                    <div class="me-5">
                        <table class="table table-striped ms-5  ">
                            <thead class="ms-3">
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">ID</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col">Icon</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col">Name</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="ms-3">
                                <?php foreach ($categories as $key => $value) : ?>
                                    <tr>
                                        <th scope="row"> </th>
                                        <td><?= $value['id'] ?> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td><i class="bi bi-<?= $value['icon'] ?>"></i> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td><?= $value['name'] ?></td>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <td>
                                            <button type="button" class="btn btn-secondary " data-bs-toggle="modal" data-bs-target="#modal_show_categories_<?= $value['id'] ?>">
                                                Show
                                            </button>

                                            <div class="modal fade" id="modal_show_categories_<?= $value['id'] ?>" tabindex="-1" aria-hidden="true">
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
                                                                <li>Nom: <?= ucwords($value['name']) ?></li>
                                                                <li>Icon: <i class="bi bi-<?= $value['icon'] ?>"></i></li>
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
                                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modal_update_categories_<?= $value['id'] ?>">
                                                update
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="modal_update_categories_<?= $value['id'] ?>" tabindex="-1" aria-labelledby="modal_update_categories_<?= $value['id'] ?>Label" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <form method="post" enctype="multipart/form-data">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5">
                                                                    Update a categorie </h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <!-- modal-header -->
                                                            <div class="modal-body">
                                                                <div class="col">
                                                                    <div class="mb-3">
                                                                        <label for="name" class="form-label">Name:</label>
                                                                        <input type="text" value="<?= $value['name'] ?>" class="form-control" name="name" id="name" placeholder="Name:" />
                                                                    </div>
                                                                </div>
                                                                <!-- col -->

                                                                <div class="col">
                                                                    <div class="mb-3">
                                                                        <label for="icon" class="form-label">icon:</label>
                                                                        <input type="text" value="<?= $value['icon'] ?>" class="form-control" name="icon" id="icon" placeholder="icon:" />
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <!-- modal-body -->
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                                                <input type="hidden" name="id" value="<?= $value['id'] ?>">
                                                                <button type="submit" name="btn_update_categories" class="btn btn-primary">
                                                                    Update
                                                                </button>
                                                            </div>
                                                            <!-- modal-footer -->
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal_Delete_categories_<?= $value['id'] ?>">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="modal_Delete_categories_<?= $value['id'] ?>" tabindex="-1" aria-labelledby="modal_Delete_categories_<?= $value['id'] ?>Label" aria-hidden="true">
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

                                                                <h4>Are you sure you want to delete this product (<span class="text-danger"><?= $value['name'] ?></span>)?</h4>


                                                            </div>
                                                            <!-- modal-body -->
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                                                <input type="hidden" name="id" value="<?= $value['id'] ?>">
                                                                <button type="submit" name="btn_delete_categories" class="btn btn-danger">
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
        </div>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->

</body>

</html>