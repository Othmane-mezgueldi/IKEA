<?php
session_start();

function e($value)
{
    return htmlspecialchars(trim(strtolower($value)));
}



// $a = 5;
// $b = 2;

// function  somme(float $num_1 = 0, float $num_2 = 0): float
// {
//     return $num_1 + $num_2;
// }

// function  soustraction(float $num_1 = 0, float $num_2 = 0): float
// {
//     return $num_1 - $num_2;
// }

// function  multiplication(float $num_1 = 0, float $num_2 = 0): float
// {
//     return $num_1 * $num_2;
// }


// function division(float $num_1 = 0, float $num_2 = 0): float|string
// {
//     return $num_2 === 0 ? "Error" : $num_1 / $num_2;
// }


// echo division($a, $b);

// exit;



function _check_if_user_connected()
{
    if (!isset($_SESSION['ikea_auth'])) {
        $_SESSION['message'] =  "Vous n'avez pas le droit de consulter cette page";
        $_SESSION['couleur'] = "danger";
        header('Location:login.php');
        exit;
    }
}


function _check_if_user_deconnected()
{
    if (isset($_SESSION['ikea_auth'])) {
        $_SESSION['message'] =  "Vous etes déja connecter";
        $_SESSION['couleur'] = "danger";
        header('Location:dashboard.php');
        exit;
    }
}

function auth(): bool
{
    if (!isset($_SESSION['ikea_auth'])) {
        return false;
    }
    return true;
}

function user()
{
    if (isset($_SESSION['ikea_auth'])) {
        return $_SESSION['ikea_auth'];
    }
    return _check_if_user_connected();
}

function dd($value)
{
    echo "<pre>";
    print_r($value);
    echo "</pre>";
    exit;
}
