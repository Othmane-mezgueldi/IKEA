<?php

$page = "thank-you";
?>
<!doctype html>
<html lang="en">

<head>
    <title>Thank you page</title>
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

        </header>
        <main class="container mt-3">

            <h3>Thank you</h3>


            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="shop.php">Shop</a></li>
                    <li class="breadcrumb-item"><a href="cart.php">Cart</a></li>
                    <li class="breadcrumb-item"><a href="proceed-checkout.php">Proceed checkout</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Thank you</li>
                </ol>
            </nav>

            <div class="text-center mt-5">
                <h3 class="my-3">
                    Thank you for your order!
                    <i class="bi bi-check-circle"></i>
                </h3>

                <p class="fs-5 my-3">
                    Your order has been confirmed. You will receive an email confirmation shortly. Your order ID is
                    9588546549549099495098409.
                </p>

                <a href="shop.php" class="btn btn-dark fw-bold">
                    <i class="bi bi-shop"></i>
                    Continue your shoping
                </a>

            </div>


        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
        </script>
</body>

</html>