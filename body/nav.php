<?php

// if (!isset($page)) {
//     $page = '';
// };

$page = $page ?? '';
?>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">IKEA</a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">

                <?php if (auth() === false) : ?>

                    <li class="nav-item">
                        <a class="nav-link <?php

                                            if ($page == 'home') {
                                                echo "active text-warninga fw-bold";
                                            } else {
                                                echo '';
                                            }
                                            ?>" href="index.php">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= $page == 'shop' ? 'active text-warninga fw-bold' : '' ?>" href="shop.php">Shop</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link 
                    <?php // ($page == 'cart' or $page == 'proceed-checkout' or $page == 'thank-you') ? 'active text-warninga fw-bold' : '' 
                    ?>
<?= in_array($page, ['cart', 'proceed-checkout', 'thank-you']) ? 'active text-warninga fw-bold' : ''  ?>" href="cart.php">Cart</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= $page == 'contact' ? 'active text-warninga fw-bold' : '' ?>" href="contact.php">Contact</a>
                    </li>
                <?php else : ?>

                    <li class="nav-item">
                        <a class="nav-link <?= $page == 'users' ? 'active text-warninga fw-bold' : '' ?>" href="users.php">Utilisateurs</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= in_array($page, ['produits']) ? 'active text-warninga fw-bold' : ''  ?>" href="produits.php">Produits</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= in_array($page, ['categories']) ? 'active text-warninga fw-bold' : ''  ?>" href="categories.php">Categories</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= $page == 'couleurs' ? 'active text-warninga fw-bold' : '' ?>" href="couleurs.php">Couleurs</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= $page == 'commande' ? 'active text-warninga fw-bold' : '' ?>" href="commandes.php">Commandes</a>
                    </li>
                <?php endif ?>

            </ul>

            <ul class="navbar-nav ">

                <?php if (auth() === false) : ?>

                    <li class="nav-item">
                        <a class="nav-link active <?= $page == 'login' ? ' text-warninga fw-bold' : '' ?>" href="login.php">Login</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active <?= $page == 'register' ? ' text-warninga fw-bold' : '' ?>" href="register.php">Register</a>
                    </li>

                <?php else : ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?= ucwords(user()['email']) ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="profile.php">Profile</a>
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                    </li>
                <?php endif ?>


            </ul>

        </div>
    </div>
</nav>