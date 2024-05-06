<?php

require "database/database.php";
require "helpers/functions.php";

$page = "register";

_check_if_user_deconnected();

$errors = [];
if (isset($_POST['register_btn'])) {

    if (isset($_POST['prenom'], $_POST['nom'], $_POST['email'], $_POST['password'], $_POST['password_confirm'])) {

        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_confirm = $_POST['password_confirm'];

        if ($prenom == "") {
            // Error
            $input_class_prenom = "is-invalid";
            $input_message_prenom = "Le champ prenom est requis";
            $errors[] = $input_message_prenom;
        } else {
            if (strlen($prenom) < 3) {
                // Error
                $input_class_prenom = "is-invalid";
                $input_message_prenom = "Veuillez saisir plus de 3 caractères";
                $errors[] = $input_message_prenom;
            } else {
                if (!preg_match('/^[a-zA-Z ]+$/', $prenom)) {
                    $input_class_prenom = "is-invalid";
                    $input_message_prenom = "Veuillez saisir uniquement des caractères alphabétiques";
                    $errors[] = $input_message_prenom;
                } else {
                    //Success
                    $input_class_prenom = "is-valid";
                }
            }
        }

        if (empty($nom)) {
            // Error
            $input_class_nom = "is-invalid";
            $input_message_nom = "Le champ nom est requis";
            $errors[] = $input_message_nom;
        } else {
            if (strlen($nom) < 3) {
                // Error
                $input_class_nom = "is-invalid";
                $input_message_nom = "Veuillez saisir plus de 3 caractères";
                $errors[] = $input_message_nom;
            } else {
                if (!preg_match('/^[a-zA-Z ]+$/', $nom)) {
                    $input_class_nom = "is-invalid";
                    $input_message_nom = "Veuillez saisir uniquement des caractères alphabétiques";
                    $errors[] = $input_message_nom;
                } else {
                    //Success
                    $input_class_nom = "is-valid";
                }
            }
        }



        if (empty($email)) {
            // Error
            $input_class_email = "is-invalid";
            $input_message_email = "Le champ email est requis";
            $errors[] = $input_message_email;
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $input_class_email = "is-invalid";
                $input_message_email = "Format d'email invalide";
                $errors[] = $input_message_email;
            } else {

                // $email_row = $db->query("SELECT count(id) as email_row FROM users WHERE email = '$email' LIMIT 1")->fetch()['email_row'];

                $email_row = $db->query("SELECT id FROM users WHERE email = '$email' LIMIT 1")->rowCount();

                if ($email_row == 1) {
                    $input_class_email = "is-invalid";
                    $input_message_email = "Cet email est déja pris";
                    $errors[] = $input_message_email;
                } else {
                    //Success
                    $input_class_email = "is-valid";
                }
            }
        }

        if ($password == "") {
            // Error
            $input_class_password = "is-invalid";
            $input_message_password = "Le champ mot de passe est requis";
            $errors[] = $input_message_password;
        } else {
            if (strlen($password) < 6) {
                // Error
                $input_class_password = "is-invalid";
                $input_message_password = "Veuillez saisir plus de 6 caractères";
                $errors[] = $input_message_password;
            } else {
                if (!preg_match('/^[a-zA-Z0-9$!_ ]+$/', $password)) {
                    $input_class_password = "is-invalid";
                    $input_message_password = "Veuillez saisir uniquement des caractères alphabétiques";
                    $errors[] = $input_message_password;
                } else {
                    //Success
                    $input_class_password = "is-valid";
                }
            }
        }

        if ($password_confirm == "") {
            // Error
            $input_class_password_confirm = "is-invalid";
            $input_message_password_confirm = "Le champ confirmation de mot de passe est requis";
            $errors[] = $input_message_password_confirm;
        } else {

            if ($password != $password_confirm) {
                $input_class_password_confirm = "is-invalid";
                $input_message_password_confirm = "Les deux mot de passe ne sont pas identique";
                $errors[] = $input_message_password_confirm;
            } else {
                //Success
                $input_class_password_confirm = "is-valid";
            }
        }

        if (empty($errors)) {

            $password_hash = password_hash($password, PASSWORD_BCRYPT);

            $db->query("INSERT INTO users SET 
                prenom = '$prenom',
                nom = '$nom',
                email = '$email',
                password = '$password_hash'
            ");

            $_SESSION['message'] = "Bien ajouter";
            $_SESSION['couleur'] = "success";
            header("Location:login.php");
            exit;
        }
    } else {
        $_SESSION['message'] = "Veuillez remplire toutes les champs SVP !!!";
        $_SESSION['couleur'] = "danger";
        // header("Location:register.php");
        // exit;
    }
}




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
    <main class="container mt-3">

        <?php include_once "body/messaged_errors.php"; ?>

        <?php include_once "body/message_flash.php"; ?>

        <div class="row justify-content-md-center">
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

                            <input name="prenom" type="text" class="form-control <?= $input_class_prenom ?? "" ?>" id="prenom" placeholder="Veuillez saisir votre prénom SVP !" value="<?= $prenom ?? '' ?>">

                            <?php if ($input_message_prenom ?? false) : ?>
                                <div class="text-danger">
                                    <?= $input_message_prenom ?? "" ?>
                                </div>
                            <?php endif  ?>

                        </div>


                        <div class="mb-3">
                            <label class="form-label" for="nom">Nom:</label>

                            <input name="nom" type="text" class="form-control <?= $input_class_nom ?? "" ?>" id="nom" placeholder="Veuillez saisir votre nom SVP !" value="<?= $nom ?? '' ?>">

                            <?php if ($input_message_nom ?? false) : ?>
                                <div class="text-danger">
                                    <?= $input_message_nom ?? "" ?>
                                </div>
                            <?php endif  ?>

                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="email">Adresse mail:</label>

                            <input name="email" type="text" class="form-control <?= $input_class_email ?? "" ?>" id="email" placeholder="Veuillez saisir votre email SVP !" value="<?= $email ?? '' ?>">

                            <?php if ($input_message_email ?? false) : ?>
                                <div class="text-danger">
                                    <?= $input_message_email ?? "" ?>
                                </div>
                            <?php endif  ?>

                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="password">Mot de passe:</label>

                            <input name="password" type="password" class="form-control <?= $input_class_password ?? "" ?>" id="password" placeholder="Veuillez saisir votre Mot de passe SVP !">

                            <?php if ($input_message_password ?? false) : ?>
                                <div class="text-danger">
                                    <?= $input_message_password ?? "" ?>
                                </div>
                            <?php endif  ?>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="password_confirm">Confirmer le mot de passe:</label>

                            <input name="password_confirm" type="password" class="form-control <?= $input_class_password_confirm ?? "" ?>" id="password_confirm" placeholder="Veuillez saisir votre Mot de passe de confirmation SVP !">

                            <?php if ($input_message_password_confirm ?? false) : ?>
                                <div class="text-danger">
                                    <?= $input_message_password_confirm ?? "" ?>
                                </div>
                            <?php endif  ?>

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