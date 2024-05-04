<?php

$page = "couleurs";


require "database/database.php";
require "helpers/functions.php";
$couleurs = $db->query("SELECT * FROM couleurs ORDER BY id DESC")->fetchAll();

// echo "<pre>";
// print_r($produits);
// echo "</pre>";
// exit;
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
    <main class="container">

        <div class="row justify-content-md-center mt-3">
            <div class="col-8">

                <div class="bg-light p-5 rounded-pilla rounded-3">
                    <h3 class="text-center mb-4">
                        CRÉER UN NOUVEAU COMPTE CLIENT
                    </h3>

                    <h5 class="text-center">
                        Informations personnelles
                    </h5>

                    <form method="post">

                        <div class="mb-3">

                            <label class="form-label" for="prenom">
                                Prénom:
                                (<span class="text-danger">*</span>)
                            </label>

                            <input name="prenom" type="text" class="form-control 
                                                  " id="prenom" placeholder="Veuillez saisir votre prénom SVP !" value="">

                            <div class=" fw-bold">
                            </div>

                        </div>


                        <div class="mb-3">
                            <label class="form-label" for="nom">Nom:</label>

                            <input name="nom" type="text" class="form-control " id="nom" placeholder="Veuillez saisir votre nom SVP !" value="">

                            <div class=" fw-bold">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="email">Adresse mail:</label>

                            <input name="email" type="email" class="form-control " id="email" placeholder="Veuillez saisir votre adresse mail SVP !" value="">

                            <div class=" fw-bold">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="password">Mot de passe:</label>

                            <input name="password" type="password" class="form-control " id="password" name="password" placeholder="Veuillez saisir votre Mot de passe SVP !">

                            <div class=" fw-bold">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="password_confirm">Confirmer le mot de passe:</label>

                            <input name="password_confirm" type="password" class="form-control " id="password_confirm" name="password_confirm" placeholder="Veuillez confirmer le mot de passe SVP !">

                            <div class=" fw-bold">
                            </div>
                        </div>


                        <div class="mt-4">

                            <button class="btn btn-dark" name="register_btn">
                                Créer un compte
                            </button>

                            <a href="login.html" class="btn btn-secondary">
                                Retour
                            </a>

                        </div>
                    </form>


                </div>
            </div>

        </div>


    </main>
    <footer>
        <!-- place footer here -->
    </footer>

</body>

</html>