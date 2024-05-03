<?php

$page = "home";
?>
<!doctype html>
<html lang="en">

<head>
    <title>Home | ikea.com</title>
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








        <h3 class="mt-3">Home page</h3>

        <div id="my_carousel" class="carousel slide carousel-fade" data-bs-ride="false">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#my_carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#my_carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#my_carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#my_carousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>
            <!-- carousel-indicators -->

            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="3000">
                    <img src="images/carousel/1.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <!-- carousel-item -->
                <div class="carousel-item" data-bs-interval="3000">
                    <img src="images/carousel/2.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <!-- carousel-item -->
                <div class="carousel-item" data-bs-interval="3000">
                    <img src="images/carousel/3.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
                <!-- carousel-item -->

                <div class="carousel-item" data-bs-interval="3000">
                    <img src="images/carousel/4.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
                <!-- carousel-item -->
            </div>
            <!-- carousel-inner -->
            <button class="carousel-control-prev" type="button" data-bs-target="#my_carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#my_carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!-- carousel -->
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->



</body>

</html>