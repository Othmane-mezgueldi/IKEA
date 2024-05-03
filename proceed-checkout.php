<?php
$page = "proceed-checkout";
?>
<!doctype html>
<html lang="en">

<head>
    <title>Cart page</title>
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

            <h3>Proceed to ckeckout page</h3>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="shop.php">Shop</a></li>
                    <li class="breadcrumb-item"><a href="cart.php">Cart</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Proceed to ckeckout</li>
                </ol>
            </nav>

            <div class="row">
                <div class="col-8">
                    <div class="card shadow-sma">
                        <div class="card-body">


                            <div class="row">
                                <div class="col-4">
                                    <label for="name" class="form-label">Name:</label>
                                    <input type="text" class="form-control" id="name" placeholder="Name:">
                                </div>
                                <!-- col 2 -->

                                <div class="col-4">
                                    <label for="phone" class="form-label">Phone::</label>
                                    <input type="text" class="form-control" id="phone" placeholder="Phone::">
                                </div>
                                <!-- col 2 -->

                                <div class="col-4">
                                    <label for="city" class="form-label">City:</label>
                                    <input type="text" class="form-control" id="city" placeholder="City:">
                                </div>
                                <!-- col 2 -->
                            </div>
                            <!-- row 2 -->
                        </div>
                        <!-- card-body -->
                    </div>
                    <!-- card -->
                </div>
                <!-- col -->

                <div class="col-4">
                    <div class="bg-light p-3">
                        <h3>Total: 750,00 DH</h3>

                        <ul class="list-group">
                            <li class="list-group-item bg-transparent">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <img src="images/products/product_img1.jpg" width="60" alt="...">
                                    </div>
                                    <!-- flex-shrink-0 -->
                                    <div class="flex-grow-1 ms-3">
                                        <h5>Blue Dress</h5>
                                        <h6>
                                            300,00 DH
                                            <span class="text-success">2 quantity</span>
                                        </h6>
                                    </div>
                                    <!-- flex-grow-1 -->
                                </div>
                                <!-- d-flex -->


                            </li>

                            <li class="list-group-item bg-transparent">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <img src="images/products/product_img2.jpg" width="60" alt="...">
                                    </div>
                                    <!-- flex-shrink-0 -->
                                    <div class="flex-grow-1 ms-3">
                                        <h5>Red Shirt</h5>
                                        <h6>
                                            450,00 DH
                                            <span class="text-success">2 quantity</span>
                                        </h6>
                                    </div>
                                    <!-- flex-grow-1 -->
                                </div>
                                <!-- d-flex -->
                            </li>
                        </ul>

                        <a href="thank-you.php" class="btn btn-dark fw-bold mt-3 rounded-pill">
                            <i class="bi bi-basket"></i>
                            Confirm order
                        </a>

                    </div>
                    <!-- bg-light -->
                </div>
                <!-- col -->
            </div>
            <!-- row -->






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