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
                        SE CONNECTER
                    </h3>


                    <h5 class="text-center">
                        Clients enregistrés
                    </h5>
                    <p class="text-center">
                        Si vous avez un compte, connectez-vous avec votre adresse email.
                    </p>


                    <form method="post">

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


                        <div class="d-flex mb-3">
                            <div class="me-auto p-2">
                                <button class="btn btn-dark" name="login">
                                    Connexion
                                </button>
                            </div>
                            <div class="p-2">
                                <a href="forgot-password.html" class="text-dark">
                                    Mot de passe oublier:
                                </a>
                            </div>
                        </div>

                    </form>


                    <h5 class="text-center mt-4">Nouveaux clients</h5>


                    <hr>

                    <p class="text-center">
                        La création d’un compte a de nombreux avantages : consultation rapide, sauvegarder plusieurs
                        adresses, suivre les commandes, et bien plus encore.
                    </p>

                    <div class="d-flex justify-content-center">
                        <a href="register.html" class="btn btn-dark text-white mt-4 text-center">Créer un compte</a>
                    </div>
                </div>
            </div>

        </div>



    </main>
    <footer>
        <!-- place footer here -->
    </footer>

</body>

</html>