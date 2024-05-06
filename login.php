<?php


require "database/database.php";
require "helpers/functions.php";
$page = "login";

_check_if_user_deconnected();


// password_verify($password, $password_hash);

// $email = "ikram@gmail.com";
// $password = 123456;
// 123456
// $password_hash = '$2y$10$xH07UpjDFhAMecKsQvwC8uvAmSN6wpa82ech/f8yWoloW8HsjWmlm';

// $password_verify = password_verify($password, $password_hash);

// echo "<pre>";
// var_dump($password_verify);
// echo "</pre>";
// exit;

// https: //www.w3schools.com/sql/sql_injection.asp

// ' or '1'='1
// ' or ''='


if (isset($_POST['login_btn'])) {

    $email = e($_POST['email']);
    $password = e($_POST['password']);

    // Email verify
    $user_row = $db->query("SELECT * FROM users 
    WHERE email = '$email'")->rowCount();

    if ($user_row == 0) {
        $_SESSION['message'] = "Email ou mot de passe incorrecte";
        $_SESSION['couleur'] = "danger";
        header('Location:login.php');
        exit;
    }
    // Password verify
    $user_info = $db->query("SELECT * FROM users 
    WHERE email = '$email' LIMIT 1")->fetch();

    $password_hash = $user_info['password'];

    $password_verify = password_verify($password, $password_hash);

    if ($password_verify === false) {
        $_SESSION['message'] = "Email ou mot de passe incorrecte";
        $_SESSION['couleur'] = "danger";
        header('Location:login.php');
        exit;
    }

    $_SESSION['ikea_auth'] = $user_info;

    $_SESSION['message'] = "Bien connecter";
    $_SESSION['couleur'] = "success";
    header('Location:dashboard.php');
    exit;
}


// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// exit;
?>

<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
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

        <?php include_once "body/message_flash.php"; ?>

        <div class="row justify-content-md-center">
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


                        </div>


                        <div class="form-group mb-3">
                            <label class="form-label" for="password">Mot de passe:</label>

                            <input name="password" type="password" class="form-control " id="password" placeholder="Veuillez saisir votre mot de passe SVP !">

                        </div>


                        <div class="d-flex mb-3">
                            <div class="me-auto p-2">
                                <button class="btn btn-dark" type="submit" name="login_btn">
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