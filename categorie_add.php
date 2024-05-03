<?php

// $password_input = 123456;
// $password_db = '$argon2id$v=19$m=65536,t=4,p=1$NXlBT3BxMDlWZnNINEFHZw$nKBCEqmS44ooCgnnRpi6hIylN8PWERKFCIZbAWHW1j8';

// $check_password = password_verify($password_input, $password_db);

// if ($check_password) {
//     echo "Bien connecter";
// } else {
//     echo "Email ou mot de passe incorecte";
// }
// exit;
// $password_input = md5($password_input);

// $password_db = "e10adc3949ba59abbe56e057f20f883e";
// echo "<br>";

// if ($password_db == $password_input) {
//     echo "Bien connecter";
// } else {
//     echo "Email ou mot de passe incorecte";
// }
// exit;


// echo "<br>";
// echo password_hash($password_input, 3);

// exit;


$page = "categories";

require "database/database.php";
require "helpers/functions.php";

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


// echo "<pre>";
// print_r($produits);
// echo "</pre>";
// exit;
?>

<!doctype html>
<html lang="en">

<head>
    <title>Ajouter une categorie</title>
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

        <main class="container mt-3">

            <h3>Ajouter une categorie</h3>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="categories.php">Categories</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ajouter une categorie</li>
                </ol>
            </nav>



            <div class="card">
                <div class="card-header">
                    <h6>Ajouter une categorie</h6>
                </div>
                <div class="card-body">

                    <form method="post" enctype="multipart/form-data">
                        <div class="row">
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

                        </div>
                        <!-- row -->

                        <button type="submit" name="add_categorie" class="btn btn-primary mt-4">
                            Enregister
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