<?php

// if (!isset($page)) {
//     $page = '';
// };

$page = $page ?? '';
?>
<nav class="navbar navbar-expand-sm navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">IKEA</a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">

                <li class="nav-item">
                    <a class="nav-link <?php

                                        if ($page == 'home') {
                                            echo "active text-info fw-bold";
                                        } else {
                                            echo '';
                                        }
                                        ?>" href="index.php">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= $page == 'shop' ? 'active text-info fw-bold' : '' ?>" href="shop.php">Shop</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link 
                    <?php // ($page == 'cart' or $page == 'proceed-checkout' or $page == 'thank-you') ? 'active text-info fw-bold' : '' 
                    ?>
<?= in_array($page, ['cart', 'proceed-checkout', 'thank-you']) ? 'active text-info fw-bold' : ''  ?>" href="cart.php">Cart</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= $page == 'contact' ? 'active text-info fw-bold' : '' ?>" href="contact.php">Contact</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= in_array($page, ['categories']) ? 'active text-info fw-bold' : ''  ?>" href="produits.php">Produits</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= in_array($page, ['categories']) ? 'active text-info fw-bold' : ''  ?>" href="categories.php">Categories</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= $page == 'couleurs' ? 'active text-info fw-bold' : '' ?>" href="couleurs.php">Couleurs</a>
                </li>

            </ul>

        </div>
    </div>
</nav>