<?php

session_start();

if (isset($_SESSION['ikea_auth'])) {
    unset($_SESSION['ikea_auth']);
    $_SESSION['message'] = "Bien déconnecter";
    $_SESSION['couleur'] = "success";
    header('Location:login.php');
    exit;
}
